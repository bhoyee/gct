<?php 
session_start();
include("header.php");
require 'partials/_functions.php';
include("session_timeout.php");
$conn = db_connect();

if(!isset($_SESSION['email'])) {

   $script = "<script>
   window.location = 'index.php';</script>";
   echo $script;
   exit();
}
?>


<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
    <div class="container page-content">
        <h4 class="page-title pt30">GCT User Dashboard</h4>
    <div>
       
 </div>

 <div style="text-align: left; margin-bottom:20px" class="col-md-4 ">
    <a href="https://giddycruisetransportation.com" class="btn btn-info" role="button">Book Interstate</a>
</div>
<div style="text-align: left; margin-bottom:20px" class="col-md-4 ">
    <a href="airporttrip.php" class="btn btn-info" role="button">Book Airport Pick Up / Drop Off</a>
</div>
<div style="text-align: left; margin-bottom:20px" class="col-md-4 ">
    <a href="Charter.php" class="btn btn-info" role="button">Book Point to Point ( Charter Trip )</a>
</div>
<br>
<div class="row">
    <div class="col-md-12 ">

    <div class="row my-4">

  <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
  <a href="mbook.php">
      <div class="card">
          <h5 class="card-header"></h5>
          <div class="card-body">
            <h5 class="card-title"> <img src="img/ticket.png" alt="ticket" style="width:30%" class="center"></h5>
            <p class="card-text text-center" >  <h4 class="text-center" style="padding-bottom:12px"><b>Manage Booking</b></h4> </p>
           
          </div>
       </div></a>
  </div>

 
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
  <a href="mpayment.php">
       <div class="card">
          <h5 class="card-header"></h5>
          <div class="card-body">
            <h5 class="card-title"> <img src="img/credit-card.png" alt="payment" style="width:30%" class="center"></h5>
            <p class="card-text text-center" >  <h4 class="text-center" style="padding-bottom:12px"><b>Manage Payment</b></h4> </p>
           
          </div>
       </div></a>
  </div>

  
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
  <a href="mprofile.php">
        <div class="card">
          <h5 class="card-header"></h5>
          <div class="card-body">
            <h5 class="card-title"> <img src="img/user.png" alt="user" style="width:30%" class="center"></h5>
            <p class="card-text text-center" >  <h4 class="text-center" style="padding-bottom:12px"><b>Manage Profile</b></h4> </p>
           
          </div>
       </div></a>
  </div>

  
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
  <a href="cpwd.php">
       <div class="card">
          <h5 class="card-header"></h5>
          <div class="card-body">
            <h5 class="card-title"> <img src="img/padlock.png" alt="password" style="width:30%" class="center"></h5>
            <p class="card-text text-center" >  <h4 class="text-center" style="padding-bottom:12px"><b>Change Password</b></h4> </p>
           
          </div>
       </div></a>
  </div>
</div>
  
        

    </div>
  
  </div>
</div>
<?php include("footer.php") ?>