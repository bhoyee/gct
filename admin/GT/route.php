<?php 
include('header.php');
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
                                    <h4 class="mb-sm-0">Routes Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Single route Management</li>
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
                                    <h4 class="card-title">Search / Manage Single Trip</h4>
                                    <p class="card-title-desc">Search single trip (<code>Select deparute and arrival and Date.</code>) </p>
                                    <div>
                                    <?php
                                     if (isset($_POST['create'])){
    
                                        $city1  = trim($_POST["city1"]);
                                        $terminal1  = trim($_POST["terminal1"]);
                                  
                            
                                        $selectCus   = "select name from city where name='$city1'"; 
                                        $resultCus   = mysqli_query($conn, $selectCus);
                                        $num_row_cus = mysqli_num_rows($resultCus);
                            
                                        if($num_row_cus >0){
                            
                                            echo '<div class="alert alert-danger" role="alert">
                                            <strong>Alert!</strong> City Name already exist.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                        }else {
                            
                                        $sql = "INSERT INTO city (name, terminal) 
                                        VALUES ('$city1','$terminal1')";
                            
                                        // $sql = mysqli_query($conn, $sql3_cus);
                            
                                        if ($conn->query($sql) === TRUE) {
                                            
                                            echo '<div class="alert alert-success" role="alert">
                                            <strong>Alert!</strong> New City / Termical Created Successfully.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                        } else {
                                            // echo "Error: " . $sql . "<br>" . $conn->error; // this show err 
                                            echo '<div class="alert alert-danger" role="alert">
                                            <strong>Alert!</strong> Something Went Wrong.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                        }
                                      }
                                        
                                            
                                    }
                            
                                        ?>
                            
                                        <form action="" method="post">

                                        <span>Select Departure</span>
                                            <div class="mb-4">
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
                                            
                                            <span>Select Arrival</span>
                                            <div class="mb-4">
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
                                            <span>Route Date</span>
                                            <div class="mb-4">
                                            <input type="date" name="ddate" class="form-control" value="" required>

                                            </div>
                                        
                                            <div>
                                            <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-road"></i> Search Route</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>  
                    
                     <!-- tabel data start here    -->
                     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
        
                                       
                                    <h4 class="card-title">Manage Routes / Trip</h4>
                                        <p class="card-title-desc">Use the table below to manage routes / Trip <code>( edit , update and delete route / trip )</code>  </p>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>    
                                        <tr>
                                                <th></th>
                                                <th style="font-size:12px">Route Cities</th>
                                                <th style="font-size:12px">Depature Date</th>
                                                <th style="font-size:12px">Depature Time</th>
                                                <th style="font-size:12px">Bus/Car</th>
                                                <th style="font-size:12px">Price</th>
                                                <th style="font-size:12px">Route Status</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <?php
                      if(isset($_POST['button'])){
                        $i = 1;
                        //trigger button click
                  //date("Y-m-d", strtotime($orgDate));
                  $dfrom=$_POST['dfrom'];
                  $dto=$_POST['dto'];
                  $ddate =$_POST['ddate'];
         
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
                    <tr>
                    <td><?php echo $i; $i++; ?> </td>                     <!-- <td><?php echo $rcities; ?></td> -->
                     <td style="font-size:12px"><?php echo ('From: '.$str_arr[0] .', '.'To: '.' '. $str_arr[2]);?></td>
                     <td style="font-size:12px"><?php echo $rdate; ?></td>                
                     <td style="font-size:12px"><?php echo $rtime; ?></td>
                     <td style="font-size:12px"><?php echo $bus; ?></td>
                     <td style="font-size:12px" >$<?php echo $price; ?></td>
                     <?php 
                      if($status == 1) {
                        echo ' <td class="text-success style="font-size:9px"">Active</td>';
                      }
                      else{
                        echo ' <td class="text-danger style="font-size:9px"">Non Active</td>';
  
                      }
                      ?>
                    <td>
                      <a href="updateroute.php?id=<?php echo $datas['id']; ?>"><button class="btn btn-primary text-white"><i class="fa fa-edit text-white" style="font-size:9px">edit</i></a></button>

              		</td>
                      <?php
                     if($status == 1){

                       ?>
                   <td>
                   <a href="routesuspend.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to suspend this route?')"> <button class="btn btn-warning" style="font-size:9px">Suspend</button></a>

                   </td>
                       <?php
                     }
                     else{
                        ?>
                   <td>
                    <a href="routeactive.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to activate this route?')"> <button class="btn btn-success" style="font-size:9px">Activate</button></a>

                   </td>
                     <?php
                     }
                     ?>
                   <td>
                   <a href="routedelete.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to delete th route?')"> <button class="btn btn-danger" style="font-size:9px">Delete</button></a>

                   </td>
                   </tr>
                    <?php
                  }
                 }else {
                   $msg = "No Result Found";

                  }
                  echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                  ";


                } else{
                $cdate = date("Y-m-d");
                $i = 1;
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
                 <tr>
                 <td><?php echo $i; $i++; ?> </td>                    <!-- <td><?php echo $rcities; ?></td> -->
                   <td style="font-size:12px"><?php echo ('From: '.$str_arr[0] .', '.'To: '.' '. $str_arr[2]);?></td>
                   <td style="font-size:12px"><?php echo $rdate; ?></td>                
                   <td style="font-size:12px"><?php echo $rtime; ?></td>
                   <td style="font-size:12px"><?php echo $bus; ?></td>
                   <td style="font-size:12px">$<?php echo $price; ?></td>
                   <?php 
                    if($status == 1) {
                      echo ' <td class="text-success" style="font-size:12px"><b>Active</b></td>';
                    }
                    else{
                      echo ' <td class="text-danger" style="font-size:12px"><b>Non Active</b></td>';

                    }
                    ?>
                   <td>
                     <a href="updateroute.php?id=<?php echo $datas1['id']; ?>"> <button class="btn btn-primary text-white"><i class="fa fa-edit text-white" style="font-size:9px">edit</i></a></button>
                     </td>
                     <?php
                     if($status == 1){

                       ?>
                          <td>
                          <a href="routesuspend.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to suspend this route?')"> <button class="btn btn-warning" style="font-size:9px">Suspend</button></a>

                   </td>
                       <?php
                     }
                     else{
                        ?>
                        <td>
                        <a href="routeactive.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to activate this route?')"> <button class="btn btn-success" style="font-size:9px">Activate</button></a>

                 </td>
                     <?php
                     }
                     ?>
                    <td>
                   <a href="routedelete.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to delete th route?')"> <button class="btn btn-danger" style="font-size:9px">Delete</button></a>

                   </td>
                  </tr>
                   <?php
                 }
                }else {
                  $msg = "No Register Route Available";

                 }
                 echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                 ";
                }
                  ?>
              </table>
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