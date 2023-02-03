<?php
include("connect.php");
$id=$_REQUEST['id'];
// $bID = $_REQUEST['id'];



$query1 ="DELETE FROM buses WHERE id ='$id'";

// $querydel = "DELETE FROM users WHERE id='$id'";
// $query_del = query($querydel);
// confirm($query_del);



// $query = "UPDATE book SET  bookstatus='cancel' WHERE bookingCode=$id";
// $query1 = "DELETE FROM seats WHERE bookingCode=$id";
$result = mysqli_query($conn,$query1) or die ( mysqli_error());
// $result2 = mysqli_query($conn,$query1) or die ( mysqli_error());

header("Location: mcar.php");

?>


