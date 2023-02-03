<?php 
include('header.php');

$msg = '' ;
$rSales = '';
$fdate = '';
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
                                    <h4 class="mb-sm-0">Seat Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">SEAT</li>
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
                                    <h4 class="card-title">Seat Search</h4>
                                    <p class="card-title-desc">View , Cancel and Monitor Seat.</p>
                                    <div>
                                        <form action="" method="post">
                                        <span>Destination Route:</span>

                                            <div class="mb-4">
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
                                            <span>Arrival Route:</span>
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

                                            <span>Trip Date</span>
                                            <div class="mb-4">
                                            <input type="date" name="tdate" class="form-control">
                                            </div>
                                            <span>Book Status</span>
                                            <div class="mb-4">
                                                <select id="Dept" class="form-control mt-3" name="status" title="Select Booking Status">
                                                    <option value="0">Select status</option>
                                                    <option value="active">Active</option>
                                                    <option value="cancel">Cancel</option>
                                                    <option value="expired">Expired</option>
                                                </select>
                                            </div>
               
                                        
                                            <div>
                                            <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-search"></i> Search</button>
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
                                    <div class="card-body ">
        
                                        <h4 class="card-title">Manage Seat</h4>
                                        <p class="card-title-desc">The table below display today's seat booked without search. <code> It also display data when use the form above to search </code> 
                                        </p>
                                        <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Booking Num</th>
                                                <th>Route</th>
                                                <th>Seat Numb</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th></th>
                                               
                                            </tr>
                                            </thead>

                                        <?php
                                            if(isset($_POST['button'])){ 
                                                $i = 1;   //trigger button click
                                                //date("Y-m-d", strtotime($orgDate));
                                                $dfrom=$_POST['dfrom'];
                                                $dto=$_POST['dto'];
                                                $tdate=$_POST['tdate'];
                                                $status=$_POST['status'];
                                
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
                                <tr>
                                <td><?php echo $i; $i++; ?> </td>
                                <td><?php echo $bookingID; ?></td>

                                <td class="w-20"><?php echo ('From: '. strtoupper($str_arr[0]) .':- '.$str_arr[1].' <br><b>To:</b> '.' '. strtoupper($str_arr[2]).' :-'.$str_arr[3]);?></td>
                                <td><?php echo $seat; ?></td>                
                                <td><?php echo $bDate; ?></td>
                                <td><?php echo $btime; ?></td>
                                <td><?php echo $status; ?></td>
           
                                <?php
                                if($status == 'active'){
            
                                    ?>
                                <td>
                                <a href="seatcancel.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger">cancel booking</button></a>

                                </td>
                                <?php
                                }
                                ?>
                                </tr>
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

                                    $i = 1;
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
                                  
                                    $string = $route;
                                    $str_arr = explode (",", $string);                     
                                ?>
                                    <tr>
                                    <td><?php echo $i; $i++; ?> </td>
                                    <td><?php echo $bookingID; ?></td>
                                    <td class="w-20"><?php echo ('From: '. strtoupper($str_arr[0]) .':- '.$str_arr[1].' <br><b>To:</b> '.' '. strtoupper($str_arr[2]).' :-'.$str_arr[3]);?></td>
                                    <td><?php echo $seat; ?></td>                
                                    <td><?php echo $bDate; ?></td>
                                    <td><?php echo $btime; ?></td>
                                    <?php
                                    if($status =='active'){ ?>

                                        <td class="badge bg-primary mt-2"><?php echo $status; ?></td>
                                      <?php  
                                    }

                                  ?>
                                    
                                    

                                    <?php
                                        if($status == 'active'){

                                        ?>
                                            <td width="10%">
                                    <a href="seatcancel.php?id=<?php echo $datas1['bookingCode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger">cancel booking</button></a>

                                    </td>
                                    <?php
                                    }
                                    ?>

                                    </tr>                   
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
                    
                        
                        
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        
                                    </div> <!-- container-fluid -->
                                </div>
                                <!-- End Page-content -->
<?php 
include('footer.php');
?>