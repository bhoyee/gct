<?php 
include('header.php');
?>
<?php
  include("connect.php");
?>


<style type="text/css">
        :root {
            --animate-duration: 800ms;
            --animate-delay: 10s;
        }
        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.75) url(assets/img/ajax-loader.gif) no-repeat center center;
            z-index: 10000;
        }


</style>

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Routes Management</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p> Create Route</p>
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
        if (isset($_POST['create'])){
    
            $cdate = date('Y-m-d h:m:s');  // get current date
            $ccdate = date('Y-m-d');
            $city1  = trim($_POST["city1"]);
            // $terminal1  = trim($_POST["terminal1"]);
             $city2   = trim($_POST["city2"]);
            // $terminal2  = trim($_POST["terminal2"]);
            $dstime  = trim($_POST["dtime"]);
            $status  = trim($_POST["status"]);
            $bus = trim($_POST["bus"]);
            $amt = trim($_POST["amt"]);


            // test code start ===
            $current_date = date('Y-m-d');
            $start = $month = strtotime($current_date);
            $end = strtotime($current_date. ' + 365 days');

      

            while($month < $end)
            {
                $test =  date('Y-m-d', $month);
                
                $month = strtotime("+1 day", $month);
           
                     // convert 12-hour time to 24-hour time 
                     $dtime  = date("H:i", strtotime($dstime));

                     $selectCus = "SELECT * FROM routes WHERE route_cities='$city1,$city2' AND route_dep_date='$test' AND bus='$bus'"; 
                     $resultCus = mysqli_query($conn, $selectCus);
                     $num_row_cus = mysqli_num_rows($resultCus);
         
                     if($num_row_cus > 0){
                       
                         echo '<div class="alert alert-danger " role="alert">
                         <strong>Alert!</strong> Trip on '. $test. ' already exit on the route selected !.
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                     </div>';
                     
                      
                     }
                   
                   else{

                     $sql = "INSERT INTO routes (route_cities, route_dep_date, route_dep_time, bus, price, route_status, route_created) 
                     VALUES ('$city1,$city2','$test','$dtime', '$bus', '$amt', '$status','$cdate')";

                     $conn->query( $sql);

             
                      // $sql = mysqli_query($conn, $sql3_cus);

                      // if ($conn->query($sql) === TRUE) {
                                      
                      //   echo '<div class="alert alert-success" role="alert">
                      //   <strong>Alert!</strong> New Route Created Successfully.
                      //   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      //   <span aria-hidden="true">&times;</span>
                      //   </button>
                      // </div>


                      // ';


                      // echo '<script> alert("Route Created Successfully"); </script>';
                      // echo '<meta http-equiv="refresh" content="0">';
                      // } else {
                      //   // echo "Error: " . $sql . "<br>" . $conn->error; // this show err 
                      //   echo '<div class="alert alert-danger" role="alert">
                      //   <strong>Alert!</strong> Something Went Wrong.
                      //   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      //   <span aria-hidden="true">&times;</span>
                      //   </button>
                      // </div>';
                      // }
                     

            }}
          
            echo '<div class="alert alert-success " role="alert">
            <strong>Alert!</strong> New Route Created Successfully and exipred on '. $test. '.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 
            
          

        }
      

            ?>

           <br/>
           <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

              <div class="col-lg-12 col-md-6 m-auto mt-3">
                <div class="login-page-content">
                  <div class="login-form">
                    <h6>Create Route</h6>
                    <p>Create route with city/state and terminal </p><br>
                    <form action="addroute.php" method="post" onsubmit="myFunction()">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Select City / State Name (Departure):</span>
                          <!-- <input type="text" name="city1" class="form-control" value="" placeholder="Enter City/ State Name" required > -->
                          <select id="city1" class="form-control mt-3" name="city1" title="Select departure city">
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
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Select City / State Name (Destination):</span>
                          <!-- <input type="text" name="city1" class="form-control" value="" placeholder="Enter City/ State Name" required > -->
                          <select id="city1" class="form-control mt-3" name="city2" title="Select destination city">
                              <option value="">-- Select Destination City --</option>
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
                                      
                        
                        <!-- <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter Terminal Name (Departure):</span>
                          <input type="text" name="terminal1" class="form-control" value="" placeholder="Enter Terminal Name" required >                                      
                       
                        </div>
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter City/State Name (Destination):</span>
                          <input type="text" name="city2" class="form-control" value="" placeholder="Enter City/State Name" required>                                      
                       
                        </div> -->
                        <!-- <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter Terminal Name (Destination):</span>
                          <input type="text" name="terminal2" class="form-control" value="" placeholder="Enter Terminal Name" required>                                      
                       
                        </div> -->
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter Departure Time :</span>
                          <input type="time" name="dtime" class="form-control" value="" required>
                       
                        </div>
                        <div class="col-md-6 mb-2">
                          <span style="color:#fff">Activate / Deativate Route :</span>
                          <select id="Dept" class="form-control mt-3" name="status" title="Select Active / Disable">
                                                    <option value="0">Select Option</option>
                                                    <option value="1">Activate</option>
                                                    <option value="0">Disable</option>
                                          
                                                </select>
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
                         <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter Amount:(eg 175.00)</span>
                          <input type="number" name="amt" class="form-control" value="" placeholder="Enter trip amount" step=".01" required >
                                      
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
                        <button type="submit" name="create"> <i class="fa fa-sign-in"></i> Create Route</button>
                      </div>
                    </form>
                    <div id="loader"></div>
                  </div>
                  <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>


                </div>
                <br>
            </div>
                <!-- Pricing Content End -->


          </div>
        </div>
    </section>
    <script>
	function myFunction() {
	var spinner = $('#loader');
	document.getElementById("loader").style.display = "inline"; // to undisplay
	}
	</script>
<?php include('footer.php');?>