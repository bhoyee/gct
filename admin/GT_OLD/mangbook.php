<?php 
include('header.php');
?>
<?php
  include("connect.php");
 
$msg = '' ;
$rSales = '';
$fdate = '';

$current_date = date('Y-m-d');
// if($current_date){
//     //update route table 
//     mysqli_query($conn, "UPDATE routes SET route_dep_date = '$current_date'");
// }


?>



    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Booking Management</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>View and Disable Booking</p>
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
                    <h6>Search Booking </h6>
                    <p>Only current will display without search</p><br>
                    <form action="mangbook.php" method="post">
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <span style="color:#fff">Select Route From:</span>
                          <input type="hidden" name="fID" value="1" />
                          <input type="text" class="form-control" name="bnumb" placeholder="Booking Number">
                                      
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
                      <th scope="col">Full Name</th>
                      <th scope="col">Trip Type</th>
                      <th scope="col">Book Date</th>
                      <th scope="col">Trip Date</th>
                       <th scope="col">Status</th>
                   
                      <th></th>

                    </tr>
                  </thead>

                <?php
                if(isset($_POST['button'])){
                      //trigger button click
                //date("Y-m-d", strtotime($orgDate));
                $bnumb= trim($_POST['bnumb']);


                $count=1;
                 // $newDate = date("Y-m-d", strtotime($fdate));
                // $fdatee = date("Y-m-d", strtotime($fdate));
                $record = mysqli_query($conn,"select boidata.fullName AS fullName,book.bookdate AS bbdate, book.bookstatus AS bstatus, book.bookingCode AS bcode, book.tripChar AS tType, book.regDate AS bDate from book INNER JOIN boidata ON book.userID = boidata.userid
                WHERE book.bookingCode='$bnumb';"); 

                if (mysqli_num_rows($record) > 0) {
                while($datas = mysqli_fetch_array($record))
                  {

                    $bcode = $datas['bcode'];
                    $fName = $datas['fullName'];
                    $ttype = $datas['tType'];
                    $rdate = $datas['bDate'];
                    $bbdate = $datas['bbdate'];
                    $bstatus = $datas['bstatus'];
                  

                  ?>
                          <tbody>
                 <tr>
                   <td align="center"><?php echo $count; ?></td>
                   <td><?php echo $bcode; ?></td> 
                   <td><?php echo $fName; ?></td>
                   <td><?php echo $ttype; ?></td>                
                   <td><?php echo $rdate; ?></td>
                   <td><?php echo $bbdate; ?></td>
                   <td><?php echo $bstatus; ?></td>
         

                   <td align="center">
                   <a href="adminbcancel.php?id=<?php echo $datas['bcode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-warning" style="font-size:10px">Cancel Booking</button></a>

                   </td>
                    <td align="center">
                   <a href="adminbdelete.php?id=<?php echo $datas['bcode']; ?>" onClick="return confirm('Are you sure you want to delete the route?')"> <button class="btn btn-danger" style="font-size:10px">Delete</button></a>

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
               $record1 = mysqli_query($conn,"select boidata.fullName AS fullName,book.bookdate AS bbdate, book.bookstatus AS bstatus, book.bookingCode AS bcode, book.tripChar AS tType, book.regDate AS bDate from book INNER JOIN boidata ON book.userID = boidata.userid
               WHERE book.regDate='$cdate';"); // fetch data from database
               if (mysqli_num_rows($record1) > 0) {
               while($datas1 = mysqli_fetch_array($record1))
                 {

                 //  $rId = $datas['id'];
                 $bcode = $datas1['bcode'];
                 $fName = $datas1['fullName'];
                 $ttype = $datas1['tType'];
                 $rdate = $datas1['bDate'];
                 $bbdate = $datas1['bbdate'];
                 $bstatus = $datas1['bstatus'];
               
        

                 ?>
                 <tbody>
                 <tr>
                   <td align="center"><?php echo $count; ?></td>
                   <td><?php echo $bcode; ?></td> 
                   <td><?php echo $fName; ?></td>
                   <td><?php echo $ttype; ?></td>                
                   <td><?php echo $rdate; ?></td>
                   <td><?php echo $bbdate; ?></td>
                   <td><?php echo $bstatus; ?></td>
         

                   <td align="center">
                   <a href="adminbcancel.php?id=<?php echo $datas1['bcode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-warning" style="font-size:10px">Cancel Booking</button></a>

                   </td>
                    <td align="center">
                   <a href="adminbdelete.php?id=<?php echo $datas1['bcode']; ?>" onClick="return confirm('Are you sure you want to delete the route?')"> <button class="btn btn-danger" style="font-size:10px">Delete</button></a>

                   </td>
                  </tr>
                  <?php $count++; ?>
                 </tbody>

                   <?php
                 }
                }else {
                  $msg = "No Booking Today Yet";

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