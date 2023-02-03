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
                                    <h4 class="mb-sm-0">Search Transaction</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Search Transaction</li>
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
                                    <h4 class="card-title">Search Transaction</h4>
                                    <p class="card-title-desc">Search with date, booking <CODE>number </CODE> or email.</p>
                                    <div>
                                        <form action="" method="post">
                                            <span>Search by Date</span>
                                            <div class="mb-4">
                                             <input type="hidden" name="fID" value="1" />
                                              <input type="date" name="fdate" class="form-control" placeholder="From">                           
                                           </div>
                                           <span>Seach by Booking Number</span>
                                           <div class="mb-4">
                                           <input type="text" name="bookID" class="form-control" placeholder="Search By Booking Number">
                                            </div>
                                            <span>Search by Email</span>
                                           <div class="mb-4">
                                                <input class="form-control" type="email" name="email" placeholder="Search By Email">
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
                                                <th>Booking Num</th>
                                                <th>Email</th>
                                                <th>Trip Type</th>
                                               <th>Booking Date</th>
                                               <th></th>
                                                
                                            </tr>
                                            </thead>
                                 <?php
                                    if(isset($_POST['button'])){    //trigger button click
                                    //date("Y-m-d", strtotime($orgDate));
                                    $i = 1;
                                    // $fname=$_POST['fname'];
                                    $bookID=$_POST['bookID'];
                                    $fdate=$_POST['fdate'];
                                    $femail=$_POST['email'];
                                    // $fphone=$_POST['phone'];

                                  
                                    $record = mysqli_query($conn,"select id, bookingCode, tripChar, email, regDate from book where bookingCode LIKE '".$bookID."' OR regDate LIKE '".$fdate."' OR email LIKE '".$femail."' ORDER BY id desc;"); // fetch data from database
                                    if (mysqli_num_rows($record) > 0) {
                                    while($datas = mysqli_fetch_array($record))
                                      {
                    
                                      //  $rId = $datas['id'];
                                      $bookingID = $datas['bookingCode'];
                                      $tripChar = $datas['tripChar'];
                                      $rEmail = $datas['email'];
                                    //   $rPDate = $datas['PDate'];
                                    //   $rPUp = $datas['pAddress'];
                                    //   $rDAdd = $datas['DAddress'];
                                      $rDate = $datas['regDate'];
                               ?>
                     <tr>
                         <td><?php echo $i; $i++; ?> </td>
                        <td><?php echo $bookingID; ?></td>
                        <td><?php echo $rEmail; ?></td>
                        <td><?php echo $tripChar; ?></td>                
                        <td><?php echo $rDate; ?></td>           
                        <td align="center">
                        <a href="searchdelete.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to delete?')" title="Delete"> <i class="fa fa-trash"></i></a>


                        </td>
                      </tr>
                      <?php
                     }
                    }else {
                      $msg = "No Result Found";
    
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