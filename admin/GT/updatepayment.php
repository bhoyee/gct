<?php 
include('header.php');

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT id, bookingCode, fName, amt, email, status , p_date, ddate FROM stripe_payment WHERE bookingCode=$id");

while($res = mysqli_fetch_array($result))
{
    $bid = $res['bookingCode'];
    $fName = $res['fName'];
    $ddate = $res['ddate'];
    $email = $res['email'];
    $cstatus = $res['status'];
    $ids = $res['id'];
    $amt= $res['amt'];
    $p_date= $res['p_date'];
   
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
                                    <h4 class="mb-sm-0">Update Payment Status</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Update Payment</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
              
                           <div class="col-lg-8">
                             <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit / Update Payment Status </h4>
                                    <p class="card-title-desc"><code> Edit / Update Payment Status.</code></p>
                                   
                                    <?php

                                if(isset($_POST['new']) && $_POST['new']==1)
                                {
                                    $id = $_POST['id'];

                                    $nstatus=$_POST['nstatus'];
                                
                                       $result = mysqli_query($conn, "UPDATE stripe_payment SET status='$nstatus' WHERE bookingCode=$id");


                                        $resul2 = mysqli_query($conn, "UPDATE invoice SET status='$nstatus' WHERE bookingCode=$id");


                                        //redirectig to the display page. In our case, it is index.php
                                        // header("Location: index.php");
                                        $status = "<b> Payment Status Updated Successfully. </b></br></br>
                                        <a href='adminpayment.php' class='btn btn-primary btn-lg'>Go Back to Payment Page</a>";
                                        echo '<p style="color:green;">'.$status.'</p>';

                                    } else {


                                        ?>
                                   <form action="" method="post">
                                   <div class="">
                                        <input type="hidden" name="new" value="1" />
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                    </div>
                                       <span>Booking Number</span>
                                        <div class="mb-4">
                                          <input type="text" name="bid" class="form-control" value="<?php echo $bid;?>" readonly>
                                        </div>

                                        <span>Full Name</span>
                                        <div class="mb-4">
                                            <input type="text" name="fname" class="form-control" value="<?php echo $fName;?>" readonly>
                                        </div>

                                        <span>Email</span>
                                        <div class="mb-4">
                                            <input type="text" name="email" class="form-control" value="<?php echo $email;?>" readonly>
                                        </div>

                                        <span>Amount Paid</span>
                                        <div class="mb-4">
                                             <input type="text" name="amt" class="form-control" value="<?php echo '$'.$amt;?>" readonly>
                                        </div>

                                        <span>Payment Date</span>
                                        <div class="mb-4">
                                            <input type="text" name="ddate" class="form-control" value="<?php echo $p_date;?>" readonly>
                                        </div>

                                        <span>Current Payment Status</span>
                                        <div class="mb-4">
                                             <input type="text" name="status" class="form-control" value="<?php echo $cstatus;?>" readonly>
                                        </div>

                                        <span>Change Payment Status</span>
                                        <div class="mb-4">
                                                <select id="nstatus" class="form-control mt-3" name="nstatus" title="Select Payment New Payment Status">
                                                    <option value="Successed">Select Payment Status</option>
                                                    <option value="Dispute">Dispute</option>
                                                    <option value="Failed">Failed</option>
                                                    <option value="Refunded">Refunded</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Successed">Successed</option>
                                                    <option value="Refund Cancel">Refund Cancel</option>
                                                </select>                                        </div>

                                      

                                        <div>
                                        <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-wallet"></i> Update Payment</button>
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