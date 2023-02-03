<?php
include("connect.php");
$id=$_REQUEST['id'];
// $bID = $_REQUEST['id'];
$query = "UPDATE routes SET  route_status=1 WHERE id=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: route.php");
?>
