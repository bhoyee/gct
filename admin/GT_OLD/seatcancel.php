<?php
include("connect.php");
$id=$_REQUEST['id'];
// $bID = $_REQUEST['id'];
$query = "UPDATE book SET  bookstatus='cancel' WHERE bookingCode=$id";
$query1 = "DELETE FROM seats WHERE bookingCode=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$result2 = mysqli_query($conn,$query1) or die ( mysqli_error());
header("Location: seat.php");
?>
