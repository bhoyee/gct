<?php require 'partials/_functions.php';
  require_once('stripe-php/init.php');
 $conn = db_connect();
 session_start();

 $paymentMessage = '';

 \Stripe\Stripe::setApiKey("sk_live_5xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");

 try{

  
 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $amt = $POST['amt'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];
    $bid = $POST['bid'];
    $namt = $amt*100;


    // Create Customer In Stripe
    $customer = \Stripe\Customer::create(array(
    "name" => $first_name,
    "email" => $email,
    "source" => $token
    ));

    // Charge Customer
    $charge = \Stripe\Charge::create(array(
    "amount" => $namt,
    "currency" => "usd",
    "description" => "GCT Trip Fee from Booking ID:- $bid",
    "customer" => $customer->id
    ));

    // get payment details
    $paymenyResponse = $charge->jsonSerialize();

        // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        	// transaction details
            $amountPaid = $paymenyResponse['amount'];
            $namtPaid = $amountPaid/100;
            $paymentStatus = $paymenyResponse['status'];
            $paymentDate = date("Y-m-d H:i:s");
            $cdate    =  date("Y-m-d");
             $trx_id  = $charge->id;

            //update the invoice table 
            $updateTransactionSQL ="UPDATE invoice SET status = 'Paid', payDate ='$paymentDate'  WHERE bookingCode='$bid'";

            mysqli_query($conn, $updateTransactionSQL) or die("database error: ". mysqli_error($conn));

            // insert into stripe payment tablee 
            $insertTransactionSQL = "INSERT INTO stripe_payment(trx_id,bookingCode, fName, email, amt, status, p_date, ddate)
            VALUES('".$trx_id."','".$bid."','".$first_name."','".$email."','".$namtPaid."','".$paymentStatus."','".$paymentDate."','".$cdate."')";
    
            mysqli_query($conn, $insertTransactionSQL) or die("database error: ". mysqli_error($conn));
    
           $lastInsertId = mysqli_insert_id($conn);
           
            //update book table 
           mysqli_query($conn, "UPDATE book SET paystatus = 'Paid' WHERE bookingCode ='$bid'");

           
            //if order inserted successfully
            if($lastInsertId && $paymentStatus == 'succeeded'){
                $paymentMessage = " CONGRATULATION !! Payment was successful $first_name with Booking ID: {$bid}";
                
                $note =' Enjoy your trip with GCT ';
                $adminNote = 'Confirm payment on stripe portal before the trip';

                $subject='Trip Payment Successful';
                $subject2='GCT - Trip Payment Successful';
                $fromEmail = $email;
                $cmail = 'gidicruiztransportation@gmail.com';
                $mailto =  $cmail;
                    
                $message = "Dear  Admin". "\n\n"

                . "You recevie a new Trip Payment Successful from your customer. Find the details below " . "\n\n"
                
                . "Transaction ID      : " . "\n" . $trx_id . "\n\n"
                . "Full Name      : " . "\n" . $first_name . "\n\n"
                . "Booking Number : " . "\n" . $bid . "\n\n"
                . "Email          : " . "\n" . $email. "\n\n"
                . "Amount Paid    : " . "\n" ."$". $namtPaid. "\n\n"
                . "Transaction Date	  : " . "\n" . $paymentDate. "\n\n"
                . "Payment Status		  : " . "\n" .$paymentStatus. "\n\n"


                . $adminNote . "\n\n"
                
                . "Regards," . "\n" . "- System Support";
                
                //Message for client confirmation
                $message2 = "Dear " . $first_name . "\n\n"

                . "Congratulation, your payment was successful. Below are the details on your payment!" . "\n\n"
              
                . "Transaction ID      : " . "\n" . $trx_id . "\n\n"
                . "Full Name      : " . "\n" . $first_name . "\n\n"
                . "Booking Number : " . "\n" . $bid . "\n\n"
                . "Email          : " . "\n" . $email. "\n\n"
                . "Amount Paid    : " . "\n" ."$". $namtPaid. "\n\n"
                . "Transaction Date	  : " . "\n" . $paymentDate. "\n\n"
                . "Payment Status		  : " . "\n" .$paymentStatus. "\n\n"



                . $note . "\n\n"
                
                . "Regards," . "\n" . "- CS Diddy-Transport";
                
                //Email headers
                $headers = "From: " . $mailto; // Client email, I will receive
                $headers2 = "From: " . $mailto; // This will receive client
                
                //PHP mailer function
                
                mail($mailto, $subject, $message, $headers); // This email sent to My address
                mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
			
            } else{
                    $paymentMessage = "failed";
                  }
    }else{
        $paymentMessage = "failed";
    }

    $_SESSION["message"] = $paymentMessage;
   
    header('location:thepayment.php');


 }catch ( Stripe\Error\Base $e ) {
  
    $_SESSION["fail"] = "failed";

     $test =  $e->getMessage();
    // $test = "Transaction Failed";
    $paymentMessage = $test;
    $_SESSION["message"] = $paymentMessage;
    
    sleep(5);
  // echo $e->getMessage();
    // $e->getMessage();
       header('location:thepayment.php');
    // Code to do something with the $e exception object when an error occurs.
 
  }

?>