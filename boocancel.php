<?php require 'partials/_functions.php';
 $conn = db_connect();
 session_start();

$id=$_REQUEST['id'];
// $bID = $_REQUEST['id'];
$query = "UPDATE book SET  bookstatus='cancel' WHERE bookingCode=$id";
$query1 = "UPDATE seats SET status='cancel' WHERE bookingCode=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
$result2 = mysqli_query($conn,$query1) or die ( mysqli_error());

echo '<script> alert("You successfully CANCEL YOUR BOOKING !"); </script>';
$script = "<script>
window.location = 'index.php';</script>";
echo $script;

// header("Location: index.php");
?>
