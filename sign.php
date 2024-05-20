<?php 
session_start();
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect();
?>

<div class="container page-content">
    <div class="row justify-content-center"> <!-- Centering content horizontally -->
    <h4 class="page-title pt30 text-center">Sign Into Your GCT Account</h4>
        <div class="col-md-6">
            

            <?php
            if (isset($_POST['psend'])){
                $email  = trim($_POST["email"]);
                $pwd  = trim($_POST["pwd"]);

                $sql = "SELECT id, email, pwd FROM users WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                if($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $cemail, $hashed_pwd);
                    $stmt->fetch();

                    if(password_verify($pwd, $hashed_pwd)){
                        $_SESSION['email'] = $cemail;
                        $_SESSION['last_login_timestamp'] = time();

                        $script = "<script>
                        window.location = 'dashb.php';</script>";
                        echo $script;
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
                            <strong>Alert!</strong> Your Password is invalid.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                        <strong>Alert!</strong> Your Login Name or Password is invalid.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
            }
            ?>

            <div class="row">
                <div class="col-md-12">
                    <!-- Login Form -->
                    <div class="item-features">
                        <form method="post" action="#" onsubmit="myFunction()">
                            <div class="form-group form-group-icon-left">
                                <i class="fa fa-envelope input-icon input-icon-show"></i>
                                <label for="email">Email</label>
                                <input class="form-control" type="email" data-val="true" data-val-required="Email is required." id="email" name="email" value="" require />
                                <span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group form-group-icon-left">
                                <i class="fa fa-key input-icon input-icon-show"></i>
                                <label for="pwd">Password</label>
                                <input class="form-control" type="password" data-val="true" data-val-required="Password is required is required." id="pwd" name="pwd" value="" require />
                                <span class="field-validation-valid" data-valmsg-for="pwd" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                    <i class="icon-ok icon-white"></i> Sign In
                                </button>
                            </div>
                        </form>
                        <div id="loader"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Don't have an Account? <a href="signup.php">Sign Up</a></p>
                    <p>Forgot your password? <a href="fpwd.php">click here</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Image of lock key -->
            <img src="https://cdn.masterlock.com/masterlock_eu/resources/img/images-library.jpg" alt="Lock Image" class="img-fluid">
        </div>
    </div>
</div>

<hr />
<p align="center">
    Copyright © 2022 - Giddy Cruise Transport. All rights reserved. Powered by <a class="text-color bolded" target="_blank" href="https://giddyhost.com"> Giddy Host</a>
</p>
