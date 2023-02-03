<?php 
include('header.php');

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT route_cities, route_dep_date, route_dep_time, price, route_status FROM routes WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $cities=$res['route_cities'];
    $ddate=$res['route_dep_date'];
    $dtime=$res['route_dep_time'];
    $sstatus=$res['route_status'];
    $price =$res['price']; 
   
}
?>
            

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
                                    <h4 class="mb-sm-0">Manage Route</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Manage Route</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
              
                           <div class="col-lg-8">
                             <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit / Update Route </h4>
                                    <p class="card-title-desc">Single Route Management <code> Edit / Update Route.</code></p>
                                   
                                    <?php

                                        $status = "";
                                        if(isset($_POST['new']) && $_POST['new']==1)
                                        {
                                        $id = $_POST['id'];

                                        $ucities=$_POST['cities'];
                                        $uddate=$_POST['ddate'];
                                        $udtime=$_POST['dtime'];
                                        $ustatus=$_POST['status'];
                                        $bus = $_POST['bus'];
                                        $price = $_POST['amt'];

                                        // convert 12-hour time to 24-hour time 
                                        $ntime  = date("H:i", strtotime($udtime));
                                            


                                        // checking empty fields

                                            //updating the table
                                            $result = mysqli_query($conn, "UPDATE routes SET route_cities='$ucities',route_dep_date='$uddate',route_dep_time='$ntime',bus='$bus',route_status='$ustatus', price='$price' WHERE id=$id");

                                            //redirectig to the display page. In our case, it is index.php
                                            // header("Location: index.php");
                                            $status = "<b> Route Updated Successfully.</b></br></br>
                                            <a href='route.php' class='btn btn-primary btn-lg'>Go Back to Route Page</a>";
                                            echo '<p style="color:green;">'.$status.'</p>';

                                        } else {

                                        ?>
                                   <form action="" method="post">
                                   <div class="">
                                        <input type="hidden" name="new" value="1" />
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                    </div>
                                       <span>Route Cities</span>
                                        <div class="mb-4">
                                        <input type="text" name="cities" class="form-control" value="<?php echo $cities;?>">
                                        </div>
                                        <span>Depature Date</span>
                                        <div class="mb-4">
                                        <input type="text" name="ddate" class="form-control" value="<?php echo $ddate;?>" readonly>
                                        </div>
                                        <span>Departure Time</span>
                                        <div class="mb-4">
                                        <input type="time" name="dtime" class="form-control" value="<?php echo $dtime;?>" required>
                                        </div>
                                        <span>Activate / Deativate Trip :</span>
                                        <div class="mb-4">
                                            <select id="Dstatus" class="form-control mt-3" name="status" title="Select Active / Disable">
                                                <option value="0">Select Option</option>
                                                <option value="1">Activate</option>
                                                <option value="0">Disable</option>
                                        
                                            </select>  
                                        </div>
                                        <span>Select Bus / Car: </span>
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
                                        <span>Enter Amount:(eg 175.00)</span>
                                        <div class="mb-4">
                                        <input type="number" name="amt" class="form-control" value="<?php echo $price;?>" step=".01" required >

                                        </div>

                                        <div>
                                        <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-road"></i> Update Route</button>
                                        </div>
                                    </form>
                                    <?php } ?>
                                 </div>
                             </div>
                         </div>
                      </div>
                       
                </div> 
             </div>
        </div>   
                   
<?php 
include('footer.php');
?>