<?php include("header.php") ?>


    <div class="container page-content">
        <h4 class="page-title pt30">Contact Giddy Cruise Transport</h4>
        <div>
        <?php
        if (isset($_POST['psend'])){
    
            $sendDate = date('Y-m-d h:m:s A');  // get current date
            $fname  = trim($_POST["fname"]);
            $lname  = trim($_POST["sname"]);
            $phone  = trim($_POST["phone"]);
            $email  = trim($_POST["email"]);
            $subject  = trim($_POST["subject"]);
            $message  = trim($_POST["message"]);
        
            // $gender  = trim($_POST["gender"]);
            // $location  = trim($_POST["location"]);
           
			$note =' We have recevied your message, One of our representative we get back to you within 24 hours';
			$adminNote = 'Kindly contact the customer.';

			$subject='GCT - New Message';
			$subject2='GCT - New Message';
			$fromEmail = $email;
            $cmail = 'support@giddycruisetransportation.com';
			$mailto =  $cmail;
          
			$message = "Dear  Admin". "\n"

			. "You recevie a new message from your customer. Find the details below " . "\n\n"
			
			. "Fist Name         : " . "\n". $fname . "\n\n"
			. "Last Name         : " . "\n" . $lname . "\n\n"
			. "Phone Number      : " . "\n" . $phone. "\n\n"
			. "Email             : " . "\n" . $email. "\n\n"
            . "Subject	         : " . "\n" . $subject. "\n\n"
            . "Message           : " . "\n" . $message. "\n\n"
			. "Send Date         : " . "\n" . $sendDate. "\n\n"


			. $adminNote . "\n\n"
			
			. "Regards," . "\n" . "- System Support";
			
			//Message for client confirmation
			$message2 = "Dear " . $fname . "\n"

			. "Thank you for contacting our support!" . "\n\n"
		


			. $note . "\n\n"
			
			. "Regards," . "\n" . "- CS Diddy-Transport";
			
			//Email headers
			$headers = "From: " . $cmail; // Client email, I will receive
			$headers2 = "From: " . $cmail; // This will receive client
			
			//PHP mailer function
			
            $result1= mail($mailto, $subject, $message, $headers); // This email sent to My address
			$result2= mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client
			
			//Checking if Mails sent successfully
			
			if ($result1 && $result2) {
                echo '<div class="alert alert-success" role="alert">
                <strong>Alert!</strong> Message send successfully.
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
      
    
?>
        </div>
<div class="row">
    <div class="col-md-8 col-sm-8">
        <h5 class="content-header">Send Us A Message</h5>
        <p>You can contact us using this form. Giddy Cruise Transport treats all messages as urgent</p>
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
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Email">Email</label>
                        <input class="form-control" type="Email" data-val="true" data-val-email="Email is invalid. Enter a valid email" id="email" name="email" value="" require />
                        <span class="field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Phone">Phone</label>
                        <input class="form-control" type="number"  id="phone" name="phone" value="" require />
                        <span class="field-validation-valid" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Subject</label>
                        <input class="form-control" type="text" data-val="true" data-val-required="Subject is required." id="subject" name="subject" value="" require/>
                        <span class="field-validation-valid" data-valmsg-for="Subject" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Message">Message</label>
                        <textarea class="form-control" rows="10" data-val="true" data-val-required="Message is required." id="message" name="message" require>
                </textarea>
                        <span class="field-validation-valid" data-valmsg-for="Message" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                            <i class="icon-ok icon-white"></i> Send Now
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
<?php include("footer.php") ?>