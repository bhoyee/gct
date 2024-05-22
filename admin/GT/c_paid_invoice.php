<?php 

include('header.php');

require('invoicepdf.php');

$msg ='';

$suc = '';

?>      
    <style>
        .loader {
            border: 4px solid #f3f3f3; /* Light grey */
            border-top: 4px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>  




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

                      
                            <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

                            <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#61b15a; margin-top:10px"><?php echo $suc; ?></p>



                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Generate Custom Paid Invoice</h4>
                                    <code class="card-title-desc">Custom Payment Invoice / Receipt for Trip.</code>
                                    <div>
                                        <form action="submit_invoice.php" method="post"><br>
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
                                                <span>Booking Code</span>
                                                <div class="mb-4">
                                                    <input type="text" name="bookingCode" id="bookingCode" class="form-control" readonly>
                                                </div>
                                                <span>Transaction ID</span>
                                                <div class="mb-4">
                                                    <input type="text" name="trx_id" id="trx_id" class="form-control" readonly>
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
                                                                       <button type="submit" name="submitInvoice" class="btn btn-primary" onclick="showLoader()">Submit</button>
                                            </div>
                                        </form>
                                        <div class="loader" id="loader" style="display: none;"></div>

                                        <script>
                                            function showLoader() {
                                                // Add a delay of 500 milliseconds (half a second)
                                                setTimeout(function() {
                                                    document.getElementById('loader').style.display = 'block';
                                                }, 500);
                                            }
                                        </script>
                                        <p id='alert' style="font-size:20px; font-weight:bold; text-align: center; color:#61b15a; margin-top:10px"></p>
                                    </div>
                                </div>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                            $(document).ready(function(){
                                function generateBookingCode() {
                                    return 'CU-' + Math.floor(10000000 + Math.random() * 90000000);
                                }

                                function generateTransactionID() {
                                    var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    var result = 'tr-';
                                    for (var i = 0; i < 16; i++) {
                                        result += chars.charAt(Math.floor(Math.random() * chars.length));
                                    }
                                    return result;
                                }

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
                                                $('#bookingCode').val(generateBookingCode()); // Generate and set booking code
                                                $('#trx_id').val(generateTransactionID()); // Generate and set transaction ID
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

            