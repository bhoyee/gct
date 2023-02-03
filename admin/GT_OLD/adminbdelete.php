<?php
include("connect.php");
$id=$_REQUEST['id'];
// $bID = $_REQUEST['id'];



$querydel ="DELETE book.*, seats.* FROM book 
LEFT JOIN seats ON book.bookingCode = seats.bookingCode
WHERE book.bookingCode='$id'";

mysqli_query($conn,$querydel) or die ( mysqli_error());
header("Location: mangbook.php");


?>


