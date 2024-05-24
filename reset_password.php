<?php 
session_start();
include("sheader.php");
require 'partials/_functions.php';
$conn = db_connect();
?>
    <style>
        .message {
            font-weight: bold;
            margin-left: 20px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
<div class="container page-content">
    <div class="row justify-content-center"> <!-- Centering content horizontally -->
    <h4 class="page-title pt30 text-center">Reset Password</h4>
        <div class="col-md-6">
            

           <div class="row">
                <div class="col-md-12">
                <?php
                // Display the message if it exists
                if (isset($_SESSION['message'])) {
                    $messageType = $_SESSION['message_type'] ?? 'info'; // Default to 'info' if not set
                    echo "<p class='message {$messageType}' >{$_SESSION['message']}</p>";
                    unset($_SESSION['message']); // Clear the message after displaying it
                    unset($_SESSION['message_type']);

                }
                ?>
                    <!-- Login Form -->
                    <div class="item-features">
                        <form method="post" action="process_reset.php">
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">

                            <div class="form-group form-group-icon-left">
                                <i class="fa fa-envelope input-icon input-icon-show"></i>
                                <label for="email">New Password</label>
                                <input class="form-control" type="password" data-val="true" data-val-required="Password is required." id="new_password" name="new_password" value="" require />
                                <span class="field-validation-valid" data-valmsg-for="new_password" data-valmsg-replace="true"></span>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                    <i class="icon-ok icon-white"></i> Reset Password
                                </button>
                            </div>
                        </form>
                        <div id="loader"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Don't have an Account? <a href="signup.php">Sign Up</a></p>
                    <p>Sign In <a href="sign.php">click here</a></p>
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
    Copyright © 2024 - Giddy Cruise Transport. All rights reserved. Powered by <a class="text-color bolded" target="_blank" href="https://giddyhost.com"> Giddy Host</a>
</p>
