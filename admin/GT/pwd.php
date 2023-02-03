<?php 
include('header.php');

$msg ='';
$suc = '';
?>      

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Security</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Change Password</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                    
                        <div class="row d-flex justify-content-center">
                        
                        <div class="col-lg-8">
                        <?php
                     if(isset($_POST['Submit']))
                     {
                      // $oldpass=md5($_POST['opwd']);
                      $useremail=$_SESSION['login_user'];
                      $newpassword=trim($_POST['npwd']);
                     $sql=mysqli_query($conn,"update login set uPwd='$newpassword' where uName='admin'");
                 
                     ?>
                     <?php
                 
                             //  $to="mistulb@gmail.com";
                           $to= "support@giddycruisetransportation.com";
                           $subject="Change Password ";
                 
                       $message = '
                           <sapn> <strong><br><h2>Your Admin Password Change Successfully ! </h2></strong></sapn> <br /> <b/>
                 
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
                            <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>
                            <p id='alert' style = "font-size:20px; font-weight:bold; text-align: center; color:#61b15a; margin-top:10px"><?php echo $suc; ?></p>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Change Password</h4>
                                    <code class="card-title-desc">Change Admin Password.</code>
                                    <div>
                                        <form action="" method="post" onSubmit="return valid();"><br>
                                            <span>New Password</span>
                                            <div class="mb-4">
        									<input type="password" name="npwd" id="npwd" class="form-control" placeholder="New Password" required>
                                            </div>

                                            <span>Confirm Password</span>
                                            <div class="mb-4">
                                            <input type="password" name="cpwd" id="cpwd" class="form-control"  placeholder="Confim New Password" required>
                                            </div>
                                        
                                            <div>
        									<button type="submit" name="Submit" class="btn btn-primary waves-effect waves-light"><i class="fas fa-lock"></i> Change Password</button>
                                            </div>

                      
                                        </form>
                                    </div>
                                    <!-- <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p> -->

                                </div>
                            </div> 
                        </div>
                    </div>   



                     </div>
                 </div>
            </div>
            <script>
          setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 20000);
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
<?php 
include('footer.php');
?>
            