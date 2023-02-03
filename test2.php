<?php require 'partials/_functions.php';
 $conn = db_connect();
 session_start();
 if(!isset($_SESSION['route']) && empty($_SESSION['route'])) {

     $script = "<script>
     window.location = 'index.php';</script>";
     echo $script;
     exit();
 }
?>
<?php

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
	$script = "<script>
	window.location = 'test.php';</script>";
	echo $script;
	exit();
}

	
// get the posted data
$doj = strip_tags( utf8_decode( $_POST['journey_date'] ) );
$name = strip_tags( utf8_decode( $_POST['fname'] ) );
$gender = strip_tags( utf8_decode( $_POST['gender'] ) );
$email = strip_tags( utf8_decode( $_POST['email'] ) );
$phone = strip_tags( utf8_decode( $_POST['phone'] ) );
$kname = strip_tags( utf8_decode( $_POST['k_name'] ) );
$kphone = strip_tags( utf8_decode( $_POST['k_phone'] ) );
$rdate = strip_tags( utf8_decode( $_POST['return_date'] ) );

$_SESSION['bookingcode'] = mt_rand(100000,999999); // booking number
$bookID = $_SESSION['bookingcode']; // booking number
$regDate = date('Y-m-d');

$_SESSION['userID'] = mt_rand(1000,999999); // user number
$userID = $_SESSION['userID']; // user number

$route = $_SESSION['route'];
$dptTime = $_SESSION['deptTime'];
$dptDate = $_SESSION['deptDate'];

$nseat = $_SESSION['seat'];
$tripChar = 'Inter-State';



$str_arr = explode (",", $route); 
$myTrip = 'Trip From: '.$str_arr[0] .' '.'To: '.' '. $str_arr[1] ;



// $message = strip_tags( utf8_decode( $_POST['message'] ) );
	
// check that name was entered
if (empty($name))
    $error = 'You must enter your Full name.';

// check that address was entered
if (empty($gender) || $gender == 0)
    $error = 'You must select your gender.';

// check that mobile number was entered
if (empty($email))
    $error = 'You must enter your mobile email.';

// check that user id was entered
if (empty($phone))
    $error = 'You must enter your phone number.';

// check that an email address was entered
elseif (empty($kname)) 
    $error = 'You must enter your Next of kin Full name.';
// check for a valid email address

	
// check that a message was entered
if (empty($kphone))
    $error = 'You must enter Next of Kin Phone Number.';

// check if custommer exit before
$selectCus   = "select * from  boidata where email='$email'"; 
$resultCus   = mysqli_query($conn, $selectCus);
$num_row_cus = mysqli_num_rows($resultCus);
$data = mysqli_fetch_array($num_row_cus);
$user_id = $data['id'];



