<?php 

include('header.php');

require('invoicepdf.php');

$msg ='';

$suc = '';

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

                                    <h4 class="mb-sm-0">Generate Custom Paid Invoice</h4>



                                    <div class="page-title-right">

                                        <ol class="breadcrumb m-0">

                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>

                                            <li class="breadcrumb-item active">Custom Paid Invoice</li>

                                        </ol>

                                    </div>



                                </div>

                            </div>

                        </div>

                        <!-- end page title --> 

                    

                        <div class="row d-flex justify-content-center">

                        

                        <div class="col-lg-8">

                        <?php

                    if(isset($_POST['button2'])){    //trigger button click

                      $date = date('Y-m-d H:i:s');



                      // $prcie = mysqli_real_escape_string($conn, $_POST['price']);



                    $price = floatval($_POST['price']);
                   // $tax = (6 * $price) / 100;
                    $tprice = $price;

                    $bnumb= $_POST['confNo'];

                    $status = 'Paid';

                    $chkConfNo = mysqli_query($conn, "select bookingCode from invoice where bookingCode = '$bnumb' and status = '$status' ");

                    $records = mysqli_query($conn,"select boidata.fullName AS fName, book.email AS email, book.bookingCode as bcode from book INNER JOIN boidata ON book.userid=boidata.userid where book.bookingCode = '$bnumb'"); // fetch data from database

                    if (mysqli_num_rows($chkConfNo) > 0){

                      $msg = "Passanger Paid Already";



                    } else if (mysqli_num_rows($records) > 0) {



                      while($data = mysqli_fetch_array($records))

                          {

                            $fName = $data['fName'];

                            $bookCode = $data['bcode'];

                            $email = $data['email'];

                            $_SESSION['bnumb'] = $bookCode;

                            $status = "Paid";



                            $getOldPrice = mysqli_query($conn,"select * from invoice where bookingCode = '$bnumb' and status = 'Unpaid' ORDER BY date DESC");

                            mysqli_num_rows($getOldPrice);

                            $pdata = mysqli_fetch_array($getOldPrice);

                            $oldP = $pdata['price'];

                           

                            if($oldP == $price)
                            {

                                $date = date('Y-m-d H:i:s');

                                 $invoice = "update invoice SET status ='$status', payDate='$date' WHERE bookingCode = $bookCode";



                                 // $invoice = "insert into invoice (bookingCode, price , date, status) values ('$bookCode', '$price', '$date', '$status')";



                                if(mysqli_query($conn, $invoice))
                                {
                                    //update book table
                                    mysqli_query($conn, "UPDATE book SET paystatus = 'Paid' WHERE bookingCode ='$bookCode'") or die("database error: ". mysqli_error($conn));

                                    //insert into stripe payment table
                                    $trx_id = uniqid('in_');
                                    $p_method = 'invoice';
                                    $sta = 'Successed';
                                    $insertTransactionSQL = "INSERT INTO stripe_payment(trx_id, bookingCode, fName, email, amt, status, p_date, ddate, pmethod)

                                     VALUES('".$trx_id."','".$bookCode."','".$fName."','".$email."','".$tprice."','".$sta."','".$date."','".$date."','".$p_method."')";

                                    mysqli_query($conn, $insertTransactionSQL) or die("database error: ". mysqli_error($conn));


                                  // $msg = "Records added successfully.";

                                    $getPrice = mysqli_query($conn,"select * from invoice where bookingCode = '$bnumb' and status = '$status' ORDER BY date DESC");



                                        if (mysqli_num_rows($getPrice) > 0) 
                                        {

                                          while($price = mysqli_fetch_array($getPrice))

                                            {

                                                    $prize = $price['price'];



                                                    $suc = "Paid Invoice sent successfully";

                                                    $note = 'Click on the link '. 'http://www.google.com'.' to complete payment for your trip ';

                                                    $adminNote = 'Kindly contact the customer to confirm that booking and send price quote';

            

                                                    $subject='GCT - Payment Paid Receipt';

                                                    $subject2='GCT - Payment Paid Receipt';

                                                    $fromEmail =$email;

                                                    $cmail = 'support@giddycruisetransportation.com';

                                                    $mailto =  $cmail;

                                                

                                                    $message = "Dear  Admin". "\n\n"

                    

                                                    . "You successfully sent Payment Paid Receipt to "."( ".$email. " )".". Find the details below " . "\n\n"

                                                    

                                                    . "Amount  Paid (Inc 6% Tax  : " . "\n". $prize ." USD"."\n\n"

                                                    . "Customer Email : " . "\n" . $email . "\n\n"

                                                    . "Booking Number : " . "\n" . $bookCode . "\n\n"

                                                                                    

                                                    . "Regards," . "\n" . "- System Support";

                                                    

                                                    //Message for client confirmation

                                                    $message2 = "Dear Customer". "\n\n"

                    

                                                    . "Thank you for making reservation with us. Below is the Payment Paid Receipt for the trip!" . "\n\n"

                                                
                                                    . "Total Amount Paid (Inc 6% Tax)    : " . "\n". $prize . " USD". "\n\n"

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

                                }
                                else
                                    {

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



                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Generate Custom Paid Invoice</h4>
                                <code class="card-title-desc">Custom Payment Invoice / Receipt for Trip.</code>
                                <div>
                                    <form action="" method="post"><br>
                                        <span>Email</span>
                                        <div class="mb-4">
                                            <input type="text" name="email" id="email" class="form-control mb-2" placeholder="Enter Email" required>
                                            <button type="button" class="btn btn-primary" id="searchEmail">Find Customer</button>
                                        </div>

                                        <div id="additionalFields" style="display: none;">
                                            <span>Full Name</span>
                                            <div class="mb-4">
                                                <input type="text" name="fullName" id="fullName" class="form-control" readonly>
                                            </div>
                                            <span>Date of Trip</span>
                                            <div class="mb-4">
                                                <input type="date" name="tripDate" class="form-control" required>
                                            </div>
                                            <span>Pick-up Address</span>
                                            <div class="mb-4">
                                                <input type="text" name="pickupAddress" class="form-control" placeholder="Pick-up Address" required>
                                            </div>
                                            <span>Drop-off Address</span>
                                            <div class="mb-4">
                                                <input type="text" name="dropoffAddress" class="form-control" placeholder="Drop-off Address" required>
                                            </div>
                                            <span>Invoice Date</span>
                                            <div class="mb-4">
                                                <input type="date" name="invoiceDate" class="form-control" required>
                                            </div>
                                            <span>Price</span>
                                            <div class="mb-4">
                                                <input type="number" name="price" class="form-control" placeholder="Price" required>
                                            </div>
                                            <button type="submit" name="button2" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                        $(document).ready(function(){
                            $('#searchEmail').click(function(){
                                var email = $('#email').val();
                                $.ajax({
                                    url: 'check_email.php',
                                    method: 'POST',
                                    data: { email: email },
                                    success: function(response){
                                        var data = JSON.parse(response);
                                        if(data.status === 'found'){
                                            $('#email').prop('readonly', true);
                                            $('#fullName').val(data.fullName); // Set the full name in the input
                                            $('#searchEmail').hide();
                                            $('#additionalFields').show();
                                        } else if (data.status === 'not_found') {
                                            alert('No such email found');
                                        } else {
                                            alert('Query failed. Please try again. Error: ' + data.error);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        alert('Error: ' + error);
                                    }
                                });
                            });
                        });
                        </script>


                        </div>

                    </div>   







                     </div>

                 </div>

            </div>

            <script>

          setTimeout(function() {

            $('#alert').fadeOut('fast');

        }, 20000);

        </script>

<?php 

include('footer.php');

?>

            