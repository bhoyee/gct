<?php
    include "connect.php";
   session_start();


  $user_check = $_SESSION['login_user'];

  $ses_sql = mysqli_query($conn,"select uName from login where uName = '$user_check' ");

  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $login_session = $row['uName'];

  if(!isset($_SESSION['login_user'])){
     header("location:index.php");
     die();
  }







   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($conn,"select uName from login where uName = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['uName'];

?>
