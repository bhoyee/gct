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
                                    <h4 class="mb-sm-0">Manage Sales</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Sales</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Search Sales Base on Date</h4>
                                        <p class="card-title-desc"><code>search base on date selection</code>.</p>
                                        <div>
                                            <form action="" method="post">
                                                <span>From:</span>
                                                <div class="mb-4">
                                                    <input type="date" name="fdate" class="form-control" placeholder="From">
                                                </div>
                                                <span>To:</span>
                                                <div class="mb-4">
                                                    <input type="date" name="tdate" class="form-control" placeholder="To">
                                                </div>
                                                <div>
                                                  <button type="submit" class="btn btn-primary btn-lg" name="button"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </form>
                                        </div>
                                            <?php
                                                if(isset($_POST['button'])){    //trigger button click
                                                $fdate=$_POST['fdate'];
                                                $tdate=$_POST['tdate'];
                                                $statuzi = 'Paid';
                                                $record = mysqli_query($conn,"select SUM(price) AS price from invoice where status = '$statuzi' and  date between '$fdate' and '$tdate'"); // fetch data from database
                                                if (mysqli_num_rows($record) > 0) {
                                                $datas = mysqli_fetch_array($record);
                                                $_SESSION['fdate'] = $fdate;
                                                $_SESSION['tdate'] = $tdate;
                                                $rSales = $datas['price'];
                                            ?>

                                    </div>
                                    <div class="card-body bg-warning">
                                        <a href="#">
                                            <h4>Search Result</h4> <br>
                                            <h6>
                                                Your sales <strong>from</strong> <?php echo $fdate; ?> <strong>to </strong> <?php echo $tdate; ?> is :
                                            </h6>
                                            <h2>$<?php echo $rSales; ?></h2>
                                            <h5 class="pb-2">Total Search Sales</h5>
                                        </a> <br>
                                        <div class="">
                                            <a href="searchpdf.php" target="_blank">
                                                <button type="submit" name="btn2" class="btn btn-success"><i class="fa fa-sign-in"></i> Download PDF Report</button>

                                            </a>
                                        </div>
                                        <?php

                                            if($datas < 0){
                                            $msg = "No Result Found";
                                            $rSales = 0;
                                                }
                                              }
                                            }
                                        ?>

                                    </div>
                                </div> 
                            </div>
                            <!-- end col -->
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">SEARCH TO EDIT / DELETE RECORD</h4>
                                        <p class="card-title-desc"><code>search to edit / delete record</code> </p>
                                        <div>
                                            <form action="" method="post">
                                                <span>Date of Transaction:</span>
                                                <div class="mb-4">
                                                     <input type="date" name="fdate" class="form-control" placeholder="From">
                                                </div>
                                              
                                               
                                                <div>
                                                  <button type="submit" class="btn btn-primary btn-lg" name="btn"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </form> 
                                        </div>
                                     

                                    </div> <br><br><hr>
                                    <div class="card-body bg-warning">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>    
                                                <tr>
                                                        <th></th>
                                                        <th style="font-size:12px">Booking Numb</th>
                                                        <th style="font-size:12px">Price</th>
                                                        <th style="font-size:12px">Date</th>
                                                        <th style="font-size:12px">Status</th>
                                                        <th></th>
                                                        <th></th>
                                                </tr>
                                            </thead>
                                            <?php
                                                if(isset($_POST['btn'])){    //trigger button click
                                                $fdate=$_POST['fdate'];
                                                $status = 'Paid';
                                                $i = 1;
                                                $rec = mysqli_query($conn,"select * from invoice where date = '$fdate'"); // fetch data from database
                                                if (mysqli_num_rows($rec) > 0) {
                                                while($reg = mysqli_fetch_array($rec))
                                                    {
                                                    $_SESSION['fdate'] = $fdate;

                                                    $msg = "we have data";
                                                    $rbook = $reg['bookingCode'];
                                                    $rprice = $reg['price'];
                                                    $rdate = $reg['date'];
                                                    $status = $reg['status'];
                                            ?>
                                             <tr>

                                                <td><?php echo $i; $i++; ?> </td>
                                                <td style="font-size:12px"><?php echo $rbook; ?></td>
                                                <td style="font-size:12px"><?php echo $rprice; ?></td>
                                                <td style="font-size:12px"><?php echo $rdate; ?></td>
                                                <td style="font-size:12px"><?php echo $status; ?></td>

                                                <td style="font-size:12px">
                                                <a href="editUpdateSale.php?id=<?php echo $reg['id']; ?>"><b>Edit</b></a>

                                                </td>
                                                <td style="font-size:12px">
                                                <a href="salesdelete.php?id=<?php echo $reg['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"> <b>Delete</b></a>


                                                </td>
                                            </tr>
                                            <?php
                                                }
                                             }else {
                                                $msg = "No Record Found";

                                                }
                                            }
                                            
                                            ?>
                                    </table>

                                     
                                    

                                    </div>
                                </div> <!-- end card -->
                        </div>
                        <!-- end row -->

                  
                    </div>
                </div>
            </div>
<?php 
include('footer.php');
?>