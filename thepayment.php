<?php require 'partials/_functions.php';
 $conn = db_connect();
 session_start();
?>

<?php include("header.php") ?>

<link rel="stylesheet" href="css/style.css">

    <div class="container page-content">
   

    <div class="row">

<div class="col-md-12 newstates">
    <div id="faci">
        <h2 align="center">Pay For Your Booking / Reservation</h2>
        <div class="busdetails">

            <div class="col-md-12 newstates">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#executive-coach" data-toggle="tab">Booking Number</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade  active in" id="executive-coach">
                            <?php 
                                if(isset($_SESSION["fail"]) && $_SESSION["fail"] && $_SESSION["fail"] == 'failed') {
                                ?>			
                                    <div class="alert alert-danger">
                                    <?php 
                                    echo "Error : ".$_SESSION["message"]; 
                                    $_SESSION["message"] = '';
                                    $_SESSION["fail"] = '';
                                    ?>
                                    </div>
                                <?php 
                                } elseif(isset($_SESSION["message"]) && $_SESSION["message"]) {
                                ?>
                                    <div class="alert alert-success">
                                    <?php 
                                    echo $_SESSION["message"]; 
                                    $_SESSION["message"] = '';
                                    ?>
                                    </div>
                                <?php } ?>

                                <div class="col-md-12 col-sm-5 col-xs-12">
                                <?php
                                if(isset($_POST["searchBook"]))
                                {
                                    $book_id = $_POST["paymentRef"];

                                    //confirming booking
                                    $bsql = "SELECT book.* , boidata.fullName AS fname FROM book INNER JOIN boidata ON book.userid = boidata.userid
                                    WHERE book.bookingCode='$book_id'";
                                    $bresult = mysqli_query($conn, $bsql);
                                    mysqli_num_rows($bresult);

                                    if($rowQ = mysqli_fetch_assoc($bresult)) {
                                        $fname   = $rowQ['fname'];

                                    // $sqls = "SELECT * FROM book WHERE bookingCode='$book_id'";
                                 $sqls ="SELECT invoice.bookingCode AS bookingCode, invoice.price AS price, invoice.status AS status, invoice.date AS date,
                                 boidata.fullName AS name, invoice.payDate AS payDate, boidata.fullName AS fname, book.email AS email FROM invoice INNER JOIN book ON invoice.bookingCode = book.bookingCode INNER JOIN boidata ON book.userid = boidata.userid
                                 WHERE invoice.bookingCode ='$book_id'";
                                //   $OLdsqls = "SELECT * FROM invoice WHERE bookingCode='$book_id'";
                                  $results = mysqli_query($conn, $sqls);

                                    mysqli_num_rows($results);
                                   
                                         $date = date('Y-m-d'); 
                                         $cTime = date('H:i:s');                            
                                        // if(mysqli_num_rows($result2)){
                                        if($row = mysqli_fetch_assoc($results)) {
                                            $bID        = $row['bookingCode'];
                                            $amt        = $row['price'];
                                            $status     = $row['status'];
                                            $inv_date   = $row['date'];
                                            $name       = $row['name'];
                                            $email       = $row['email'];
                                            $pay_date    = $row['payDate'];
                    


                                                                              

                                            if($status == 'Unpaid'){
                                                

                                                    echo '<div class="alert alert-danger" role="alert">
                                                    <strong>Alert!</strong> Reservation Is Still Unpaid.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>';                                                
                                                    
                                                    echo '<div class="fs-2 p-5" style="background-color:#F0FFF0; padding: 25px 50px 0px; ">
                                                    <p><b><u>Confirm your details before making payment</u></b> </p> 
                                                    <span><b>Booking Number     :</b> '. $bID.'</span><br>
                                                    <span><b>Full Name     :</b> '. $name.'</span><br>
                                                    <span><b>Amount To Be Paid :</b><span style="font-size:20px"><b> $'.$amt.'</b></span></span> <br>
                                                    <span><b>Invoice Date :</b> '.$inv_date.'</span>
                                                          
                                                    </div>                                                   
                                                    <hr/>';

                                                    echo '
                                                    <div class="fs-2" style="background-color:#14213d; padding: 25px; ">
                                                    <p style="color:#ffff">Enter your card details below</p>
                                                    <form action="charge.php" method="post" id="payment-form" onsubmit="myFunction()">
                                                    <div class="form-row">
                                                    <input type="hidden" name="bid" class="form-control mb-3 StripeElement StripeElement--empty" value="'.$bID.'">

                                                     <input type="hidden" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" value="'. $name.'">
                                                     <input type="hidden" name="amt" class="form-control mb-3 StripeElement StripeElement--empty" value="'.$amt.'">
                                                     <input type="hidden" name="email" class="form-control mb-3 StripeElement StripeElement--empty" value="'.$email.'">
                                                      <div id="card-element" class="form-control">
                                                        <!-- a Stripe Element will be inserted here. -->
                                                      </div>
                                              
                                                      <!-- Used to display form errors -->
                                                      <div id="card-errors" role="alert" style="color:#ffff"></div>
                                                    </div>
                                              
                                                    <button>Submit Payment</button>
                                                  </form>
                                                  <div id="loader"></div>

                                                  <br> </div>
                                                  <br>                                                   
                                                  <hr/> <br> <br> <br> 
                                                    ';             
                                   
                                            }
                                            elseif($status =='Paid'){

      
                                                    echo '<div class="alert alert-success" role="alert">
                                                    <strong>Alert!</strong> Reservation Payment Done Already.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>';                                                
                                                    
                                                    echo '<div class="fs-2 p-5" style="background-color:#F0FFF0; padding: 25px 50px 25px;  ">
                                                    <p><b><u>Confirm your details before making payment</u></b> </p> 
                                                    <span><b>Booking Number     :</b> '. $bID.'</span><br>
                                                    <span><b>Full Name     :</b> '. $name.'</span><br>
                                                    <span><b>Amount To Be Paid :</b> $'.$amt.'</span> <br>
                                                    <span><b>Pay Date: </b> '.$pay_date.'</span>
                                                    <br>
                                                    <span><b>Payment Status:</b>  <strong><h3 style="display:inline">PAID</h3></strong></span>
        
                                                    </div><br> <hr/><br><br><br>';
                                            
                                              
                                                  
                                            }

                                        
                                        }
                                        else{

                                            echo '<div class="alert alert-warning " role="alert">
                                            <strong>Alert!</strong><b style="color:black"> No Price Tag On Your Reservation.</b>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button><br>
                                            <p><br> Hi <b style="color:black">'.$fname.'</b>,  </p>
                                            <p>Kindly contact our support with your Booking ID </p> <br>
                                            <p>Phone Number: +14432202654 , +14439855520</p>
                                            <p>Email: support@giddycruisetransportation.com</p>
                                        </div>';

                                        }
                                    }
                                    else{

                                        echo '<div class="alert alert-danger " role="alert">
                                        <strong>Alert!</strong> No Such Reservation Available.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';

                                    }

                                }
                                ?>
                                </div>
                        
                                <div class="col-xs-12">
                                <form method="post" action="#" onsubmit="myFunction()">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="paymentRef">Your Booking Reference Code</label>
                                        <input class="typeahead form-control larger-input text-uppercase" placeholder="Enter your reference code here" type="text" name="paymentRef" />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-large btn-danger sbb" id="searchBook" name="searchBook">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            Search
                                        </button>
                                    


                                    </div>
                                </div>
                            

                                </form>
                                <div id="loader"></div>

                                </div>
                            </div>

                         
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/charge.js"></script>
<?php include("footer.php") ?>