<?php
include("connect.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM invoice WHERE id=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: sales.php");
?>