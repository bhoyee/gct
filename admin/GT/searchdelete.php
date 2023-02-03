<?php
include("connect.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM boidata WHERE id=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: search.php");
?>
