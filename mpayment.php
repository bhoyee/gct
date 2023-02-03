<?php require 'partials/_functions.php';
include("session_timeout.php");
 $conn = db_connect();
 session_start();
 ?>
<?php include("header.php") ?>

<?php 

 if(!isset($_SESSION['email'])) {

    $script = "<script>
    window.location = 'index.php';</script>";
    echo $script;
    exit();
 }

if(isset($_SESSION['email'])) {
    $msg = '' ;
    $email = $_SESSION['email'];
    $sqlx = "SELECT fullName, email, phone , gender from boidata where email = '$email'";
    $resultx = mysqli_query($conn, $sqlx);
    $testx = mysqli_num_rows($resultx);

    if($testx > 0){
     
        $rowx = mysqli_fetch_array($resultx);
        $fname = $rowx['fullName'];
        $cemail = $rowx['email'];
        $phone = $rowx['phone'];
        $gender = $rowx['gender'];
    }
}
?>

    <div class="container page-content">
        <h4 class="page-title pt30">Manage Your GCT Payments</h4>
       
<div class="row">
    <div class="col-md-12 col-sm-12">
        <h5 class="content-header">Payments on GCT (View All Current and Past Payment) </h5>
        <p style="color:#D35400"><b>Note: Here are list of payments made on GCT so far. For any correction , kindly contact support.</b></p>
        <br>
      

        <div>
        <a href="thepayment.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Make New Payment Now</a>

        </div> <br><br>
        <p><b>Search By Transaction Date or By Booking Number</b></p>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Select Transaction Date:</label>
                        <input type="date" name="tdate" class="form-control" placeholder="Date">
                    </div>
                </div>
           
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label for="Email">Booking Number / ID</label>
                        <input type="text" name="bookID" class="form-control" placeholder="Search By Booking Number">
                    </div>
                </div>
   
         
            
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                            <i class="icon-ok icon-white"></i> Search Now
                                        </button>
                                        <button type="reset" class="btn btn-warning btn-lg">
                                            <i class="icon-refresh icon-black"></i> Clear
                                        </button>
                                    </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                </div>
                            </div>
        </form>
        <div id="loader"></div>    
        </div> 
    
    </div>
            
  
</div>

