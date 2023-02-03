<?php require 'partials/_functions.php';
include("session_timeout.php");
 $conn = db_connect();
 session_start();
 ?>
<?php include("header.php") ?>

<?php 

 if(!isset($_SESSION['email'])) {

    $script = "<script>
    window.location = 'index.php';</script>";
    echo $script;
    exit();
 }

if(isset($_SESSION['email'])) {
    
    $email = $_SESSION['email'];
    $sqlx = "SELECT fullName, email, phone , gender from boidata where email = '$email'";
    $resultx = mysqli_query($conn, $sqlx);
    $testx = mysqli_num_rows($resultx);

    if($testx > 0){
     
        $rowx = mysqli_fetch_array($resultx);
        $fname = $rowx['fullName'];
        $cemail = $rowx['email'];
        $phone = $rowx['phone'];
        $gender = $rowx['gender'];
    }
}
?>

    <div class="container page-content">
        <h4 class="page-title pt30">Update Your GCT Profile</h4>
        <div>
        <?php
        if (isset($_POST['psend'])){

            $email =  $_SESSION['email'];
            $fname  = trim($_POST["fname"]);
            $phone  = trim($_POST["phone"]);
            $bemail  = trim($_POST["email"]);
            $gender  = trim($_POST["gender"]);
       
            $result = mysqli_query($conn, "UPDATE boidata SET fullName='$fname', phone='$phone', gender='$gender' WHERE email ='$email'");

            
            if($result){

                echo '<div class="alert alert-success" role="alert">
                <strong>Alert!</strong> Profile Updated Successfully.
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
        <h5 class="content-header">Update your profile </h5>
        <p style="color:red"><b>Note: You will not be able to change your email . If need be , kindly contact support.</b></p>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Full Name</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;" id="fname" name="fname" value="<?php echo $fname;?>" require />
                    </div>
                </div>
           
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label for="Email">Email</label>
                        <input class="form-control" style="background-color:#E5E7E9; color:#17202A;" type="Email" id="email" name="email" value="<?php echo $cemail;?>" readonly />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Phone</label>
                        <input class="form-control" type="number" style="background-color:#E5E7E9; color:#17202A;"  id="phone" name="phone" value="<?php echo $phone;?>" require />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Gender</label>
                        <input class="form-control" type="text" id="gender" style="background-color:#E5E7E9; color:#17202A;" name="gender" value="<?php echo $gender;?>" require/>
                    </div>
                </div>
            
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                            <i class="icon-ok icon-white"></i> Update Now
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