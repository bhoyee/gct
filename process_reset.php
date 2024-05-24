<?php
session_start();
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $mysqli = $conn; // Assuming db_connect() returns a mysqli connection object directly

    // Verify the token
    $stmt = $mysqli->prepare("SELECT id, token_expiry FROM users WHERE reset_token = ?");
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['id'];
        $expiry = $row['token_expiry'];

        if (strtotime($expiry) > time()) { // Check if token has expired
            // Update the user's password
            $stmt = $mysqli->prepare("UPDATE users SET pwd = ?, reset_token = NULL, token_expiry = NULL WHERE id = ?");
            $stmt->bind_param('si', $newPassword, $userId);
            $stmt->execute();

            $_SESSION['message'] ="Your password has been successfully reset.";
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = "The token has expired. Please request a new password reset.";
            $_SESSION['message_type'] = 'error';
        }
    } else {
        $_SESSION['message'] = "Invalid token.";
        $_SESSION['message_type'] = 'error';
    }
     // Redirect back to the reset request page
    $script = "<script>
    window.location = 'reset_password.php';</script>";
    echo $script;
    exit();
}
?>
