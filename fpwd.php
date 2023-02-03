<?php 
session_start();
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect();
?>


    <div class="container page-content">
        <h4 class="page-title pt30" style="margin-left:20px">Recover your password</h4>
    <div>
        <?php
        if (isset($_POST['psend'])){
    
            $email  = trim($_POST["email"]);
            // $pwd  = trim($_POST["pwd"]);

            $sql = "SELECT id, email, pwd FROM users WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if($count == 1) {
                $cpwd   = $row['pwd'];

                
			$note =' Kindly contact support if you are not the one that request password   ';
			

			$subject='GCT - Password Rquest';
			$subject2='GCT - Password Rquest';
			$fromEmail = $email;
            $cmail = 'support@giddycruisetransportation.com';
			$mailto =  $cmail;
       
			
			//Message for client confirmation
			$message2 = "Dear customer" . "\n\n"

			. "You requested for your password . Below are the details  !" . "\n\n"
		
            . "Your Password         : " . "\n". $cpwd . "\n\n"

			. $note . "\n\n"
			
			. "Regards," . "\n" . "- CS Diddy-Transport";
			
			//Email headers
			$headers2 = "From: " . $cmail; // This will receive client
			
			//PHP mailer function
			
			$result2= mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
			
			//Checking if Mails sent successfully
			
			if ($result2) {
               
                echo '<div class="alert alert-success" role="alert">
                <strong>Alert!</strong> Password successfully send to your mail .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
			} else {
                echo '<div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Something went wrong.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
       
			}
              
       
                // header("location: dashb.php");
             }
             else{
                echo '<div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Eamil address doesnt exist in our system.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
       
             }
    
			// header('Location: success.php?s='.urlencode('Your seat is booked.')); exit;
        }
      
    
?>
 
<div class="row ">
    <div class="col-md-6 col-sm-12 "style="margin: auto;">
        <!-- <h5 class="content-header">Sign into your GCT account</h5> -->
        <p class="text-center" style="margin-left:20px">Note: Your password will be send your registered email address</p>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label for="email">Email</label>
                        <input class="form-control" type="email" data-val="true" data-val-required="Email is required." id="email" name="email" value="" require />
                        <span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-key input-icon input-icon-show"></i>
                        <label for="pwd">Password</label>
                        <input class="form-control" type="password" data-val="true" data-val-required="Password is required is required." id="pwd" name="pwd" value="" require />
                        <span class="field-validation-valid" data-valmsg-for="pwd" data-valmsg-replace="true"></span>
                    </div>
                </div>
              -->
            
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                            <i class="icon-ok icon-white"></i> Submit
                                        </button>
                                        <!-- <button type="reset" class="btn btn-warning btn-lg">
                                            <i class="icon-refresh icon-black"></i> Clear
                                        </button> -->
                                    </div>

                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                </div>
    </div>
    <p>You have Account? <a href="signup.php">Sign In</a> </p>
    <p>Don't have an Account? <a href="signup.php">Sign Up</a> </p>
  

                            </div>
        </form>
        <div id="loader"></div>
        </div>

    </div>
    
 
</div>

    </div>
    <div style="clear:both"></div>

    <script>
	function myFunction() {
	var spinner = $('#loader');
	document.getElementById("loader").style.display = "inline"; // to undisplay
	}
	</script>
    <div>
        <hr />

        <p align="center">
            Copyright © 2022 - Giddy Cruise Transport. All rights reserved. Powered by <a class="text-color bolded" target="_blank" href="https://giddyhost.com"> Giddy Host</a>
        </p>

    </div>