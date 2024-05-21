<?php 
include("connect.php");

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
    // Debug: Print the email value
    error_log("Email received: " . $email);

    // Prepare and execute query using prepared statements
    $stmt = $conn->prepare("SELECT fullName FROM boidata WHERE email = ?");
    $stmt->bind_param("s", $email);
    
    if ($stmt->execute()) {
        error_log("Query executed successfully");
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            error_log("Email found in database");
            $row = $result->fetch_assoc();
            $fullName = $row['fullName'];
            echo $fullName; // Return customer's full name
        } else {
            error_log("Email not found in database");
            echo 'not_found';
        }
    } else {
        // Debug: Print SQL error
        error_log("Query execution failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
