<?php
session_start();
include("sheader.php");
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
    <h4 class="page-title pt30 text-center">Request Password Reset</h4>
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
                        <form method="post" action="send_reset_email.php">
                            <div class="form-group form-group-icon-left">
                                <i class="fa fa-envelope input-icon input-icon-show"></i>
                                <label for="email">Enter Your Email</label>
                                <input class="form-control" type="email" data-val="true" data-val-required="Email is required." id="email" name="email" value="" require />
                                <span class="field-validation-valid" data-valmsg-for="email" data-valmsg-replace="true"></span>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-lg" name="psend" id="psend">
                                    <i class="icon-ok icon-white"></i> Submit
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
