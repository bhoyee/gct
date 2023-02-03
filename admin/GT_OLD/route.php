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
                     <h2>Routes Management</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>View , Activate and Disable Route</p>
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
                    <h6>Search Route Timing </h6>
                    <p>Only current date route can be modify</p><br>
                    <form action="route.php" method="post">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Select Route From:</span>
                          <input type="hidden" name="fID" value="1" />
                   
                            <select id="city1" class="form-control mt-3" name="dfrom" title="Select departure city / terminal">
                              <option value="">-- Select Departure City --</option>
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
                        <div class="col-md-6 mb-2">
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
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Select Date :</span>
                          <input type="date" name="ddate" class="form-control" value="" required>
                       
                        </div>
                        <!-- <div class="col-md-3">
                          <span style="color:#fff">Select Trip Date</span>
                          <input type="date" name="tdate" class="form-control" required>
                        </div>
                         <div class="col-md-3 mb-3">
                          <span style="color:#fff">Book Status</span>
                          <select id="Dept" class="form-control mt-3" name="status" title="Select Booking Status">
                                                    <option value="0">Select status</option>
                                                    <option value="active">Active</option>
                                                    <option value="cancel">Cancel</option>
                                           
                                                </select>
                        </div>  -->
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
                  <thead style="font-size:12px">
                    <tr>
                        <th scope="col"></th>
                      <th scope="col" >Route Cities</th>
                      <th scope="col">Depature Date</th>
                      <th scope="col">Depature Time</th>
                      <th scope="col">Bus/Car</th>
                      <th scope="col">Price</th>
                      <th scope="col">Route Status</th>
                      <th></th>

                    </tr>
                  </thead>

                <?php
                if(isset($_POST['button'])){
                      //trigger button click
                //date("Y-m-d", strtotime($orgDate));
                $dfrom=$_POST['dfrom'];
                $dto=$_POST['dto'];
                $ddate =$_POST['ddate'];
        

                $count=1;
                 // $newDate = date("Y-m-d", strtotime($fdate));
                // $fdatee = date("Y-m-d", strtotime($fdate));
                $record = mysqli_query($conn,"select id, route_cities, route_dep_date, route_dep_time, bus, route_status, price from routes where route_cities='$dfrom,$dto' AND route_dep_date='$ddate';"); // fetch data from database
                if (mysqli_num_rows($record) > 0) {
                while($datas = mysqli_fetch_array($record))
                  {

                  //  $rId = $datas['id'];
                  $rcities = $datas['route_cities'];
                  $rdate = $datas['route_dep_date'];
                  $rtime = $datas['route_dep_time'];
                  $bus = $datas['bus'];
                  $price = $datas['price'];
                  $status = $datas['route_status'];
                //   $rDate = $datas['regDate'];

                 
                    $string = $rcities;
                    $str_arr = explode (",", $string); 
                    //  print_r($str_arr);

                  ?>
                  <tbody>
                  <tr>
                  <td align="center"><?php echo $count; ?></td>
                   <!-- <td><?php echo $rcities; ?></td> -->
                   <td><?php echo ('From: '.$str_arr[0] .', '.'To: '.' '. $str_arr[2]);?></td>
                   <td><?php echo $rdate; ?></td>                
                   <td><?php echo $rtime; ?></td>
                   <td style="font-size:12px"><?php echo $bus; ?></td>
                   <td >$<?php echo $price; ?></td>
                   <?php 
                    if($status == 1) {
                      echo ' <td class="text-success">Active</td>';
                    }
                    else{
                      echo ' <td class="text-danger">Non Active</td>';

                    }
                    ?>

                    <td>
                      <a href="updateroute.php?id=<?php echo $datas['id']; ?>"><button class="btn btn-primary text-white"><i class="fa fa-edit text-white" style="font-size:10px">edit</i></a></button>

              		</td>
                      <?php
                     if($status == 1){

                       ?>
                          <td align="center">
                   <a href="routesuspend.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to suspend this route?')"> <button class="btn btn-warning" style="font-size:10px">Suspend</button></a>

                   </td>
                       <?php
                     }
                     else{
                        ?>
                        <td align="center">
                    <a href="routeactive.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to activate this route?')"> <button class="btn btn-success" style="font-size:10px">Activate</button></a>

                 </td>
                     <?php
                     }
                     ?>
                          <td align="center">
                   <a href="routedelete.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to delete th route?')"> <button class="btn btn-danger" style="font-size:10px">Delete</button></a>

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
               $record1 = mysqli_query($conn,"select id, route_cities, route_dep_date, route_dep_time, bus, price, route_status from routes where route_dep_date='$cdate';"); // fetch data from database
               if (mysqli_num_rows($record1) > 0) {
               while($datas1 = mysqli_fetch_array($record1))
                 {

                 //  $rId = $datas['id'];
                 $rcities = $datas1['route_cities'];
                 $rdate = $datas1['route_dep_date'];
                 $rtime = $datas1['route_dep_time'];
                 $bus = $datas1['bus'];
                 $status = $datas1['route_status'];
                 $price = $datas1['price'];
                 
               
               //   $rDate = $datas['regDate'];

                
                   $string = $rcities;
                   $str_arr = explode (",", $string); 
                   //  print_r($str_arr);

                 ?>
                 <tbody>
                 <tr>
                   <td align="center"><?php echo $count; ?></td>
                   <!-- <td><?php echo $rcities; ?></td> -->
                   <td><?php echo ('From: '.$str_arr[0] .', '.'To: '.' '. $str_arr[2]);?></td>
                   <td><?php echo $rdate; ?></td>                
                   <td><?php echo $rtime; ?></td>
                   <td style="font-size:12px"><?php echo $bus; ?></td>
                   <td >$<?php echo $price; ?></td>
                   <?php 
                    if($status == 1) {
                      echo ' <td class="text-success">Active</td>';
                    }
                    else{
                      echo ' <td class="text-danger">Non Active</td>';

                    }
                    ?>
                  

                   <td>
                     <a href="updateroute.php?id=<?php echo $datas1['id']; ?>"> <button class="btn btn-primary text-white"><i class="fa fa-edit text-white" style="font-size:10px">edit</i></a></button>


                     </td>
                     <?php
                     if($status == 1){

                       ?>
                          <td align="center">
                          <a href="routesuspend.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to suspend this route?')"> <button class="btn btn-warning" style="font-size:10px">Suspend</button></a>

                   </td>
                       <?php
                     }
                     else{
                        ?>
                        <td align="center">
                        <a href="routeactive.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to activate this route?')"> <button class="btn btn-success" style="font-size:10px">Activate</button></a>

                 </td>
                     <?php
                     }
                     ?>
                    <td align="center">
                   <a href="routedelete.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to delete th route?')"> <button class="btn btn-danger" style="font-size:10px">Delete</button></a>

                   </td>
                  </tr>
                  <?php $count++; ?>
                 </tbody>

                   <?php
                 }
                }else {
                  $msg = "No Register Route Available";

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