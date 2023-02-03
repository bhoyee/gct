<?php require 'partials/_functions.php';
 $conn = db_connect();
 session_start();
 if(!isset($_SESSION['route']) && empty($_SESSION['route'])) {

     $script = "<script>
     window.location = 'index.php';</script>";
     echo $script;
     exit();
 }
 $msg='';

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<style type="text/css">

    body
    {
        background:#f2f2f2;
    }

    .payment
	{
		border:1px solid #f2f2f2;
		height:350px;
        border-radius:20px;
        background:#fff;
	}
   .payment_header
   {
	   background:rgba(255,102,0,1);
	   padding:20px;
       border-radius:20px 20px 0px 0px;
	   
   }
   
   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }
   
   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content 
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background:rgba(255,0,0,1);
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }
   
</style>
</head>

    <body>
    <div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fa fa-xmark" aria-hidden="true"></i></div>
            </div>
            <div class="content">
               <h1><?php echo $msg; ?></h1>
               <p>You are already booked</p>
              
               <span><h4>Sorry , you can't book twice on same route</h4> </span><br><br>
               <a href="index.php">Go to Home</a>
            </div>
            
         </div>
      </div>
   </div>
</div>
    </body>
</html>
<?php
session_destroy();
?>
