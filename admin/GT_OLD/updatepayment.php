<?php
include('header.php');
// including the database connection file
   include("connect.php");

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

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Update Payment Status</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Edit / Update Payment Status</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <section id="pricing-page-area" class="section-padding">
        <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div class="col-lg-12 col-md-6 m-auto mt-3">
              <div class="login-page-content">
                <div class="login-form">
                  <h6>Edit / Update Payment</h6><br>

                  <?php

                     $status = "";
                 if(isset($_POST['new']) && $_POST['new']==1)
                 {
                      $id = $_POST['id'];

                      $nstatus=$_POST['nstatus'];
                    

                      // convert 12-hour time to 24-hour time 
                    //   $ntime  = date("H:i", strtotime($udtime));
                           


                      // checking empty fields

                          //updating the table
                          $result = mysqli_query($conn, "UPDATE stripe_payment SET status='$nstatus' WHERE bookingCode=$id");


                          $resul2 = mysqli_query($conn, "UPDATE invoice SET status='$nstatus' WHERE bookingCode=$id");


                          //redirectig to the display page. In our case, it is index.php
                          // header("Location: index.php");
                          $status = "Payment Status Updated Successfully. </br></br>
                            <a href='adminpayment.php' >Go Back to Payment Page</a>";
                          echo '<p style="color:#fff;">'.$status.'</p>';

                        } else {

                        ?>

                  <form action="" method="post">
                    <div class="form-row">
                      <div class="">
                        <input type="hidden" name="new" value="1" />
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Booking Number</span>
                        <input type="text" name="bid" class="form-control" value="<?php echo $bid;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Full Name</span>
                        <input type="text" name="fname" class="form-control" value="<?php echo $fName;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Email</span>
                        <input type="text" name="email" class="form-control" value="<?php echo $email;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Amount Paid</span>
                        <input type="text" name="amt" class="form-control" value="<?php echo '$'.$amt;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Payment Date</span>
                        <input type="text" name="ddate" class="form-control" value="<?php echo $p_date;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Current Payment Status</span>

                        <input type="text" name="status" class="form-control" value="<?php echo $cstatus;?>" readonly>
                      </div> <br><br>

                      <div class="col-md-6">
                        <span style="color:#fff">Change Payment Status</span>
                        <select id="nstatus" class="form-control mt-3" name="nstatus" title="Select Payment New Payment Status">
                                                    <option value="Successed">Select Payment Status</option>
                                                    <option value="Dispute">Dispute</option>
                                                    <option value="Failed">Failed</option>
                                                    <option value="Refunded">Refunded</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Successed">Successed</option>
                                                    <option value="Refund Cancel">Refund Cancel</option>
                                                </select>

                      </div>
                        <br><br>
                      <div class="col-md-6" style="margin-bottom:120px">

                      </div>

                      <div class="log-btn">
                        <!-- <input name="submit" type="submit" class="btn btn-lg-primary" value="Update" /> -->
                        <button type="submit" name="button"> <i class="fa fa-sign-in"></i> Update</button>
                      </div>

                  </form>
                   <?php } ?>

                </div>


              </div>



            </div>
          </div>
        </div>
      </section>

<?php include('footer.php');?>