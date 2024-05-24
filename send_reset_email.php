<?php 
session_start();
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect(); // Assuming this function returns a mysqli connection object

require 'admin/GT/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, proceed with password reset process
        $row = $result->fetch_assoc();
        $userId = $row['id'];

        // SMTP Configuration
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'mail.giddycruisetransportation.com'; // SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@giddycruisetransportation.com'; // SMTP username
            $mail->Password = 'xxxxxxxxx'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Email parameters
            $mail->setFrom('noreply@giddycruisetransportation.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';

            // Generate token and update database
            $token = bin2hex(random_bytes(16)); // Generate a random token
            $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token expiry time (1 hour from now)
            $stmt = $conn->prepare("UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?");
            $stmt->bind_param('sss', $token, $expiry, $email);
            $stmt->execute();

            // Email body
            $resetLink = "https://giddycruisetransportation.com/reset_password.php?token=$token";
            $message = "Click on the following link to reset your password: <a href='$resetLink'>$resetLink</a>";
            $mail->Body = $message;

            // Send email
            if ($mail->send()) {
                $_SESSION['message'] = "An email has been sent to $email with instructions to reset your password.";
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = "Failed to send email.";
                $_SESSION['message_type'] = 'error';
            }
        } catch (Exception $e) {
            $_SESSION['message'] = "Failed to send email.";
            $_SESSION['message_type'] = 'error';
        }
    } else {
        // Email does not exist in the database
        $_SESSION['message'] = "Email does not exist.";
        $_SESSION['message_type'] = 'error';
    }

    // Redirect back to the reset request page
    echo "<script>
            window.location = 'reset_request.php';
          </script>";
    exit();
}
?>
