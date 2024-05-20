<?php 
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>

<div class="container page-content">
    <h4 class="page-title pt30">Sign Up with Giddy Cruise Transport</h4>
    <div>
    <?php
    if (isset($_POST['psend'])) {
        $success = false;
        $mailError = false;
        $mailErrorMessage = '';

        try {
            $sendDate = date('Y-m-d H:i:s');  // get current date in the correct format
            $fname  = trim($_POST["fname"]);
            $lname  = trim($_POST["sname"]);
            $phone  = trim($_POST["phone"]);
            $email  = trim($_POST["email"]);
            $pwd  = trim($_POST["pwd"]);
            $gender = trim($_POST["gender"]);

            $funame = trim($fname.' '.$lname);

            $_SESSION['userID'] = mt_rand(1000,999999); // user number
            $userID = $_SESSION['userID']; // user number

            $stmt = $conn->prepare("SELECT email FROM boidata WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if($stmt->num_rows > 0){
                echo '<div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Email already exists!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            } else {
                // Hash the password before storing
                $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

                // Insert into users table
                $stmt = $conn->prepare("INSERT INTO users (email, pwd, regDate) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $email, $hashed_pwd, $sendDate);
                $stmt->execute();

                // Insert into biodata
                $stmt = $conn->prepare("INSERT INTO boidata (email, fullName, gender, phone, regDate, userid) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $email, $funame, $gender, $phone, $sendDate, $userID);
                $stmt->execute();

                $success = true;

                // Email verification placeholder
                $verification_code = bin2hex(random_bytes(16));
                // Store the verification code in the database and send it via email to the user
                // This part is left as a placeholder for the actual email verification logic

                $note = ' Use the above information to log in and manage your account. Please contact us if you have any issues with your account.';
                $subject = 'GCT - New Sign Up';
                $subject2 = 'GCT - New Sign Up';
                $fromEmail = $email;
                $cmail = 'support@giddycruisetransportation.com';
                $mailto = $cmail;

                $message = "Dear Admin,\n\nYou received a new sign up from a customer. Find the details below:\n\n"
                . "First Name: " . $fname . "\n\n"
                . "Last Name: " . $lname . "\n\n"
                . "Phone Number: " . $phone . "\n\n"
                . "Email: " . $email . "\n\n"
                . "Reg Date: " . $sendDate . "\n\n"
                . "Regards,\n- System Support";

                // Message for client confirmation
                $message2 = "Dear " . $fname . ",\n\nThank you for signing up with Giddy Cruise Transportation! Below are your login details:\n\n"
                . "Email: " . $email . "\n\n"
                . "Password: " . $pwd . "\n\n"
                . $note . "\n\n"
                . "Regards,\n- Giddy Cruise Transportation";

                // Email headers
                $headers = "From: " . $cmail; // Client email, I will receive
                $headers2 = "From: " . $cmail; // This will receive client

                // PHP mailer function
                $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
                $result2 = mail($fromEmail, $subject2, $message2, $headers2); // This confirmation email to client

                // Checking if Mails sent successfully
                if (!$result1 || !$result2) {
                    $mailError = true;
                    $mailErrorMessage = "Error sending email.";
                }
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger" role="alert">
            <strong>Error:</strong> ' . $e->getMessage() . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

        if ($success) {
            echo '<div class="alert alert-success" role="alert">
            <strong>Success!</strong> Your account has been created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

        if ($mailError) {
            echo '<div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> ' . $mailErrorMessage . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
    }
    ?>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h5 class="content-header">Create your account</h5>
            <p>Fill the form below correctly</p>
            <div class="col-md-12 item-features">
                <form method="post" action="#" onsubmit="myFunction()">
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-user input-icon input-icon-show"></i>
                            <label for="FirstName">First Name</label>
                            <input class="form-control" type="text" data-val="true" data-val-required="First Name is required." id="fname" name="fname" required />
                            <span class="field-validation-valid" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-user input-icon input-icon-show"></i>
                            <label for="LastName">Last Name</label>
                            <input class="form-control" type="text" data-val="true" data-val-required="Surname is required." id="sname" name="sname" required />
                            <span class="field-validation-valid" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-envelope input-icon input-icon-show"></i>
                            <label for="Email">Email</label>
                            <input class="form-control" type="email" data-val="true" data-val-email="Email is invalid. Enter a valid email" id="email" name="email" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-phone input-icon input-icon-show"></i>
                            <label for="Phone">Phone</label>
                            <input class="form-control" type="number" id="phone" name="phone" value="" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-user input-icon input-icon-show"></i>
                            <label for="Subject">Gender</label>
                            <select class="form-select form-control mb-5" id="gender" name="gender" aria-label="Floating label select example" required>
                                <option selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-unlock input-icon input-icon-show"></i>
                            <label for="Password">Password</label>
                            <input class="form-control" type="password" id="password" name="pwd" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left">
                            <i class="fa fa-unlock input-icon input-icon-show"></i>
                            <label for="Confirm Password">Confirm Password</label>
                            <input class="form-control" type="password" name="pwd2" id="confirm_password" required />
                        </div>
                    </div>
                    <div class="col-md-12 text-danger mt-3">
                        <hr>
                        <p><b>By Signing Up, I agree to GCT's Terms and Condition and <a href="ticketpolicy.php">Privacy Policy</a></b></p>
                        
                    </div>
                    <div class="col-md-12 text-danger">
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 text-center ">
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                    <i class="icon-ok icon-white"></i> Sign Up
                                </button>
                                <button type="reset" class="btn btn-warning btn-lg">
                                    <i class="icon-refresh icon-black"></i> Clear
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12 text-danger"><br/>
                            <p><b>Already have an Account? <a href="sign.php">Sign In</a></b></p>
                            <br>
                        </div>
                    </div>
                    <div id="loader"></div>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="gap gap-bottom visible-xs"></div>
            <aside class="sidebar-right">
                <div class="sidebar-widget">
                    <h5 class="content-header">Giddy Cruise Transport</h5>
                    <ul class="thumb-list thumb-list-right">
                        <li>
                            <i class="fa fa-home pull-left"></i>
                            <div class="thumb-list-item-caption">
                                     <p class="thumb-list-item-title"><a>200 E Pratt St Suite 4100, Baltimore, MD 21202, USA.</a></p>
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
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
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
