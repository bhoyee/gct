<?php 
include('header.php');
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
            background: rgba(0,0,0,0.75) url(assets/images/ajax-loader.gif) no-repeat center center;
            z-index: 10000;
        }


</style>
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Add Route</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Add Route</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->    
                        <div class="row d-flex justify-content-center">
              
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Route</h4>
                                    <p class="card-title-desc">Add Route (<code>Add route with city/state and terminal.</code>) </p>
                                    <div>
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

                            
                                        <form action="" method="post" onsubmit="myFunction()">
                                        <span>Departure City</span>
                                            <div class="mb-4">
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
                                            <span>Arrival City </span>
                                            <div class="mb-4">

                                                 <select id="city1" class="form-control mt-3" name="city2" title="Select destination city">
                                                <option value="">-- Select Arrival City --</option>
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
                                            <span>Departure Time (07:30:AM)</span>
                                            <div class="mb-4">
                                            <input type="time" name="dtime" class="form-control" value="" required>
                                            </div>

                                            <span>Activate / Deativate Route</span>
                                            <div class="mb-4">
                                                <select id="Dept" class="form-control mt-3" name="status" title="Select Active / Disable">
                                                    <option value="0">Select Option</option>
                                                    <option value="1">Activate</option>
                                                    <option value="0">Disable</option>
                                          
                                                </select>  
                                            </div>

                                            <span>Bus / Car</span>
                                            <div class="mb-4">
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
                                            <span>Amount:(eg 175.00)</span>
                                            <div class="mb-4">
                                            <input type="number" name="amt" class="form-control" value="" placeholder="Enter trip amount" step=".01" required >
                                            </div>
                                           
                                        
                                            <div>
                                            <button type="submit" class="btn btn-primary" name="create"><i class="fas fa-university"></i> Add City</button>
                                            </div>
                                        </form>
                                        <div id="loader"></div>

                                    </div>
                                    <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>
                                </div>
                            </div> 
                        </div>
                    </div>  
                    
                    
                </div> 
             </div>
        </div>  
<script>
	function myFunction() {
	var spinner = $('#loader');
	document.getElementById("loader").style.display = "inline"; // to undisplay
	}
</script> 
<?php 
include('footer.php');
?>