if($num_row_cus > 0){
	
	//chk if customer do same booking before 
	$bsql = "select * from book where email ='" . $email . "' AND route='$route' AND bookdate='$dptDate' AND time='$dptTime' AND bookstatus='active'";
	$bresult   = mysqli_query($conn, $bsql);
	$brow = mysqli_num_rows($bresult);


	if ($brow > 0){
		$error = 'You are already booked.';
		
		if (isset($error)) {
			header('Location: test.php?e='.urlencode($error)); exit;
		}
	}

 // book customer
 $seatNumber = NULL;

	for($i=1; $i<9; $i++)
	{
		$chparam = "ch" . strval($i);
		$calcPNR = $doj . "-" . strval($i);
		if( !empty($_POST[$chparam]) )
		{
			$queryseatz = "INSERT INTO seats(bookingCode, number, PNR, date, route) VALUES ('". $bookID ."', '" . intval($i) . "', '". $calcPNR ."', '". $doj ."','". $route ."')";
	//		$results = mysql_real_escape_string($query);
			$res = mysqli_query($conn, $queryseatz);
			if (!$res)
			{
				die ("Could not update seat: <br />". mysql_error());
			}
			$seatNumber = $seatNumber .", ". "$i";

			if($seatNumber){
			$seatNumber = $nseat;
			   //  $str_arr = explode (",", $string); 
		       //  print_r($str_arr);
		      $status = 'active';
			   //   echo "<h3>". strtoupper($str_arr[0] .' '.'=&gt;'.' '. $str_arr[1]) ."<small>".' '.' '."</small></h>";
			   $sql13_cus = "INSERT INTO book (bookingCode, route, bookdate, returnD, time, seat, tripChar, email, regDate, bookstatus, userid) VALUES ('". $bookID ."','" . $route . "','" . $dptDate . "','" . $rdate . "','" . $dptTime . "','" . $seatNumber . "','" . $tripChar . "','" . $email . "','" . $regDate . "','" .$status."','" . $user_id . "')";
			   
			  if(mysqli_query($conn,$sql13_cus)){
			// write the email content
			$note =' Feel free to reach out to us if any information above are not correct.';
			$note2 =' Kindly be expecting PRICE QOUTE for your trip in the next mail with payment link to make payment';
			$adminNote = 'Kindly contact the customer.';

			$subject='GCT - New Reservation';
			$subject2='GCT - New Reservation';
			$fromEmail = $email;
            $cmail = 'gidicruiztransportation@gmail.com';
			$mailto =  $cmail;
          
			$message = "Dear  Admin". "\n"

			. "You recevie a new message from your customer. Find the details below " . "\n\n"

			. "Trip Type         : " . "\n". $tripChar . "\n\n"			
			. "Booking Number    : " . "\n". $bookID . "\n\n"
			. "Trip Route        : " . "\n". $myTrip . "\n\n"
			. "Departure Date    : " . "\n". $dptDate . "\n\n"
			. "Departure Time    : " . "\n". $dptTime . "\n\n"
			. "Full Name         : " . "\n" . $name . "\n\n"
			. "Phone Number      : " . "\n" . $phone. "\n\n"
			. "Email             : " . "\n" . $email. "\n\n"
            . "Seat Number       : " . "\n" . $nseat. "\n\n"
            . "Return Date       : " . "\n" . $rdate. "\n\n"


			. $adminNote . "\n\n"
			
			. "Regards," . "\n" . "- System Support";
			
			//Message for client confirmation
			$message2 = "Dear " . $name . "\n"

			. "Below are the details of your new reservation with GCT!" . "\n\n"
		
			. "Booking Number    : " . "\n". $bookID . "\n\n"
			. "Trip Route        : " . "\n". $myTrip . "\n\n"
			. "Departure Date    : " . "\n". $dptDate . "\n\n"
			. "Departure Time    : " . "\n". $dptTime . "\n\n"
			. "Full Name         : " . "\n" . $name . "\n\n"
			. "Phone Number      : " . "\n" . $phone. "\n\n"
			. "Email             : " . "\n" . $email. "\n\n"
            . "Seat Number       : " . "\n" . $nseat. "\n\n"
			. "Status		  : " . "\n" .' Not Paid' . "\n\n"
            . "Return Date       : " . "\n" . $rdate. "\n\n"

			. $note . "\n\n"

			. $note2 . "\n\n"
			
			. "Regards," . "\n\n" . "- CS Giddy-Transport" ."\n"
			. "-Tel : +14439855520" ;

			//Email headers
			$headers = "From: " . $cmail; // Client email, I will receive
			$headers2 = "From: " . $cmail; // This will receive client
			
			//PHP mailer function
			
            mail($mailto, $subject, $message, $headers); // This email sent to My address
			mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client

		
			header('Location: success.php'); exit;
			  };
			}
		}
   
	}		

}
else{
	// create custumer and book the trip
	$sql2_cus = "INSERT INTO boidata (email, fullName, gender, kname, kphone, phone, regDate, userid) VALUES ('" . $email . "','" . $name . "','" . $gender . "','" . $kname . "','" . $kphone . "','" . $phone . "','" . $regDate . "','" . $userID . "')";
	
	$result_cus = mysqli_query($conn, $sql2_cus);

	if (!$result_cus)
	{
		die ("Could not insert to the boidata: <br />". mysqli_error($conn));
	}

	$seatNumber = NULL;

	for($i=1; $i<9; $i++)
	{
		$chparam = "ch" . strval($i);
		$calcPNR = $doj . "-" . strval($i);
		if( !empty($_POST[$chparam]) )
		{
			$queryseat = "INSERT INTO seats(bookingCode, number, PNR, date, route) VALUES ('". $bookID ."', '" . intval($i) . "', '". $calcPNR ."', '". $doj ."','". $route ."')";

	//		$results = mysql_real_escape_string($query);
			$res = mysqli_query($conn, $queryseat);
			if (!$res)
			{
				die ("Could not update seat: <br />". mysql_error($conn));
			}
			$seatNumber = $seatNumber .", ". "$i";

			if($seatNumber){
				$seatNumber = $nseat;

				$route = $_SESSION['route'];
				$dptTime = $_SESSION['deptTime'];
				$dptDate = $_SESSION['deptDate'];
			   //  $str_arr = explode (",", $string); 
		   //  print_r($str_arr);
		   $status = 'active';
		   
			   //   echo "<h3>". strtoupper($str_arr[0] .' '.'=&gt;'.' '. $str_arr[1]) ."<small>".' '.' '."</small></h>";
			   $sql3_cus = "INSERT INTO book (bookingCode, route, bookdate,	returnD, time, seat, tripChar, email, regDate, bookstatus, userid) VALUES ('" . $bookID . "','" . $route . "','" . $dptDate . "','" . $rdate . "','" . $dptTime . "','" . $seatNumber . "', '" . $tripChar . "', '" . $email . "','" . $regDate . "','" . $status . "','" . $user_id . "')";
			   
			  if(mysqli_query($conn,$sql3_cus)){
		   // write the email content

		    // $gender  = trim($_POST["gender"]);
            // $location  = trim($_POST["location"]);
           
			$note =' Feel free to reach out to us if any information above are not correct.';
			$note2 =' Kindly be expecting PRICE QOUTE for your trip in the next mail with payment link to make payment';
			$adminNote = 'Kindly contact the customer.';

			$subject='GCT - New Reservation';
			$subject2='GCT - New Reservation';
			$fromEmail = $email;
            $cmail = 'gidicruiztransportation@gmail.com';
			$mailto =  $cmail;
          
			$message = "Dear  Admin". "\n\n"

			. "You recevie a new message from your customer. Find the details below " . "\n\n"

			. "Trip Type         : " . "\n". $tripChar . "\n\n"
			. "Booking Number    : " . "\n". $bookID . "\n\n"
			. "Trip Route        : " . "\n". $myTrip . "\n\n"
			. "Departure Date    : " . "\n". $dptDate . "\n\n"
			. "Departure Time    : " . "\n". $dptTime . "\n\n"
			. "Full Name         : " . "\n" . $name . "\n\n"
			. "Phone Number      : " . "\n" . $phone. "\n\n"
			. "Email             : " . "\n" . $email. "\n\n"
            . "Seat Number       : " . "\n" . $nseat. "\n\n"
			. "Status		  : " . "\n" .' Not Paid' . "\n\n"
            . "Return Date       : " . "\n" . $rdate. "\n\n"


			. $adminNote . "\n\n"
			
			. "Regards," . "\n" . "- System Support";
			
			//Message for client confirmation
			$message2 = "Dear " . $name . "\n"

			. "Below are the details of your new reservation with GCT!" . "\n\n"
		
			. "Booking Number    : " . "\n". $bookID . "\n\n"
			. "Trip Route        : " . "\n". $myTrip . "\n\n"
			. "Departure Date    : " . "\n". $dptDate . "\n\n"
			. "Departure Time    : " . "\n". $dptTime . "\n\n"
			. "Full Name         : " . "\n" . $name . "\n\n"
			. "Phone Number      : " . "\n" . $phone. "\n\n"
			. "Email             : " . "\n" . $email. "\n\n"
            . "Seat Number       : " . "\n" . $nseat. "\n\n"
            . "Return Date       : " . "\n" . $rdate. "\n\n"

			. $note . "\n\n"

			. $note2 . "\n\n"
			
			. "Regards," . "\n\n" . "- CS Giddy-Transport" ."\n"
			. "-Tel : +14439855520" ;
			
			//Email headers
			$headers = "From: " . $cmail; // Client email, I will receive
			$headers2 = "From: " . $cmail; // This will receive client
			
			//PHP mailer function
			
            mail($mailto, $subject, $message, $headers); // This email sent to My address
			mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client

			header('Location: success.php'); exit;
			
			  };

	
			}
		}


	
	}
				
	

}

?>
