<?php 
include('header.php');
?>
<?php
    
    include("connect.php");
    $msg = '';
    $suc = '';
    if(isset($_POST['Submit']))
    {
     // $oldpass=md5($_POST['opwd']);
     $useremail=$_SESSION['login'];
     $newpassword=trim($_POST['npwd']);
    $sql=mysqli_query($conn,"update login set uPwd='$newpassword' where uName='admin'");

    ?>
    <?php

            //  $to="mistulb@gmail.com";
          $to= "gidicruiztransportation@gmail.com";
          $subject="Change Password ";

      $message = '
          <sapn> <strong><h2>Your Admin Password Change Successfully ! </h2></strong></sapn> <br /> <b/>

          <p>
          If you dont initialize this effect, kindly login to website to change the password . Thank you !!!
          </p>
      ';

          $headers = 'MIME-Version: 1.0'."\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
          $headers .= "From: support@giddycruisetransportation.com
          ";

         mail($to, $subject, $message, $headers);  // Mail Function




             ?>
             <?php
$suc = "Password Changed Successfully !!";

}



?>
  <?php mysqli_close($conn); // Close connection ?>

    <!--== Page Title Area Start ==-->
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Change Password</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Changing Admin Password</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>

        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">

                	<div class="login-page-content">
                    <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>
                    <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#61b15a; margin-top:10px"><?php echo $suc; ?></p>

                		<div class="login-form">
                			<h3>Change Password</h3>
        							<form name="chngpwd" action="" method="post" onSubmit="return valid();">
                        <div class="username">
        									<input type="password" name="npwd" id="npwd" placeholder="New Password" required>
        								</div>
        								<!-- <div class="username">
        									<input type="text" name="price" placeholder="Price" required>
        								</div> -->

                        <div class="username">
                          <input type="password" name="cpwd" id="cpwd" placeholder="Confim New Password" required>
                        </div>

        								<div class="log-btn">
        								<button type="submit" name="Submit" value="Change Passowrd"><i class="fa fa-sign-in"></i> Change Password</button>
        								</div>

        							</form>

                		</div>

                	</div>
                </div>

        	</div>

        </div>
    </section>

        

      <script>
          setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 10000);
        </script>

        <script >
        function valid()
        {
        if(document.chngpwd.npwd.value=="")
        {
        alert("New Password Filed is Empty !!");
        document.chngpwd.npwd.focus();
        return false;
        }
        else if(document.chngpwd.cpwd.value=="")
        {
        alert("Confirm Password Filed is Empty !!");
        document.chngpwd.cpwd.focus();
        return false;
        }
        else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.cpwd.focus();
        return false;
        }
        return true;
        }
        </script>

<?php include('footer.php');?>