<?php 
session_start();
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'admin/GT/vendor/autoload.php';

// Get users' email addresses and full names from the database
function get_users_data() {
    $conn = db_connect();
    $stmt = $conn->prepare("SELECT email, fullName FROM boidata WHERE email IS NOT NULL");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

// Send password reset email to users
function send_reset_email($email, $fullName) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'mail.giddycruisetransportation.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@giddycruisetransportation.com'; // SMTP username
        $mail->Password = 'xxxxxxxx'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Email content
        $mail->setFrom('noreply@giddycruisetransportation.com', 'Giddy Cruise Transport');
        $mail->addAddress($email, $fullName); // Add a recipient
        // $mail->addBCC('bcc@example.com'); // Add BCC recipient
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = "Action Required: Password Reset for Giddy Cruise Transport Account";
        $mail->Body = "
            Dear $fullName,<br><br>
            
            We hope this email finds you well.<br><br>
            
            Recently, we've made significant upgrades to our system to enhance security and improve your experience with Giddy Cruise Transport.<br><br>
            
            As a result of these upgrades, we kindly ask you to reset your password before accessing your account. Please click on the following link to reset your password: <a href='https://giddycruisetransportation.com/reset_request.php'>Reset Password</a>.<br><br>
            
            Please note that you will not be able to log in to your account with your old password due to these system changes.<br><br>
            
            If you have any questions or concerns, feel free to reach out to our support team at support@giddycruisetransportation.com or call us at +14432202654 or +14439855520.<br><br>
            
            Thank you for your cooperation and continued support.<br><br>
            
            Best regards,<br>
            Giddy Cruise Transportation Team
        ";
        

        $mail->send();
        echo "Password reset email sent to $email successfully<br>";
    } catch (Exception $e) {
        echo "Failed to send email to $email. Error: {$mail->ErrorInfo}<br>";
    }
}

// Main logic to send emails
$users = get_users_data();
foreach ($users as $user) {
    send_reset_email($user['email'], $user['fullName']);
}
?>
