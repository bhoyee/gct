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
                                    <h4 class="mb-sm-0">Booking Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Manage Booking</li>
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
                                    <h4 class="card-title">Manage Booking</h4>
                                    <p class="card-title-desc">Search with Booking Number (eg. 883153).</p>
                                    <div>
                                        <form action="" method="post">

                                            <div class="mb-4">
                                                <input class="form-control" type="text" name="bnumb" placeholder="Booking Number">
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
        
                                        <h4 class="card-title">Manage Booking</h4>
                                        <p class="card-title-desc">The table below display today's booking without search. <code> It also display data when use the form above to search using the booking number </code> 
                                        </p>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Booking Num</th>
                                                <th>Full Name</th>
                                                <th>Trip Type</th>
                                                <th>Book Date</th>
                                                <th>Trip Date</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <?php
                                if(isset($_POST['button'])){
                                    $i = 1;
                                    //trigger button click
                                //date("Y-m-d", strtotime($orgDate));
                                $bnumb= trim($_POST['bnumb']);
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
                                <tr>
                                <td><?php echo $i; $i++; ?> </td>
                                <td><?php echo $bcode; ?></td> 
                                <td><?php echo $fName; ?></td>
                                <td><?php echo $ttype; ?></td>                
                                <td><?php echo $rdate; ?></td>
                                <td><?php echo $bbdate; ?></td>
                                <td><?php echo $bstatus; ?></td>
                                <td>
                                <a href="adminbcancel.php?id=<?php echo $datas['bcode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-warning" style="font-size:12px">Cancel Booking</button></a>

                                </td>
                                    <td>
                                <a href="adminbdelete.php?id=<?php echo $datas['bcode']; ?>" onClick="return confirm('Are you sure you want to delete the route?')"> <button class="btn btn-danger" style="font-size:12px">Delete</button></a>

                                </td>
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
                                    $i = 1;
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
                                    <tr>
                                    <td><?php echo $i; $i++; ?> </td>
                                    <td><?php echo $bcode; ?></td> 
                                    <td><?php echo $fName; ?></td>
                                    <td><?php echo $ttype; ?></td>                
                                    <td><?php echo $rdate; ?></td>
                                    <td><?php echo $bbdate; ?></td>
                                    <td><?php echo $bstatus; ?></td>                    
                                    <td>
                                    <a href="adminbcancel.php?id=<?php echo $datas1['bcode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-warning" style="font-size:10px">Cancel Booking</button></a>
                                    </td>
                                        <td>
                                    <a href="adminbdelete.php?id=<?php echo $datas1['bcode']; ?>" onClick="return confirm('Are you sure you want to delete the route?')"> <button class="btn btn-danger" style="font-size:10px">Delete</button></a>
                    
                                    </td>
                                    </tr>                   
                                    <?php
                                    }
                                    }else {
                                    $msg = "No Booking Today";
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