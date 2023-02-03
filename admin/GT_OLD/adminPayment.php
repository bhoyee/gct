<?php 
include('header.php');
include("connect.php");
 
$msg = '' ;

$current_date = date('Y-m-d');

?>



    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Payment Management</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>View All Current and Past Payment</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Pricing Area Start ==-->
    <section id="pricing-page-area" class="section-padding">
        <div class="container">
        <div class="row">
                  <!-- Pricing Content Start -->
          <div class="col-lg-12">
           <br/>
           <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

              <div class="col-lg-12 col-md-6 m-auto mt-3">
                <div class="login-page-content">
                  <div class="login-form">
                    <h6>Search For Payment </h6>
                    <p>Search By Transaction Date or By Booking Number</p><br>
                    <form action="adminpayment.php" method="post">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Select Transaction Date:</span>
                          <input type="hidden" name="fID" value="1" />
                          <input type="date" name="tdate" class="form-control" placeholder="Date">
                                     
                        </div>
                        <div class="col-md-6 mb-2">
                          <span style="color:#fff">Booking ID:</span>
                          <input type="hidden" name="fID" value="1" />
                          <input type="text" name="bookID" class="form-control" placeholder="Search By Booking Number">

                        </div>
                
                      </div>
                      <div class="log-btn">
                        <button type="submit" name="button"> <i class="fa fa-sign-in"></i> Search</button>
                      </div>
                    </form>

                  </div>
                  <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>


                </div>
                <br>
                <div class="table-responsive">
                <table class="table table-striped table-dark w-100 ">
                  <thead>
                    <tr>
                        <th scope="col"></th>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Transaction ID</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Amount Paid</th>
                      <!-- <th scope="col">Amount</th> -->
                      <th scope="col">Payment Date</th>
                      <th scope="col">Payment Status</th>
                      <th></th>

                    </tr>
                  </thead>

                <?php
                if(isset($_POST['button'])){
                      //trigger button click
                //date("Y-m-d", strtotime($orgDate));
                $tdate  = $_POST['tdate'];
                $bookID = $_POST['bookID'];
        

                $count=1;
                 // $newDate = date("Y-m-d", strtotime($fdate));
                // $fdatee = date("Y-m-d", strtotime($fdate));
                $record = mysqli_query($conn,"select trx_id, bookingCode, fName, email, amt, status, p_date from stripe_payment where bookingCode LIKE '".$bookID."' OR ddate LIKE '".$tdate."'"); // fetch data from database
                if (mysqli_num_rows($record) > 0) {
                while($datas = mysqli_fetch_array($record))
                  {

                  //  $rId = $datas['id'];
                   $trx_id = $datas['trx_id'];
                  $bid = $datas['bookingCode'];
                  $name = $datas['fName'];
                  $email = $datas['email'];
                  $amt  = $datas['amt'];
                  $status = $datas['status'];
                  $date = $datas['p_date'];
             

                  ?>
                  <tbody>
                  <tr>
                  <td align="center"><?php echo $count; ?></td>

                  <td><?php echo $bid; ?></td>    
                  <td><?php echo $trx_id; ?></td>       
                   <td><?php echo $name; ?></td>  
                   <td><?php echo $email; ?></td>  
                   <td><?php echo '$'.$amt; ?></td>         
                   <td><?php echo $date; ?></td>
                   <td><?php echo $status; ?></td> 
                  

                    <td>
                      <a href="updatepayment.php?id=<?php echo $datas['bookingCode']; ?>"> <i class="fa fa-edit" title="Edit / change payment status"></i></a>

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
               $record1 = mysqli_query($conn,"select trx_id, bookingCode, fName, email, amt, status, p_date from stripe_payment where ddate='$cdate'"); // fetch data from database
               if (mysqli_num_rows($record1) > 0) {
               while($datas1 = mysqli_fetch_array($record1))
                 {

                 //  $rId = $datas['id'];
                 $trx_id = $datas1['trx_id'];
                 $bid = $datas1['bookingCode'];
                 $name = $datas1['fName'];
                 $email = $datas1['email'];
                 $amt  = $datas1['amt'];
                 $status = $datas1['status'];
                 $date = $datas1['p_date'];
            

                 ?>
                 <tbody>
                 <tr>
                   <td align="center"><?php echo $count; ?></td>
                   <td><?php echo $bid; ?></td>  
                   <td><?php echo $trx_id; ?></td>        
                   <td><?php echo $name; ?></td>  
                   <td><?php echo $email; ?></td>  
                   <td><?php echo '$'.$amt; ?></td>         
                   <td><?php echo $date; ?></td>
                   <td><?php echo $status; ?></td>  
                 
                   <td>
                      <a href="updatepayment.php?id=<?php echo $datas1['bookingCode']; ?>"> <i class="fa fa-edit" title="Edit / change payment status"></i></a>

              		</td>
                  </tr>
                  <?php $count++; ?>
                 </tbody>

                   <?php
                 }
                }else {
                  $msg = "No Payment Today Yet";

                 }
                 echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                 ";
                }
                  ?>
              </table> </div>
                 <?php 
                 
                 mysqli_close($conn); // Close connection ?>


              </div>
            </div>
                <!-- Pricing Content End -->


          </div>
        </div>
    </section>

<?php include('footer.php');?>