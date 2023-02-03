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
                                    <h4 class="mb-sm-0">Payment Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Payment</li>
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
                                    <h4 class="card-title">Search Payment</h4>
                                    <p class="card-title-desc">View All Current and Past Payment <code>Search By Transaction Date or By Booking Number</code></p>
                                    <div>
                                        <form action="" method="post">
                                  
                                           <span>Transaction Date</span>
                                           <div class="mb-4">
                                           <input type="date" name="tdate" class="form-control" placeholder="Date">
                                            </div>
                                            <span>Booking Numb</span>
                                           <div class="mb-4">
                                           <input type="text" name="bookID" class="form-control" placeholder="Search By Booking Number">
                                            </div>
                                        
                                            <div>
                                            <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-search"></i> Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

                                </div>
                            </div> 
                        </div>
                    </div>  
                    <!-- tabel data start here    -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
        
                                        <h4 class="card-title">Manage Records</h4>
                                        <p class="card-title-desc">Use below table to manage records. <code> You can delete records  </code> 
                                        </p>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th style="font-size:11px">Booking Num</th>
                                                <th style="font-size:11px">Transaction ID</th>
                                                <th style="font-size:11px">Full Name</th>
                                               <th style="font-size:11px">Email</th>
                                               <th style="font-size:11px">Amount</th>
                                               <th style="font-size:11px">Payment Date</th>
                                               <th style="font-size:11px">Payment Status</th>
                                               <th style="font-size:11px"></th>
                                                
                                            </tr>
                                            </thead>
                                 <?php
                                    if(isset($_POST['button'])){    //trigger button click
                                    //date("Y-m-d", strtotime($orgDate));
                                    $i = 1;
                                    $tdate  = $_POST['tdate'];
                                    $bookID = $_POST['bookID'];

                                  
                                    $record = mysqli_query($conn,"select trx_id, bookingCode, fName, email, amt, status, p_date from stripe_payment where bookingCode LIKE '".$bookID."' OR ddate LIKE '".$tdate."'"); // fetch data from database
                                    if (mysqli_num_rows($record) > 0) {
                                    while($datas = mysqli_fetch_array($record))
                                      {
                    
                                      //  $rId = $datas['id'];
                                       $trx_id = $datas['trx_id'];
                                      $bid = $datas['bookingCode'];
                                      $name = $datas['fName'];
                                      $email = $datas['email'];
                                      $amt  = $datas['amt'];
                                      $status = $datas['status'];
                                      $date = $datas['p_date'];
                               ?>
                     <tr>
                         <td style="font-size:11px"><?php echo $i; $i++; ?> </td>
                         <td style="font-size:11px"><?php echo $bid; ?></td>    
                        <td style="font-size:11px"><?php echo $trx_id; ?></td>       
                        <td style="font-size:11px"><?php echo $name; ?></td>  
                        <td style="font-size:11px"><?php echo $email; ?></td>  
                        <td style="font-size:11px"><?php echo '$'.$amt; ?></td>         
                        <td style="font-size:11px"><?php echo $date; ?></td>
                        <td style="font-size:11px"><?php echo $status; ?></td>          
                        <td>
                      <a href="updatepayment.php?id=<?php echo $datas['bookingCode']; ?>"> <i class="fa fa-edit" title="Edit / change payment status">edit</i></a>

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
                   $record1 = mysqli_query($conn,"select trx_id, bookingCode, fName, email, amt, status, p_date from stripe_payment where ddate='$cdate'"); // fetch data from database
                   if (mysqli_num_rows($record1) > 0) {
                   while($datas1 = mysqli_fetch_array($record1))
                     {
    
                     //  $rId = $datas['id'];
                     $trx_id = $datas1['trx_id'];
                     $bid = $datas1['bookingCode'];
                     $name = $datas1['fName'];
                     $email = $datas1['email'];
                     $amt  = $datas1['amt'];
                     $status = $datas1['status'];
                     $date = $datas1['p_date'];
                
    
                     ?>
                     <tbody>
                     <tr>
                     <td style="font-size:11px"><?php echo $i; $i++; ?> </td>
                       <td style="font-size:11px"><?php echo $bid; ?></td>  
                       <td style="font-size:11px"><?php echo $trx_id; ?></td>        
                       <td style="font-size:11px"><?php echo $name; ?></td>  
                       <td style="font-size:11px"><?php echo $email; ?></td>  
                       <td style="font-size:11px"><?php echo '$'.$amt; ?></td>         
                       <td style="font-size:11px"><?php echo $date; ?></td>
                       <td style="font-size:11px"><?php echo $status; ?></td>  
                     
                       <td style="font-size:11px">
                          <a href="updatepayment.php?id=<?php echo $datas1['bookingCode']; ?>"> <i class="fa fa-edit" title="Edit / change payment status"></i></a>
    
                          </td>
                      </tr>
                      <?php $count++; ?>
                     </tbody>
    
                       <?php
                     }
                    }else {
                      $msg = "No Payment Today Yet";
    
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