<?php 
session_start();
include("header.php");
require 'partials/_functions.php';
$conn = db_connect();

if(!isset($_SESSION['email'])) {
   $script = "<script>
   window.location = 'index.php';</script>";
   echo $script;
   exit();
}

?>

<div class="container page-content">
    <h4 class="page-title pt30">Change Your GCT Account Password</h4>
    <div>
        <?php
        if (isset($_POST['psend'])){
    
            $email =  $_SESSION['email'];
            $pwd  = trim($_POST["pwd"]);
            $pwd2 = trim($_POST["pwd2"]);

            // Check if passwords match
            if ($pwd !== $pwd2) {
                echo '<div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Passwords do not match.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                exit; // Stop further execution
            }

            // Hash the password
            $pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);
          
            // Update password on users table
            $stmt = $conn->prepare("UPDATE users SET pwd=? WHERE email =?");
            $stmt->bind_param('ss', $pwd_hashed, $email);
            $result = $stmt->execute();

            if($result){
                echo '<div class="alert alert-success" role="alert">
                <strong>Alert!</strong> Password changed successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Something went wrong.
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
        <h5 class="content-header">Change Password</h5>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-lock input-icon input-icon-show"></i>
                        <label for="password">Enter New Password</label>
                        <input class="form-control" type="password" id="password" name="pwd" value="" require />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-lock input-icon input-icon-show"></i>
                        <label for="confirm pwd">Confirm Password</label>
                        <input class="form-control" type="password" id="confirm_password" name="pwd2" value="" require />
                    </div>
                </div>
           
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                            <i class="icon-ok icon-white"></i> Submit
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
<?php include("footer.php") ?>