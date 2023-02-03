<?php require 'partials/_functions.php';
include("session_timeout.php");
 $conn = db_connect();
 session_start();
 ?>

<?php 

 
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sqlx = "SELECT fullName, email, phone from boidata where email = '$email'";
    $resultx = mysqli_query($conn, $sqlx);
    $testx = mysqli_num_rows($resultx);

    if($testx > 0){
     
        $rowx = mysqli_fetch_array($resultx);
        $fname = $rowx['fullName'];
        $cemail = $rowx['email'];
        $phone = $rowx['phone'];
    }
}
else{
    echo '<script> alert("You need to register and sign-In before you can book !"); </script>';
    $script = "<script>
    window.location = 'sign.php';</script>";
    echo $script;

exit();
}
?>


    <?php
        if (isset($_POST['ppbook'])){
        //     $script = "<script>
        //     window.location = 'airporttrip.php';</script>";
        //     echo $script;
        //     exit();
        // }

            // get data from d form
            $_SESSION['bookingcode'] = mt_rand(100000,999999); // booking number
            $bookID = $_SESSION['bookingcode']; // booking number
            $regDate = date('Y-m-d');  // get current date
            $name  = trim($_POST["name"]);
            $phone  = trim($_POST["phone"]);
            $email  = trim($_POST["email"]);
            $tripType  = trim($_POST["ttype"]);
            $paddress  = trim($_POST["paddress"]);
            $daddress  = trim($_POST["daddress"]);
            $tdate  = trim($_POST["tdate"]);
            $ttime  = trim($_POST["ttime"]); 
            $nAdult  = trim($_POST["nadult"]);
            $nChild  = trim($_POST["nchild"]);


            $_SESSION['userID'] = mt_rand(1000,999999); // user number
            $userID = $_SESSION['userID']; // user number

            $tripChar = 'Point-Point';

            // $gender  = trim($_POST["gender"]);
            // $location  = trim($_POST["location"]);

          // check if custommer exit before
          $selectCus = "SELECT userid FROM boidata WHERE email='$email'"; 
          $resultCus = mysqli_query($conn, $selectCus);
           $num_row_cus = mysqli_num_rows($resultCus);

           

            if($num_row_cus > 0 ){

                              
            $data = mysqli_fetch_array($resultCus);
            $user_id = $data['userid'];
            $_SESSION['userid'] = $user_id;

                $status = 'active';
          
            $sql3_cus = "INSERT INTO book (bookingCode, bookdate, time, tripChar, email, triptype, paddress, daddress, nAdlut, nChild, regDate, bookstatus, paystatus, userid) VALUES ('" . $bookID . "','" . $tdate . "','" . $ttime . "','" . $tripChar . "','" . $email . "','" .  $tripType . "','" .  $paddress . "','" .  $daddress . "','" . $nAdult . "','" . $nChild . "','" . $regDate . "','" .$status."','UnPaid','" . $_SESSION['userid'] . "')";
            //		$results = mysql_real_escape_string($query);
			$res = mysqli_query($conn, $sql3_cus);
			if (!$res)
			{
				die ("Could not Creat New Booking: <br />". mysqli_error($conn));
			}

           
			$note =' kindly be expecting the trip qoutation in the next mail ';
			$adminNote = 'Kindly contact the customer to confirm that booking and send price quote';

			$subject='New Reservation';
			$subject2='GCT - New Reservation';
			$fromEmail = $email;
            $cmail = 'support@giddycruisetransportation.com';
			$mailto =  $cmail;
          
			$message = "Dear  Admin". "\n"

			. "You recevie a new reservation from your customer. Find the details below " . "\n\n"
			
            . "Trip Type         : " . "\n". $tripChar . "\n\n"
			. "Full Name      : " . "\n" . $name . "\n\n"
			. "Booking Number : " . "\n" . $bookID . "\n\n"
			. "Phone Number   : " . "\n" . $phone. "\n\n"
			. "Email          : " . "\n" . $email. "\n\n"
            . "Trip	Type	  : " . "\n" . $tripType. "\n\n"
            . "Pick Address   : " . "\n" . $paddress. "\n\n"
			. "Drop Off Addresss  : " . "\n" . $daddress. "\n\n"
			. "Departure Date : " . "\n" . $tdate. "\n\n"
			. "Departure Time : " . "\n" . $ttime. "\n\n"
            . "No of Adult    : " . "\n" . $nAdult. "\n\n"
			. "Np of Child    : " . "\n" . $nChild. "\n\n"
			. "Status		  : " . "\n" .' Not Paid' . "\n\n"


			. $adminNote . "\n\n"
			
			. "Regards," . "\n" . "- System Support";
			
			//Message for client confirmation
			$message2 = "Dear " . $name . "\n"

			. "Thank you for making reservation with us. Below are the details on your reservation!" . "\n\n"
			. "Full Name      :      " . "\n" . $name . "\n\n"
			. "Booking Number : " . "\n" . $bookID . "\n\n"
            . "Trip	Type	  : " . "\n" . $tripType. "\n\n"
            . "PickUp Adress   	  : " . "\n" . $paddress. "\n\n"
            . "Drop off Address	  : " . "\n" . $daddress. "\n\n"
            . "Departure Date : " . "\n" . $tdate. "\n\n"
			. "Departure Time : " . "\n" . $ttime. "\n\n"
			. "Status		  : " . "\n" .' Not Paid' . "\n\n"



			. $note . "\n\n"
			
			. "Regards," . "\n" . "- CS Diddy-Transport";
			
			//Email headers
			$headers = "From: " . $fromEmail; // Client email, I will receive
			$headers2 = "From: " . $mailto; // This will receive client
			
			//PHP mailer function
			
			 mail($mailto, $subject, $message, $headers); // This email sent to My address
			 mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
			
			//Checking if Mails sent successfully
			
			// if ($result1 && $result2) {
			// 	$success = "Your Message was sent Successfully!";
			// } else {
			// 	$failed = "Sorry! Message was not sent, Try again Later.";
			// }
            $script = "<script>
                window.location = 'tt.php';</script>";
                echo $script;
                exit;
			// header('Location: success.php?s='.urlencode('Your seat is booked.')); exit;
        }
        else{

	$status = 'active';
            // create custumer and book the trip
			$sql2_cus = "INSERT INTO boidata (email, fullName, phone, regDate, userid) VALUES ('" . $email . "','" . $name . "','" . $phone . "','" . $regDate . "','" . $userID . "')";
			
			$result_cus = mysqli_query($conn, $sql2_cus);

			if (!$result_cus)
			{
				die ("Could not insert to the boidata: <br />". mysqli_error($conn));
			}
		

            $sql3_cus = "INSERT INTO book (bookingCode, bookdate, time, tripChar, email, triptype, paddress, daddress, nAdlut, nChild, regDate, bookstatus, paystatus, userid) VALUES ('" . $bookID . "','" . $tdate . "','" . $ttime . "','" . $tripChar . "','" . $email . "','" .  $tripType . "','" .  $paddress . "','" .  $daddress . "','" . $nAdult . "','" . $nChild . "','" . $regDate . "','" . $status . "','UnPaid','" . $userID . "')";
            //		$results = mysql_real_escape_string($query);
			$res = mysqli_query($conn, $sql3_cus);
			if (!$res)
			{
				die ("Could not update seat: <br />". mysqli_error($conn));
			}

           
			$note =' kindly be expecting the trip qoutation in the next mail ';
			$adminNote = 'Kindly contact the customer to confirm that booking and send price quote';

			$subject='New Reservation';
			$subject2='GCT - New Reservation';
			$fromEmail = $email;
            $cmail = 'gidicruiztransportation@gmail.com';
			$mailto =  $cmail;
          
			$message = "Dear  Admin". "\n"

			. "You recevie a new reservation from your customer. Find the details below " . "\n\n"
			
			. "Full Name      : " . "\n" . $name . "\n\n"
			. "Booking Number : " . "\n" . $bookID . "\n\n"
			. "Phone Number   : " . "\n" . $phone. "\n\n"
			. "Email          : " . "\n" . $email. "\n\n"
            . "Trip	Type	  : " . "\n" . $tripType. "\n\n"
            . "Pick Address   : " . "\n" . $paddress. "\n\n"
			. "Drop Off Addresss  : " . "\n" . $daddress. "\n\n"
			. "Departure Date : " . "\n" . $tdate. "\n\n"
			. "Departure Time : " . "\n" . $ttime. "\n\n"
            . "No of Adult    : " . "\n" . $nAdult. "\n\n"
			. "Np of Child    : " . "\n" . $nChild. "\n\n"
			. "Status		  : " . "\n" .' Not Paid' . "\n\n"


			. $adminNote . "\n\n"
			
			. "Regards," . "\n" . "- System Support";
			
			//Message for client confirmation
			$message2 = "Dear " . $name . "\n"

			. "Thank you for making reservation with us. Below are the details on your reservation!" . "\n\n"
			. "Full Name      :      " . "\n" . $name . "\n\n"
			. "Booking Number : " . "\n" . $bookID . "\n\n"
            . "Trip	Type	  : " . "\n" . $tripType. "\n\n"
            . "PickUp Adress   	  : " . "\n" . $paddress. "\n\n"
            . "Drop off Address	  : " . "\n" . $daddress. "\n\n"
            . "Departure Date : " . "\n" . $tdate. "\n\n"
			. "Departure Time : " . "\n" . $ttime. "\n\n"
			. "Status		  : " . "\n" .' Not Paid' . "\n\n"


			. $note . "\n\n"
			
			. "Regards," . "\n" . "- CS Diddy-Transport";
			
			//Email headers
			$headers = "From: " . $fromEmail; // Client email, I will receive
			$headers2 = "From: " . $mailto; // This will receive client
			
			//PHP mailer function
			
			 mail($mailto, $subject, $message, $headers); // This email sent to My address
			 mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
			
			//Checking if Mails sent successfully
			
			// if ($result1 && $result2) {
			// 	$success = "Your Message was sent Successfully!";
			// } else {
			// 	$failed = "Sorry! Message was not sent, Try again Later.";
			// }
            $script = "<script>
                window.location = 'tt.php';</script>";
                echo $script;
                exit;
			// header('Location: success.php?s='.urlencode('Your seat is booked.')); exit;

        }
    }
