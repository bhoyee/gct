<?php 
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect();
?>


    <div class="container page-content">
        <h4 class="page-title pt30">Sign Up with Giddy Cruise Transport</h4>
        <div>
        <?php
        if (isset($_POST['psend'])){
    
            $sendDate = date('Y-m-d h:m:s A');  // get current date
            $fname  = trim($_POST["fname"]);
            $lname  = trim($_POST["sname"]);
            $phone  = trim($_POST["phone"]);
            $email  = trim($_POST["email"]);
            $pwd  = trim($_POST["pwd"]);
            // $pwd2  = trim($_POST["pwd2"]);
            $gender = trim($_POST["gender"]);

            $funame =trim($fname.' '.$lname);

            $_SESSION['userID'] = mt_rand(1000,999999); // user number
            $userID = $_SESSION['userID']; // user number

            $selectCus = "SELECT email FROM boidata WHERE email='$email'"; 
            $resultCus = mysqli_query($conn, $selectCus);
            $num_row_cus = mysqli_num_rows($resultCus);

            if($num_row_cus > 0){
              
                echo '<div class="alert alert-danger " role="alert">
                <strong>Alert!</strong> Email already exist !.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
             
            }
            else{

            //insert into users table
            $sql = "INSERT INTO users (email, pwd, regDate) ";
            $sql.= "values ('{$email}', '{$pwd}','{$sendDate}')";


            //insert into biodata
            $sql2 = "INSERT INTO boidata (email, fullName,gender, phone,regDate, userid)";
            $sql2.= "values ('{$email}','{$funame}','{$gender}','{$phone}','{$sendDate}', '{$userID}')";

            $res = mysqli_query($conn, $sql);
		

            $res2 = mysqli_query($conn, $sql2);
			if (!$res)
			{
				die ("Could not update seat: <br />". mysqli_error());
			}
                
            // $gender  = trim($_POST["gender"]);
            // $location  = trim($_POST["location"]);
           
			$note =' Use the above information log into and manage your account.  Please contact us if you have any issues with your account. ';
			// $adminNote = 'Kindly contact the customer.';

			$subject='GCT - New Sign Up';
			$subject2='GCT - New Sign Up';
			$fromEmail = $email;
            $cmail = 'support@giddycruisetransportation.com';
			$mailto =  $cmail;
          
			$message = "Dear  Admin". "\n"

			. "You recevie a new sign up from a customer. Find the details below " . "\n\n"
			
			. "Fist Name         : " . "\n". $fname . "\n\n"
			. "Last Name         : " . "\n" . $lname . "\n\n"
			. "Phone Number      : " . "\n" . $phone. "\n\n"
			. "Email             : " . "\n" . $email. "\n\n"
         	. "Reg Date         : " . "\n" . $sendDate. "\n\n"


			
			. "Regards," . "\n" . "- System Support";
			
			//Message for client confirmation
			$message2 = "Dear " . $fname . "\n\n"

			. "Thank you for signing up with Giddy Cruise Transportation! Below are you login details " . "\n\n"

            . "Email         : " . "\n". $email . "\n\n"
			. "Password         : " . "\n" . $pwd . "\n\n"
		


			. $note . "\n\n"
			
			. "Regards," . "\n" . "- Giddy Cruise Transportation";
			
			//Email headers
			$headers = "From: " . $cmail; // Client email, I will receive
			$headers2 = "From: " . $cmail; // This will receive client
			
			//PHP mailer function
			
            $result1= mail($mailto, $subject, $message, $headers); // This email sent to My address
			$result2= mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
			
			//Checking if Mails sent successfully
			
			if ($res && $res2) {
                echo '<div class="alert alert-success" role="alert">
                <strong>Alert!</strong> Your registration was successful.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
			} else {
                echo '<div class="alert alert-danger " role="alert">
                <strong>Alert!</strong> Something went wrong!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
			}
    
			// header('Location: success.php?s='.urlencode('Your seat is booked.')); exit;
        }
    }
      
    
?>
        </div>
<div class="row">
    <div class="col-md-8 col-sm-8">
        <h5 class="content-header">Create your account</h5>
        <p>Fill the form below correctly </p>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">First Name</label>
                        <input class="form-control" type="text" data-val="true" data-val-required="First Name is required." id="fname" name="fname" value="" require />
                        <span class="field-validation-valid" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="LastName">Last Name</label>
                        <input class="form-control" type="text" data-val="true" data-val-required="Surname is required is required." id="snamee" name="sname" value="" require />
                        <span class="field-validation-valid" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label for="Email">Email</label>
                        <input class="form-control" type="Email" data-val="true" data-val-email="Email is invalid. Enter a valid email" id="email" name="email" require />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Phone</label>
                        <input class="form-control" type="number"  id="phone" name="phone" value="" require />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Gender</label>
                        <select class="form-select form-control mb-5" id="gender" name="gender" aria-label="Floating label select example">
                        <option selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-unlock input-icon input-icon-show"></i>
                        <label for="Email">Password</label>
                        <input class="form-control" type="password" id="password" name="pwd" require />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-unlock input-icon input-icon-show"></i>
                        <label for="Phone">Confirm Password</label>
                        <input class="form-control" type="password" name="pwd2" id="confirm_password" required />
                    </div>
                </div>
                
                <div class="col-md-12 text-danger"> <hr>
                <p><b>By Signing Up, I agree to GCT's Terms and Condition and <a href="ticketpolicy.php">Privacy Policy</a> </b></p>
                <br>
                </div>
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                            <i class="icon-ok icon-white"></i> Sign Up
                                        </button>
                                        <button type="reset" class="btn btn-warning btn-lg">
                                            <i class="icon-refresh icon-black"></i> Clear
                                        </button>
                                    </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                </div>
                            </div>
                <div class="col-md-6 text-danger">
                    <p><b>Already have an Account? <a href="sign.php">Sign In</a> </b></p>
                    <br>
                </div>
        </form>
        <div id="loader"></div>
        </div>

    </div>
    <div class="col-md-3 col-sm-3">
        <div class=" gap gap-bottom visible-xs"></div>
        <aside class="sidebar-right">
            <div class="sidebar-widget">
                <h5 class="content-header">Giddy Cruise Transport</h5>
                <ul class="thumb-list thumb-list-right">
                    <li>
                        <i class="fa fa-home pull-left"></i>
                        <div class="thumb-list-item-caption">
                            <p class="thumb-list-item-title"><a>10 Cinnamon Cir, Randallstown, MD 21133, USA.</a></p>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-phone pull-left"></i>
                        <div class="thumb-list-item-caption">
                            <p class="thumb-list-item-title"><a>+14432202654</a></p>
                            <p class="thumb-list-item-title"><a>+14439855520</a></p>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-envelope pull-left"></i>
                        <div class="thumb-list-item-caption">
                            <p class="thumb-list-item-title"><a href="mailto:gidicruiztransportation@gmail.com">gidicruiztransportation@gmail.com</a></p>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div>

    </div>
    <div style="clear:both"></div>
    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

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