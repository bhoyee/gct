<?php
//$servername = "localhost";$servername = "localhost";
$servername = "localhost";
// Enter your MySQL username below(default=root)
$username = 'giddycru_root';
//$username = 'u998645860_uroot';
// Enter your MySQL password below
$password = 'giddyhost_01';
//$password = 'Binsalith01';
$dbname = 'giddycru_gt';
//$dbname = 'u998645860_bandb';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header("location:connection_error.php?error=$conn->connect_error");
    die($conn->connect_error);
}
?>