?>
<?php include("header.php") ?>


    <div class="container page-content">
        <h4 class="page-title pt30">Point To Point</h4>

<div class="row">
    <div class="col-md-3">
        <div class=" gap gap-bottom visible-xs"></div>
        <aside class="sidebar-left">
            <div class="sidebar-widget">
                <h5 class="content-header">Point To Point Service</h5>
                <p>We know your needs and we ensure you only get the best.</p>
            </div>
        </aside>
    </div>
    <div class="col-md-9 item-features">

        <form method="post" action="" onsubmit="myFunction()">
            <div class="col-md-12">
                
            </div>
            <div class="col-md-12">
                <div class="form-group form-group-icon-left">
                <i class="fa fa-paper-plane-o input-icon input-icon-show"></i>
                    <label for="DepartureAddress">Trip Type</label>
                    <select class="form-control selectpicker show-tick" title="Select Tripe Type" data-live-search="true" data-val="true" name="ttype" id="ttype" >
                                                    <option value="No Selection">Select Tripe Type</option>
                                                    <option value="single-tripe">Single Trip</option>
                                                    <option value="round-trip">Round Trip</option>
                                                    
                                                </select>
                </div>
            </div>
            <?php 
            if(isset($_SESSION['email'])) { ?>
            <div class="col-md-12">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-user input-icon input-icon-show"></i>
                    <label for="ContatName">Your Full Name</label>
                    <input class="form-control" type="text" data-val="true" data-val-required="Your name must be specified" id="name" name="name" value="<?php echo $fname;?>" readonly/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                    <label for="ContactDetail_Email">Your Email</label>
                    <input class="form-control" type="email" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="email" name="email" value="<?php echo $email;?>" readonly/>
                </div>
            </div>
            <?php } else{ ?>
                <div class="col-md-12">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-user input-icon input-icon-show"></i>
                    <label for="ContatName">Your Full Name</label>
                    <input class="form-control" type="text" data-val="true" data-val-required="Your name must be specified" id="name" name="name" value="" require />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                    <label for="ContactDetail_Email">Your Email</label>
                    <input class="form-control" type="email" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="email" name="email" value="" require/>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-phone input-icon input-icon-show"></i>
                    <label for="ContactDetail_Phone">Your Phone Number</label>
                    <input class="form-control" type="number" data-val="true" id="phone" name="phone" value="<?php echo $phone;?>" require />
                </div>
            </div>
         
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-location-arrow input-icon input-icon-show"></i>
                    <label for="DestinationAddress">Pick Up Address</label>
                   <textarea class="form-control" rows="3" data-val="true" data-val-required="Your destination address must be specified" id="paddress" name="paddress">
                    </textarea>
                 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-map-marker input-icon input-icon-show"></i>
                    <label for="DestinationAddress">Drop Off Address</label>
                   <textarea class="form-control" rows="3" data-val="true" data-val-required="Your destination address must be specified" id="daddress" name="daddress">
                    </textarea>
        
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                    <label for="TravelDate">Travel Date</label>
                    <input class="form-control" type="date" id="tdate" name="tdate" require />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                    <label for="ReturnDate">Travel Time</label>
                    <input class="form-control" type="time" id="ttime" name="ttime" require>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-user input-icon input-icon-show"></i>
                    <label for="RouteType">Passenger</label>
                    <select class="selectpicker show-tick" data-live-search="true" data-val="true" data-val-required="Your type of route must be specified" id="nadult" name="nadult">
                        <option data-hidden="true" value="0">Number Of Adult</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-icon-left">
                    <i class="fa fa-user input-icon input-icon-show"></i>
                    <label for="RouteType">Passenger</label>
                    <select class="selectpicker show-tick" data-live-search="true" data-val="true" data-val-required="Your type of route must be specified" id="nchild" name="nchild">
                        <option data-hidden="true" value="0">Number Of Children</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
           
            <div class="col-md-6">
                                <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg" name="ppbook" id="ppbook">
                                            <i class="icon-ok icon-white"></i> Book Now
                                        </button>
                                        <button type="reset" class="btn btn-warning btn-lg">
                                            <i class="icon-refresh icon-black"></i> Clear
                                        </button>
                                    </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                </div>
            </div>
        </form>
        <div id="loader"></div>
    </div>
</div>

    </div>
<?php include("footer.php") ?>