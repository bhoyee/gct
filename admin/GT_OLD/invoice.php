<?php

include("connect.php");

include("connection.php");
require('invoicepdf.php');
$msg ='';
$suc = '';
?>

<?php 
include('header.php');
?>

    <!--== Page Title Area Start ==-->
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Generating Paid Invoice / Receipt</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Payment Invoice / Receipt for Trip.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>

        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">

                	<div class="login-page-content">
                    <?php
                    if(isset($_POST['button2'])){    //trigger button click
                      $date = date('Y-m-d H:i:s');

                      // $prcie = mysqli_real_escape_string($conn, $_POST['price']);

                    $price = intval($_POST['price']);
                    $bnumb= $_POST['confNo'];
                    $status = 'Paid';
                    $chkConfNo = mysqli_query($conn, "select bookingCode from invoice where bookingCode = '$bnumb' and status = '$status' ");
                    $records = mysqli_query($conn,"select * from book where bookingCode = '$bnumb'"); // fetch data from database
                    if (mysqli_num_rows($chkConfNo) > 0){
                      $msg = "Passanger Paid Already";

                    } else if (mysqli_num_rows($records) > 0) {

                      while($data = mysqli_fetch_array($records))
                          {

                            $bookCode = $data['bookingCode'];
                            $email = $data['email'];
                            $_SESSION['bnumb'] = $bookCode;
                            $status = "Paid";

                            $getOldPrice = mysqli_query($conn,"select * from invoice where bookingCode = '$bnumb' and status = 'Unpaid' ORDER BY date DESC");
                            mysqli_num_rows($getOldPrice);
                            $pdata = mysqli_fetch_array($getOldPrice);
                            $oldP = $pdata['price'];
                            if($oldP == $price){

                            $invoice = "update invoice SET status = '$status' WHERE bookingCode = $bookCode";

                            // $invoice = "insert into invoice (bookingCode, price , date, status) values ('$bookCode', '$price', '$date', '$status')";

                             if(mysqli_query($conn, $invoice)){
                                // $msg = "Records added successfully.";




                                $getPrice = mysqli_query($conn,"select * from invoice where bookingCode = '$bnumb' and status = '$status' ORDER BY date DESC");


                                if (mysqli_num_rows($getPrice) > 0) {
                                  while($price = mysqli_fetch_array($getPrice))
                                      {
                                        $prize = $price['price'];

                                        $suc = "Paid Invoice sent successfully";
                                        $note = 'Click on the link '. 'http://www.google.com'.' to complete payment for your trip ';
                                  $adminNote = 'Kindly contact the customer to confirm that booking and send price quote';
  
                                  $subject='GCT - Payment Paid Receipt';
                                  $subject2='GCT - Payment Paid Receipt';
                                  $fromEmail =$email;
                                  $cmail = 'gidicruiztransportation@gmail.com';
                                  $mailto =  $cmail;
                              
                                  $message = "Dear  Admin". "\n\n"
  
                                  . "You successfully sent Payment Paid Receipt to "."( ".$email. " )".". Find the details below " . "\n\n"
                                  
                                  . "Amount  Paid   : " . "\n". $prize ." USD"."\n\n"
                                  . "Customer Email : " . "\n" . $email . "\n\n"
                                  . "Booking Number : " . "\n" . $bookCode . "\n\n"
                                  
  
                                  
                                  . "Regards," . "\n" . "- System Support";
                                  
                                  //Message for client confirmation
                                  $message2 = "Dear Customer". "\n\n"
  
                                  . "Thank you for making reservation with us. Below is the Payment Paid Receipt for the trip!" . "\n\n"
                              
                                  . "Amount Paid    : " . "\n". $prize . " USD". "\n\n"
                                  . "Customer Email : " . "\n" . $email . "\n\n"
                                  . "Booking Number : " . "\n" . $bookCode . "\n\n"
                              
                                  
                                  . "Regards," . "\n" . "- CS Diddy-Transport";
                                  
                                  //Email headers
                                  $headers = "From: " . $mailto; // Client email, I will receive
                                  $headers2 = "From: " . $mailto; // This will receive client
                                  
                                  //PHP mailer function
                                  
                                  mail($mailto, $subject, $message, $headers); // This email sent to My address
                                  mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
                                  
  
                                ?>
                                <div class="">

                                  <a href="invpdf.php" target="_blank">
                                    <button type="submit" name="button" class="btn btn-success"><i class="fa fa-sign-in"></i> Download Pdf Paid Invoice</button>

                                  </a>

                                </div>
                                <?php
                              }
                            }




                        } else{
                            $msg = "Something went wrong";
                        }
                     }else{
                        $msg = "Price amount is different from Unpaid amount";

                     }
                    }
                     } else {
                             $msg = "No Booking Found";
                     }

               }


                                 ?>
                                 <?php mysqli_close($conn); // Close connection ?>
                    <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>
                    <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#61b15a; margin-top:10px"><?php echo $suc; ?></p>
		                 <div class="login-form">
                			<h3>Generate Paid invoice</h3>
        							<form action="" method="post">
                        <div class="username">
        									<input type="number" name="confNo" placeholder="Confirmation Number" required>
        								</div>
        								<!-- <div class="username">
        									<input type="text" name="price" placeholder="Price" required>
        								</div> -->

                       <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">$</span>
                        </div>
                        <input type="number" id="price" name="price" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" required>
                      </div>

        								<div class="log-btn">
        									<button type="button" name="button1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-in"></i> Generate</button>
        								</div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Before Sending</h5>

                              </div>
                              <div class="modal-body">

                                Is The Price and Confirmation Number Correct ? 

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="button2" class="btn btn-primary">Send Invoice</button>
                              </div>

                            </div>
                          </div>
                        </div>

        							</form>

                		</div> <br>

                  
                	</div>
                </div>

        	</div>

        </div>
    </section>

      <!-- /GetButton.io widget -->
      <script>
          setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 10000);
        </script>

<?php include('footer.php');?>