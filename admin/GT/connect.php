<?php
//$servername = "localhost";$servername = "localhost";
$servername = "localhost";
// Enter your MySQL username below(default=root)
$username = "xxxxxxxxx";
//$username = 'xxxxxxx';
// Enter your MySQL password below
$password = "xxxxxx";
//$password = 'xxxxxx';
$dbname = "xxxxxxxxxx";
//$dbname = 'xxxxxx';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header("location:connection_error.php?error=$conn->connect_error");
    die($conn->connect_error);
}
?>
