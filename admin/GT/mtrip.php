<?php 
include('header.php');

$msg = '' ;
$rSales = '';
$fdate = '';

$current_date = date('Y-m-d');
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
                                    <h4 class="mb-sm-0">Manage Bulk Trips </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Modify All Trips</li>
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
                                    <h4 class="card-title">Modify All  Routes / Trips</h4>
                                    <p class="card-title-desc">Modify all trips base on information provide </p>
                                    <div>
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
                                      <form action="" method="post" onsubmit="myFunction()">
                                        <span>Departure City</span>
                                            <div class="mb-4">
                                                <select id="city1" class="form-control mt-3" name="dfrom" title="Select departure city">
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

                                                 <select id="city1" class="form-control mt-3" name="dto" title="Select destination city">
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
                                            <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-road"></i> Modify Routes</button>
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