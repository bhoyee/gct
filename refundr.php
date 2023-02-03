<?php require 'partials/_functions.php';
 session_start();
 $conn = db_connect();

$id=$_REQUEST['id'];
// $bID = $_REQUEST['id'];
$cdate = date("Y-m-d");
$email = $_SESSION['email'];
$query = "UPDATE stripe_payment SET status= 'Request Refund', ddate='$cdate' WHERE bookingCode=$id";
$result = mysqli_query($conn,$query) or die ( mysqli_error());

$note =' We noticed you have initiated a REFUND REQUEST, we will act on it and one of our representative we get back to you within 24 hours.';
$note2 = 'Please Note : REFUND back to card takes 7 to 14 working days depending on your financial institution.';
			$adminNote = 'Kindly use the booking ID to seach for details of the booking and the customer..';

			$subject='GCT - New Message';
			$subject2='GCT - New Message';
			$fromEmail = $email;
            $cmail = 'support@giddycruisetransportation.com';
			$mailto =  $cmail;
          
			$message = "Dear  Admin". "\n\n"

			. "You recevie a new REFUND REQUEST on a booking. Find the details below " . "\n\n"

            . "Booking ID         : " . "\n". $id . "\n\n"
			
			. $adminNote . "\n\n"
			
			. "Regards," . "\n" . "- System Support";
			
			//Message for client confirmation
			$message2 = "Dear Esteemed Customer " . "\n\n"

			. "Thank you for contacting our support!" . "\n\n"
		


			. $note . "\n\n"
            . $note2 . "\n\n"
			
			. "Regards," . "\n" . "- CS Diddy-Transport";
			
			//Email headers
			$headers = "From: " . $cmail; // Client email, I will receive
			$headers2 = "From: " . $cmail; // This will receive client
			
			//PHP mailer function
			
            $result1= mail($mailto, $subject, $message, $headers); // This email sent to My address
			$result2= mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
			
			//Checking if Mails sent successfully
			
			if ($result1 && $result2) {

				echo '<script> alert("You successfully REQUEST REFUND !"); </script>';
				$script = "<script>
				window.location = 'mpayment.php';</script>";
				echo $script;
	
                // header("Location: mpayment.php");
            }
?>
