<?php 
include('header.php');
?>
<?php
  include("connect.php");
 
$msg = '' ;
$rSales = '';
$fdate = '';
// $tdate = '';
     //current sales
     // $date = date('Y-m-d');
     // $data = mysqli_query($conn, "select * from boidata where fullName LIKE '%{$fname}%' OR regDate LIKE '%{$fdate}%'");
     // $todaySale = mysqli_fetch_assoc($data);
     // $sale = $todaySale['price'];
     // if (is_null($sale)){
     //    $sale = 0;
     // }
     // //total sals
     // $data2 = mysqli_query($conn, "select SUM(price) AS price from invoice");
     // $totalSale = mysqli_fetch_assoc($data2);
     // $tSale = $totalSale['price'];
     // if (is_null($tSale)){
     //    $tSale = 0;
     // }

////

?>



    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Seat Management</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>View , Cancel and Monitor Seat</p>
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
                    <h6>Search Book Seat ON  Different Route Trip </h6><br>
                    <form action="seat.php" method="post">
                      <div class="form-row">
                        <div class="col-md-3 mb-3">
                          <span style="color:#fff">Select Route From:</span>
                          <input type="hidden" name="fID" value="1" />
                   
                          <select id="city1" class="form-control mt-3" name="dfrom" title="Select location">
                              <option value="">-- Select Location--</option>
                                <?php
                             $sqlii = "SELECT name, terminal FROM city";
                                $resulti = mysqli_query($conn, $sqlii);
                                 while ($rowi = mysqli_fetch_array($resulti)) {
                                 $name = $rowi['name'];
                                  $terminal = $rowi['terminal']; 
                                  echo '<option value="'.$name.','.$terminal.'">'.$name.'</option>';
                    
                                 }
                                
                                echo '</select>';
                                
                                ?>
                                      
                        </div>
                        <div class="col-md-3 mb-2">
                          <span style="color:#fff">Select Route To:</span>
                          <input type="hidden" name="fID" value="1" />
                          <select id="city1" class="form-control mt-3" name="dto" title="Select location">
                              <option value="">-- Select Location--</option>
                                <?php
                             $sqlii = "SELECT name, terminal FROM city";
                                $resulti = mysqli_query($conn, $sqlii);
                                 while ($rowi = mysqli_fetch_array($resulti)) {
                                 $name = $rowi['name'];
                                  $terminal = $rowi['terminal']; 
                                  echo '<option value="'.$name.','.$terminal.'">'.$name.'</option>';
                    
                                 }
                                
                                echo '</select>';
                                
                                ?>
                        </div>
                        <div class="col-md-3">
                          <span style="color:#fff">Select Trip Date</span>
                          <input type="date" name="tdate" class="form-control">
                        </div>
                         <div class="col-md-3 mb-3">
                          <span style="color:#fff">Book Status</span>
                          <select id="Dept" class="form-control mt-3" name="status" title="Select Booking Status">
                                                    <option value="0">Select status</option>
                                                    <option value="active">Active</option>
                                                    <option value="cancel">Cancel</option>
                                                    <option value="expired">Expired</option>


                                           
                                                </select>
                        </div> 
                        <!-- <div class="col-md-6">
                          <span style="color:#fff">Search By Phone Number</span>
                          <input type="number" name="phone" class="form-control" placeholder="Search By Phone nUMBER">
                        </div> -->
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
                      <th scope="col">Booking Numb</th>
                      <th scope="col">Route</th>
                      <th scope="col">Seat Numb</th>
                      <!-- <th scope="col">Amount</th> -->
                      
                    
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>
                      <th></th>

                    </tr>
                  </thead>

                <?php
                if(isset($_POST['button'])){    //trigger button click
                //date("Y-m-d", strtotime($orgDate));
                $dfrom=$_POST['dfrom'];
                $dto=$_POST['dto'];
                $tdate=$_POST['tdate'];
                 $status=$_POST['status'];

                $count=1;
                 // $newDate = date("Y-m-d", strtotime($fdate));
                // $fdatee = date("Y-m-d", strtotime($fdate));
                $record = mysqli_query($conn,"select id, bookingCode, route, bookdate, time, seat, bookstatus from book where route='$dfrom,$dto' and bookdate='$tdate' and bookstatus='$status' and tripChar='Inter-State' ORDER BY bookdate desc;"); // fetch data from database
                if (mysqli_num_rows($record) > 0) {
                while($datas = mysqli_fetch_array($record))
                  {

                  //  $rId = $datas['id'];
                  $bookingID = $datas['bookingCode'];
                  $route = $datas['route'];
                  $seat = $datas['seat'];
                  $bDate = $datas['bookdate'];
                  $btime = $datas['time'];
                  $status = $datas['bookstatus'];
                //   $rDate = $datas['regDate'];

                 
                    $string = $route;
                    $str_arr = explode (",", $string); 
                    //  print_r($str_arr);

                  ?>
                  <tbody>
                  <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td><?php echo $bookingID; ?></td>

                    <td><?php echo ('From: '. strtoupper($str_arr[0]) .':- '.$str_arr[1].' <b>To:</b> '.' '. strtoupper($str_arr[2]).' :-'.$str_arr[3]);?></td>
                    <td><?php echo $seat; ?></td>                
                    <td><?php echo $bDate; ?></td>
                    <td><?php echo $btime; ?></td>
                    <td><?php echo $status; ?></td>

                    <td>
                      <!-- <a href="editUpdate.php?id=<?php echo $datas['id']; ?>"> <i class="fa fa-edit"></i></a> -->

              		</td>
                      <?php
                      if($status == 'active'){
 
                        ?>
                           <td align="center">
                    <a href="seatcancel.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger">cancel booking</button></a>

                    </td>
                        <?php
                      }
                      ?>
                  <!-- <td align="center">
                    <a href="seatcancel.php?id=<?php echo $datas['bookingCode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger">cancel</button></a>

                    </td> -->
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


                }else{
                $cdate = date("Y-m-d");
                $tomorrow = date("Y-m-d", time() + 86400);
                $count=1;
                // $newDate = date("Y-m-d", strtotime($fdate));
               // $fdatee = date("Y-m-d", strtotime($fdate));
               $record1 = mysqli_query($conn,"select id, bookingCode, route, bookdate, time, seat, bookstatus from book where bookdate='$cdate' or bookdate LIKE '$tomorrow' and tripChar = 'Inter-State' ORDER BY bookdate desc;"); // fetch data from database
               if (mysqli_num_rows($record1) > 0) {
               while($datas1 = mysqli_fetch_array($record1))
                 {

                 //  $rId = $datas['id'];
                 $bookingID = $datas1['bookingCode'];
                 $route = $datas1['route'];
                 $seat = $datas1['seat'];
                 $bDate = $datas1['bookdate'];
                 $btime = $datas1['time'];
                 $status = $datas1['bookstatus'];
               //   $rDate = $datas['regDate'];

                
                   $string = $route;
                   $str_arr = explode (",", $string); 
                   //  print_r($str_arr);

                 ?>
                 <tbody>
                 <tr>
                   <td align="center"><?php echo $count; ?></td>
                   <td><?php echo $bookingID; ?></td>
                   <td><?php echo ('From: '. strtoupper($str_arr[0]) .':- '.$str_arr[1].' <b>To:</b> '.' '. strtoupper($str_arr[2]).' :-'.$str_arr[3]);?></td>
                   <td><?php echo $seat; ?></td>                
                   <td><?php echo $bDate; ?></td>
                   <td><?php echo $btime; ?></td>
                   <td><?php echo $status; ?></td>

                   <td>
                     <!-- <a href="editUpdate.php?id=<?php echo $datas['id']; ?>"> <i class="fa fa-edit"></i></a> -->

                     </td>
                     <?php
                     if($status == 'active'){

                       ?>
                          <td align="center">
                   <a href="seatcancel.php?id=<?php echo $datas1['bookingCode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger">cancel booking</button></a>

                   </td>
                       <?php
                     }
                     ?>
                 <!-- <td align="center">
                   <a href="seatcancel.php?id=<?php echo $datas['bookingCode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger">cancel</button></a>

                   </td> -->
                  </tr>
                  <?php $count++; ?>
                 </tbody>

                   <?php
                 }
                }else {
                  $msg = "No Trip Reservation Today";

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