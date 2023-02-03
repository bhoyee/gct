<!DOCTYPE html>
<html>

<!-- Mirrored from chiscotransport.com.ng/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 06:10:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>
        Book a Bus - Giddy Transport
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <meta name="keywords" content="Book a Bus, Bus Tickets, E-Ticket, Bus Booking, Book Online, Online Bus Booking In Baltimore, Maryland, book bus tickets Baltimore MAaryland, Book Online New York, Maryland, Washington DC, Baltimore, Book Online New York, Maryland, Washington DC, Baltimore, " />
    <meta name="description" content="Book your bus tickets online on GIDDYTransport.com and get upto 15% discounts on your return booking.">
    <meta name="author" content="www.bhoyee.com">



    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <!-- css frame works -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/new-skin/responsive.css">
    <link href="css/previousStyle.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/new-skin/style.css">
    <link rel="stylesheet" type="text/css" href="css/new-skin/bootstrap-datepicker.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/icomoon.css">
    <link href="css/i-check.css" rel="stylesheet" />
    <link href="css/mystyles.css" rel="stylesheet" />
    <link href="css/bootstrap-select.min.css" rel="stylesheet" />


    <style type="text/css">
        :root {
            --animate-duration: 800ms;
            --animate-delay: 10s;
        }
        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.75) url(img/ajax-loader.gif) no-repeat center center;
            z-index: 10000;
        }


</style>
    
</head>
<body>


<div id="header">
    <div class="container">
        <nav class="navbar navbar-default" style="margin-top: 2%">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="navbar-header">

                            <a class="navbar-brand" href="https://giddycruisetransportation.com">
                                <img src="img/new-skin/chisco_logo.png" width="100px" class="logom" style="margin-top: -10px">
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-10">
                        <div class="collapse navbar-collapse slimmenu-menu-collapser" id="bs-example-navbar-collapse-1" style="text-align: right">

                            <ul class="slimmenu" id="slimmenus">

         <?php
       
        if(isset($_SESSION['email'])) { ?>
            
            <li><a href="https://giddycruisetransportation.com">Home</a></li>
            <li><a href="dashb.php">Dashboard</a></li>
               
            <li>
                <a>Manage Booking</a>
                <ul>
                    <li><a class="no-child" href="BookingReference.php">Booking Status</a></li>
                    <li><a class="no-child" href="bcancel.php">Cancel Booking</a></li>
                    <li><a class="no-child" href="thepayment.php">Pay For Booking</a></li>
        
                </ul>
            </li>
            <li>
                <a>Choose Trip </a>
                <ul>
                    <li><a class="no-child" href="airporttrip.php">Airport Trip</a></li>
                    <li><a class="no-child" href="Charter.php">Charter</a></li>
                    <li><a class="no-child" href="index.php">Inter State</a></li>
        
                </ul>
            </li>
            <li>
                  <a class="no-child" href="thepayment.php">Make Payment</a>
            </li>  
            <li>
                <a class="no-child" href="Contact.php">Contact</a>
            </li>
            <li>
                <a class="no-child" href="logout.php">logout</a>
            </li>

          
            <?php }else{

        ?>
    <li>
        <a class="no-child" href="https://giddycruisetransportation.com">Home</a>
    </li>
    
     <li>
         <a>About Us</a>
         <ul>
            <li><a class="no-child" href="about.php">About Us</a></li>
            <li><a class="no-child" href="ticketpolicy.php">Our Ticket Policy</a></li>
            <li><a class="no-child" href="terminal.php">Our Terminals</a></li>
   
        </ul>
    </li>
        
   
    <li>
        <a>Manage Booking</a>
        <ul>
            <li><a class="no-child" href="BookingReference.php">Booking Status</a></li>
            <li><a class="no-child" href="bcancel.php">Cancel Booking</a></li>
            <li><a class="no-child" href="thepayment.php">Pay For Booking</a></li>
   
        </ul>
    </li>
       
    <li>
        <a>Choose Trip </a>
        <ul>
            <li><a class="no-child" href="airporttrip.php">Airport Trip</a></li>
            <li><a class="no-child" href="Charter.php">Charter</a></li>
              <li><a class="no-child" href="index.php">Inter State</a></li>
   
        </ul>
    </li>
      
    <li>
        <a class="no-child" href="thepayment.php">Make Payment</a>
    </li>  
     <li>
        <a class="no-child" href="Contact.php">Contact</a>
    </li>
    <li>
        <a class="no-child" href="sign.php">Sign In/ Sign Up</a>
    </li>
  



</ul>
<?php } ?>

                        </div>
                    </div>
                </div>
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>