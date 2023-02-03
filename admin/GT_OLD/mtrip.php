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
//     mysqli_query($conn, "UPDATE routes SET route_dep_date = '$current_date' WHERE route_status =1 ");
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
                     <h2>Trip Management</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Edit , Activate and Disable Trip</p>
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
          <?php
                if(isset($_POST['button'])){
                      //trigger button click
                //date("Y-m-d", strtotime($orgDate));
                $cdate = date('Y-m-d h:m:s');  // get current date
                $city1=$_POST['dfrom'];
                $city2=$_POST['dto'];
                // $ddate = trim($_POST['ddate']);
                $dstime = trim($_POST['dtime']);
                $dstatus = trim($_POST['status']);
                $bus = trim($_POST['bus']);
                $price = trim($_POST['amt']);
        

                $count=1;

                $dtime  = date("H:i", strtotime($dstime));

                $result = mysqli_query($conn, "UPDATE routes SET route_cities='$city1,$city2',route_dep_time='$dtime ',bus='$bus',route_status='$dstatus', price='$price' WHERE bus='$bus' and route_cities='$city1,$city2'");

                  if($result === TRUE){

                    echo '<div class="alert alert-success" role="alert">
                    <strong>Alert!</strong> Route and Trip Updated Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
         
                ';

                  }
                  else{
                    echo '<div class="alert alert-danger" role="alert">
                    <strong>Alert!</strong> Something went wrong.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
         
                ';
                  }
                }
         
         ?>
           <br/>
           <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

              <div class="col-lg-12 col-md-6 m-auto mt-3">
                <div class="login-page-content">
                  <div class="login-form">
                    <h6>Modify Full Trips </h6>
                    <p>This will modify all the trip base on the route and bus selected</p> <br>
                 
                    <form action="mtrip.php" method="post">
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
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter Amount:(eg 175.00)</span>
                          <input type="number" name="amt" class="form-control" value="<?php echo $price;?>" step=".01" required >
                                      
                        </div>
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter Departure Time :</span>
                          <input type="time" name="dtime" class="form-control" value="" required>
                       
                        </div>
                        
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Select Bus / Car:</span>
                          <!-- <input type="text" name="city1" class="form-control" value="" placeholder="Enter City/ State Name" required > -->
                          <select id="city1" class="form-control mt-3" name="bus" title="Select destination city">
                              <option value="">-- Select Bus / Car --</option>
                                <?php
                             $sqlii = "SELECT bus_name FROM buses";
                                $resulti = mysqli_query($conn, $sqlii);
                                 while ($rowi = mysqli_fetch_array($resulti)) {
                                 $name = $rowi['bus_name'];
                                  // $terminal = $rowi['terminal']; 
                                  echo '<option value="'.$name.'">'.$name.'</option>';
                    
                                 }
                                
                                echo '</select>';
                                
                                ?>
				                 </div>
                        <div class="col-md-6 mb-2">

                          <span style="color:#fff">Activate / Deativate Trip :</span>
                          <select id="Dstatus" class="form-control mt-3" name="status" title="Select Active / Disable">
                                                    <option value="0">Select Option</option>
                                                    <option value="1">Activate</option>
                                                    <option value="0">Disable</option>
                                          
                                                </select>
                        </div>
                      </div>
                      <div class="log-btn">
                        <button type="submit" name="button"> <i class="fa fa-sign-in"></i> Update</button>
                      </div>
                    </form>

                  </div>
                  <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>


                </div>
                <br>
               
            </div>
                <!-- Pricing Content End -->


          </div>
        </div>
    </section>

<?php include('footer.php');?>