<div class="table-responsive">
                <table class="table table-striped table-dark w-100 ">
                  <thead>
                    <tr>
                        <th scope="col"></th>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Transaction ID</th>
                      <!-- <th scope="col">Full Name</th>
                      <th scope="col">Email</th> -->
                      <th scope="col">Amount Paid</th>
                      <!-- <th scope="col">Amount</th> -->
                      <th scope="col">Payment Date</th>
                      <th scope="col">Payment Status</th>
                      <th></th>

                    </tr>
                  </thead>

                <?php
                if(isset($_POST['psend'])){
                      //trigger button click
                //date("Y-m-d", strtotime($orgDate));
                $tdate  = $_POST['tdate'];
                $bookID = $_POST['bookID'];
        

                $count=1;
                 // $newDate = date("Y-m-d", strtotime($fdate));
                // $fdatee = date("Y-m-d", strtotime($fdate));
                $record = mysqli_query($conn,"select trx_id, bookingCode, fName, email, amt, status, p_date from stripe_payment where bookingCode LIKE '".$bookID."' OR ddate LIKE '".$tdate."' AND email= '".$email."'"); // fetch data from database
                if (mysqli_num_rows($record) > 0) {
                while($datas = mysqli_fetch_array($record))
                  {

                  //  $rId = $datas['id'];
                   $trx_id = $datas['trx_id'];
                  $bid = $datas['bookingCode'];
                //   $name = $datas['fName'];
                //   $email = $datas['email'];
                  $amt  = $datas['amt'];
                  $status = $datas['status'];
                  $date = $datas['p_date'];

             

                  if($status == 'Request Refund'){
                    $nstatus = "processing...";
                    $disable = "disabled";
                    $color = "primary";
                }
                elseif($status == 'Refund Cancel'){
                    $nstatus = " Refund Cancel";
                    $disable = "disabled";
                    $color = "danger";

                }
                elseif($status == 'Refunded'){
                    $nstatus = " Refunded";
                    $disable = "disabled";
                    $color = "success";
                }
                else{
                  $nstatus = " Request Refund";
                  $disable = "";
                  $color = "primary";
                }
           

                  ?>
                  <tbody>
                  <tr>
                  <td align="center"><?php echo $count; ?></td>

                  <td><?php echo $bid; ?></td>    
                  <td><?php echo $trx_id; ?></td>       
                   <!-- <td><?php echo $name; ?></td>  
                   <td><?php echo $email; ?></td>   -->
                   <td><?php echo '$'.$amt; ?></td>         
                   <td><?php echo $date; ?></td>
                   <td><?php echo $status; ?></td> 
                  

                    <td>
                    <a href="refundr.php?id=<?php echo $datas['bookingCode']; ?>"> <button type="button" class="btn btn-<?php echo $color; ?>" <?php echo $disable; ?>><?php echo $nstatus; ?></button></a>

              		</td>
                   
                   </tr>
                   <?php $count++; ?>
                  </tbody>

                    <?php
                  }
                 }else {
                   $msg = "No Result Found";

                  }
                  echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                  ";


                } else{
                $cdate = date("Y-m-d");
                $count=1;
                // $newDate = date("Y-m-d", strtotime($fdate));
               // $fdatee = date("Y-m-d", strtotime($fdate));
               $record1 = mysqli_query($conn,"select trx_id, bookingCode, fName, email, amt, status, p_date from stripe_payment where email='$email'"); // fetch data from database
               if (mysqli_num_rows($record1) > 0) {
               while($datas1 = mysqli_fetch_array($record1))
                 {

                 //  $rId = $datas['id'];
                 $trx_id = $datas1['trx_id'];
                 $bid = $datas1['bookingCode'];
                //  $name = $datas1['fName'];
                //  $email = $datas1['email'];
                 $amt  = $datas1['amt'];
                 $status = $datas1['status'];
                 $date = $datas1['p_date'];


                 if($status == 'Request Refund'){
                    $nstatus = "processing...";
                    $disable = "disabled";
                    $color = "primary";
                }
                elseif($status == 'Refund Cancel'){
                    $nstatus = " Refund Cancel";
                    $disable = "disabled";
                    $color = "danger";

                }
                elseif($status == 'Refunded'){
                    $nstatus = " Refunded";
                    $disable = "disabled";
                    $color = "success";
                }
                else{
                  $nstatus = " Request Refund";
                  $disable = "";
                  $color = "primary";
                }
           
            

                 ?>
            <tbody>
                 <tr>
                   <td align="center"><?php echo $count; ?></td>
                   <td><?php echo $bid; ?></td>  
                   <td><?php echo $trx_id; ?></td>        
                   <!-- <td><?php echo $name; ?></td>  
                   <td><?php echo $email; ?></td>   -->
                   <td><?php echo '$'.$amt; ?></td>         
                   <td><?php echo $date; ?></td>
                   <td><?php echo $status; ?></td>  
                 
                   <td>
         
                   <a href="refundr.php?id=<?php echo $datas1['bookingCode']; ?>" onClick="return confirm('Are you sure you want to Request For Refund?')"> <button type="button" class="btn btn-<?php echo $color; ?>" <?php echo $disable; ?>><?php echo $nstatus; ?></button></a>
              
                   
              		</td>
                  </tr>
                  <?php $count++; ?>
                 </tbody>

                   <?php
                 }
                //  if(isset($_GET['id'])){
                //      $te= $datas1['bookingCode'];
                //     $ids=$_GET['id'];
                //     if ($ids == '$te'){
                //        echo $te;
                //    }
                // }
                }else {
                  $msg = "No Any Successful Payment With GCT ! ";

                 }
                 echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                 ";
                }
                  ?>
              
              </table> 
            <!-- Button trigger modal -->
           

  
            
            </div>
                 <?php 
                 
                 mysqli_close($conn); // Close connection ?>


              </div>

    </div>
    
<?php include("footer.php") ?>