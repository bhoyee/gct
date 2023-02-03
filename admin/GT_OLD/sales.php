<?php 
include('header.php');
?>
<?php

   include("connect.php");
   
$msg = '' ;
$msgs = '';
$datas = '';
$rSales = '';
$fdate = '';
$tdate = '';
$status = 'Paid';
$unpaid = 'Unpaid';
     //current sales
     $date = date('Y-m-d');
     $data = mysqli_query($conn, "select SUM(price) AS price from invoice where date = '$date' and status = '$status' ");
     $todaySale = mysqli_fetch_assoc($data);
     $sale = $todaySale['price'];
     if (is_null($sale)){
        $sale = 0;
     }
     //total sals
     $data2 = mysqli_query($conn, "select SUM(price) AS price from invoice where status = '$status'");
     $totalSale = mysqli_fetch_assoc($data2);
     $tSale = $totalSale['price'];
     if (is_null($tSale)){
        $tSale = 0;
     }

     //total Unpaid sals
     $data3 = mysqli_query($conn, "select SUM(price) AS price from invoice where status = '$unpaid'");
     $totaluSale = mysqli_fetch_assoc($data3);
     $tuSale = $totaluSale['price'];
     if (is_null($tuSale)){
        $tuSale = 0;
     }


////

?>




    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Sales</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Get All Sales Transactions Here.</p>
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
            <div class="pricing-details-content">
              <div class="row">
              <!-- Single Pricing Table -->
              <div class="col-lg-4 col-md-4 text-center">
                <a href="salespdf.php" target="_blank">
                <div class="single-pricing-table">

                  <h3>Today Sales</h3>
                  <h2>$<?php echo $sale; ?></h2>
                  <h5 class="pb-2">Today Total Sales</h5>
                </a>
                </div>
              </div>
              <!-- Single Pricing Table -->

              <!-- Single Pricing Table -->


                <div class="col-lg-4 col-md-4 text-center">
                  <a href="totalsalespdf.php" target="_blank">
                  <div class="single-pricing-table">

                    <h3>Total Sales</h3>
                    <h2>$<?php echo $tSale; ?></h2>
                    <h5 class="pb-2">Total Sales</h5>
                  </a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 text-center">
                  <a href="totalUnpaidsalespdf.php" target="_blank">
                  <div class="single-pricing-table">

                    <h3>UnPaid Sales</h3>
                    <h2>$<?php echo $tuSale; ?></h2>
                    <h5 class="pb-2">Total Unpaid Sales</h5>
                  </a>
                  </div>
                </div>


                </div>
              </div> <br/>
              <div class="pricing-details-content">
                <div class="row">
                <!-- Single Pricing Table -->


              <div class="col-lg-6 col-md-6 ">

                <div class="login-page-content">
                  <div class="login-form">
                    <h3>Search Sales Base on Date</h3>
                    <form action="" method="post">
                      <div class="form-row">
                        <div class="col">
                          <span style="color:#fff">From</span>
                          <input type="date" name="fdate" class="form-control" placeholder="From">
                        </div>
                        <div class="col">
                          <span style="color:#fff">To</span>
                          <input type="date" name="tdate" class="form-control" placeholder="To">
                        </div>
                      </div>
                      <div class="log-btn">
                        <button type="submit" name="button"><i class="fa fa-sign-in"></i> Search</button>
                      </div>
                    </form>

                  </div>


                </div>
                <br>

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

                  <div class="pricing-details-content">
                    <div class="row">
                    <!-- Single Pricing Table -->
                    <div class="col-lg-12 col-md-8 text-center">
                      <a href="#">
                      <div class="single-pricing-table">
                          <h4>Search Result</h4> <br>
                        <h6>
                          Your sales <strong>from</strong> <?php echo $fdate; ?> <strong>to </strong> <?php echo $tdate; ?> is :
                        </h6>
                        <h2>$<?php echo $rSales; ?></h2>
                        <h5 class="pb-2">Total Search Sales</h5>
                      </a> <br>
                        </div>
                        <div class="">
                          <a href="searchpdf.php" target="_blank">
                            <button type="submit" name="btn2" class="btn btn-success"><i class="fa fa-sign-in"></i> Download PDF Report</button>

                          </a>
                        </div>

                      </div>
                    <!-- Single Pricing Table -->


                      </div>
                    </div> <br/>
                    <?php

                        if($datas < 0){
                          $msg = "No Result Found";
                          $rSales = 0;
                        }
                      }
                    }
                     ?>


                  <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>


              </div>

                <div class="col-lg-6 col-md-6 pb-3 ">


                                  <div class="login-page-content">
                                    <div class="login-form">
                                      <h3>Search to edit / delete Record</h3>
                                      <form action="" method="post">
                                        <div class="form-row">
                                          <div class="col">
                                            <span style="color:#fff">Date of Transaction</span>
                                            <input type="date" name="fdate" class="form-control" placeholder="From">
                                          </div>

                                        </div>
                                        <div class="log-btn">
                                          <button type="submit" name="btn"><i class="fa fa-sign-in"></i> Search</button>
                                        </div>
                                      </form>

                                    </div>


                                  </div>

                                  <br>
                                  <div class="table-responsive">
                                    <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msgs; ?></p>

                                  <table class="table table-striped table-dark w-100 ">
                                    <thead>
                                      <tr>
                                      <th scope="col"></th>
                                      <th scope="col">Confirmation Number</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Date</th>
                                        <th scope="col">Payment Status</th>

                                    </tr>
                                  </thead>

                                  <?php
                                  if(isset($_POST['btn'])){    //trigger button click
                                  $fdate=$_POST['fdate'];
                                  $status = 'Paid';
                                  $count=1;
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


                                    <tbody>
                                    <tr>

                                      <td align="center"><?php echo $count; ?></td>
                                      <td><?php echo $rbook; ?></td>
                                      <td><?php echo $rprice; ?></td>
                                      <td><?php echo $rdate; ?></td>
                                      <td><?php echo $status; ?></td>

                                      <td>
                                        <a href="editUpdateSale.php?id=<?php echo $reg['id']; ?>"> <i class="fa fa-edit" title="Edit"></i></a>

                                    </td>
                                    <td align="center">
                                      <a href="salesdelete.php?id=<?php echo $reg['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash" title="Delete"></i></a>


                                      </td>
                                     </tr>
                                     <?php $count++; ?>
                                    </tbody>

                                    <?php
                                  }
                                 }else {
                                   $msgs = "No Result Found";
                                  }

                                }
                                  ?>
                              </table> </div>
                           <?php mysqli_close($conn); // Close connection ?>

                     <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msgs; ?></p>

                </div>
              </div>
            </div>
          </div>
                <!-- Pricing Content End -->


          </div>
        </div>
    </section>

<?php include('footer.php');?>