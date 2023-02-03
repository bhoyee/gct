<?php require 'partials/_functions.php';
include("session_timeout.php");
 $conn = db_connect();
 session_start();

 if(isset($_GET['status']) && isset($_GET['id']))
 {
     if($_GET['status']='viewseats')
     {
         $routeid = $_GET['id'];
         $routebus = $_GET['bus'];

         $rsql = "SELECT routes.id AS id, routes.route_dep_time AS time, routes.route_cities AS route, routes.route_status AS status, routes.bus AS bus, routes.price AS price, buses.seat AS seat FROM routes INNER JOIN buses ON buses.bus_name = routes.bus WHERE routes.id=$routeid";
        //  $rsql = "SELECT * FROM routes WHERE id = $routeid";
         $resultr = mysqli_query($conn, $rsql);
         $rowr = mysqli_fetch_assoc($resultr);
         if(isset($rowr['id'])) {
            $time = $rowr['time'];
            $rtime = date("g:i a", strtotime("$time"));
            $rstatus = $rowr['status'];
            $rprice = $rowr['price'];
            $rbus = $rowr['bus'];
            $st = $rowr['seat'];
            $route = $rowr['route'];




            $_SESSION['nroute'] = $route;
            $_SESSION['bus'] = $rbus;
            $_SESSION['ntime'] = $rtime;
            $_SESSION['price'] = $rprice;


            
         }
        //  $returnvalue=$object->view_seats($busid);
     }
 }

 if(!isset($_SESSION['route']) && empty($_SESSION['route'])) {

     $script = "<script>
     window.location = 'index.php';</script>";
     echo $script;
     exit();
 }
 if(!isset($_SESSION['returnDate']) || empty($_SESSION['returnDate'])){
    $_SESSION['returnDate'] = '00:00:00';
 }

 //check for register user
 if(isset($_SESSION['email'])) {

 
    $email = $_SESSION['email'];
    $sqlx = "SELECT fullName, email, phone, gender from boidata where email = '$email'";
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
else{

    echo '<script> alert("You need to register and sign-In before you can book !"); </script>';
				$script = "<script>
				window.location = 'sign.php';</script>";
				echo $script;

     exit();
}


?>
<!DOCTYPE html>
<html>

<!-- Mirrored from chiscotransport.com.ng/Charter by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 06:13:11 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>
    Giddy Transport
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Book a Bus, Bus Tickets, E-Ticket, Bus Booking, Book Online, Online Bus Booking In Nigeria, book bus tickets nigeria, Book Online Nigeria, Book Online West Africa, " />
    <meta name="description" content="Book your bus tickets online on CHISCOTransport.com.ng and get upto 15% discounts on your return booking.">
    <meta name="author" content="www.voicyreel.com">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    <!-- css frame works -->
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/new-skin/responsive.css">
    <link href="css/previousStyle.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/new-skin/style.css">
    <link rel="stylesheet" type="text/css" href="css/new-skin/bootstrap-datepicker.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&amp;family=Work+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link href="css/i-check.css" rel="stylesheet" />
    <link href="css/mystyles.css" rel="stylesheet" />
    <link href="css/bootstrap-select.min.css" rel="stylesheet" />
    <style type="text/css">
        :root {
            --animate-duration: 800ms;
            --animate-delay: 10s;
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

                            <a class="navbar-brand" href="index.php">
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
<div class="container page-content">
        <div class="gap"></div>

        <p>
        <?php

            // check for a successful form post
            if (isset($_GET['s'])) 
            {
                $script = "<script>
                window.location = 'success.php';</script>";
                echo $script;
                exit();
                // echo "<div class=\"alert alert-success\">".$_GET['s']." You will be automatically redirected after 5 seconds.</div>";
            //						echo "You will be automatically redirected after 5 seconds.";
                // header("refresh: 5; index.php");
            }

            // check for a form error
            elseif (isset($_GET['e']))
            {
                echo '<div class="alert alert-danger " role="alert">
                <strong>Alert! </strong>'.$_GET['e'].'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            } 
            // echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";
          
            
            ?> 
        </p>
       <h4 style="color:grey">SELECT SEAT(s)</h4> 
       <!-- <form action="summary.php" method="POST" onsubmit="return validateCheckBox();"> -->
       <form action="getquotesummary.php" method="POST">

<div class="row">
<div class="col-md-12 ">

<div class="booking-item-details">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="small-mobile bus-back dvBooking ng-scope">
 
<bus-seats id="busSeat" max="15" height="6" width="3" uselinear="true" totalnoofseats="15" class="ng-isolate-scope" selectedseats="[]">
        <h5 class="text-color"><i class="fa fa-wheelchair"></i> <b>Seat Selection</b></h5>

<div class="col-xs-12">
    <div class="row">
    <ul class="thumbnails">
                    <?php
                        // $date = date('Y-m-d');
                        $DDate = $_SESSION['deptDate'];
                        //  $dates =('2022-04-26');
                        // echo $date;
                        // $dfrom = strip_tags( utf8_decode( $_POST['dfrom'] ) );
                        // $dto = strip_tags( utf8_decode( $_POST['dto'] ) );
                        // $DapartureDate = strip_tags( utf8_decode( $_POST['DapartureDate'] ) );

                        $sql = "select * from seats where date ='$DDate' and route='$route' and bus='$rbus' and status='active' ORDER BY id DESC";
                        $result = mysqli_query($conn, $sql);
                       
                        $st= $st+1;
                        $_SESSION['seat'] = $st;
                        if ( mysqli_num_rows($result) == 0 )
                        {
                            for($i=1; $i<$st; $i++)
                            { 
                                echo "<li class='span1'>";
                                    echo "<a class='thumbnail' title='Available'>";
                                        echo "<img src='img/avail.png' alt='Available Seat'/>";
                                        echo "<label class='checkbox'>";
                                            echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
                                        echo "</label>";
                                    echo "</a>";
                                echo "</li>";	
                              
                           
                                                   
                            }
                        }
                        else
                        {
                            $seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                            while($row = mysqli_fetch_array($result))
                            {
                               	$pnr = explode(",", $row["PNR"]);
                                                                   
                                        for($a=0; $a<count($pnr); $a++)
                                        {
                                            $pnr[$a] = intval($pnr[$a]) - 1;
                                            $seats[$pnr[$a]] = 1;
                                        }
                                    
                                    
                            }
                            for($i=1; $i<$st; $i++)
                            {
                                $j = $i - 1;
                                if($seats[$j] == 1)
                                {
                                
                                    echo "<li class='span1'>";
                                        echo "<a class='thumbnail' title='Booked'>";
                                            echo "<img src='img/booked.png' alt='Booked Seat'/>";
                                            echo "<label class='checkbox'>";
                                                echo "<input type='checkbox' name='ch".$i."' disabled/>Seat".$i;
                                            echo "</label>";
                                        echo "</a>";
                                    echo "</li>";
                                  

                                }
                                else
                                {  
                                    echo "<li class='span1'>";
                                        echo "<a class='thumbnail' title='Available'>";
                                            echo "<img src='img/avail.png' alt='Available Seat'/>";
                                            echo "<label class='checkbox'>";
                                                echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
                                            echo "</label>";
                                        echo "</a>";
                                    echo "</li>"; 

                                }
                            }									
                            
                        }
                    ?>
                    </ul>
            </div>
        </div>


    </bus-seats>
</div></div>
<div class="col-md-6 col-sm-12 col-xs-12 pt50">
                    
                    <div class="col-xs-12 col-md-6">
                        <label>
                            <img class="img20" src="img/avail.png">
                            Available <span class="hidden-xs">Seat</span>
                        </label>
                    </div>
                  
                    <div class="col-xs-12 col-md-6">
                        <label>
                            <img class="img20" src="img/booked.png">
                            Booked <span class="hidden-xs">Seat</span>
                        </label>
                    </div>
                </div>
                    </div></div> <br>
   

    <div class="col-md-12">
      
          
            <div class="row booking-item-dates-change mb20 bg-white">
                <h5 class="content-header"><i class="fa f fa-users rounded box-icon-border-dashed pull-left"></i> Main Passenger Details</h5><hr>
                    <div class="row">
                             <div class="col-md-12">
                            <h5 class="bolded text-color-secondary">Main Passenger <small>(Name should be as it appears on Identification Document)</small></h5>
                        </div>
                        <div class="col-md-12">
                        <?php 
            if(isset($_SESSION['email'])) { ?>
                            <div class="col-md-6">
                                <div class="form-group form-group-icon-left">
                                    <label for="FinalBookingDetails_Info_Passengers_0__Name">Full Name </label>
                                    <i class="fa fa-user input-icon input-icon-show"></i>
                                    <input class="form-control" style="height:50px" type="text" name="fname" id="fname"  value="<?php echo $fname;?>" readonly >
                                   <!-- <input type="text" name="nseat" readonly value="<?php echo  $_SESSION['seat']?>" id="">
                                   <input type="text" name="ncar" readonly value="<?php echo $_SESSION['bus1']?>" id=""> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-group">
                                                <label for="DepartureTerminalId">Gender</label>
                                                <input class="form-control" style="height:50px" type="text" name="gender" id="gender" value="<?php echo $gender;?>" readonly >

                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="gap gap-border"></div>
                    </div>
            </div>
            <div class="row booking-item-dates-change mb20 bg-white">
                <h5 class="content-header"><i class="fa f fa-address-card rounded box-icon-border-dashed pull-left"></i> Contact Details</h5><hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group form-group-icon-left">
                                <i class="fa fa-user input-icon input-icon-show"></i>
                                <label for="">Email</label>
                                <i class="fa fa-envelope input-icon input-icon-show"></i>
                                <input class="form-control" style="height:50px" type="email" id="email" name="email"  value="<?php echo $email;?>" readonly>
                            </div>
                        </div>
                        <?php } else{ ?>
                            <div class="col-md-6">
                                <div class="form-group form-group-icon-left">
                                    <label for="FinalBookingDetails_Info_Passengers_0__Name">Full Name </label>
                                    <i class="fa fa-user input-icon input-icon-show"></i>
                                    <input class="form-control" style="height:50px" type="text" name="fname" id="fname" value="" required >
                                   <input type="hidden" name="nseat" readonly value="<?php echo $_SESSION['seat']?>" id="">
                                   <input type="hidden" name="ncar" readonly value="<?php echo $_SESSION['bus1']?>" id="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-group">
                                                <label for="DepartureTerminalId">Select Gender</label>

                                                <select id="gender" class="form-control" name="gender" title="Select gender" data-live-search="true">
                                                    <option value="0">Male or Femaile</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                    

                                                </select>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="gap gap-border"></div>
                    </div>
            </div>
            <div class="row booking-item-dates-change mb20 bg-white">
                <h5 class="content-header"><i class="fa f fa-address-card rounded box-icon-border-dashed pull-left"></i> Contact Details</h5><hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group form-group-icon-left">
                                <i class="fa fa-user input-icon input-icon-show"></i>
                                <label for="">Email</label>
                                <i class="fa fa-envelope input-icon input-icon-show"></i>
                                <input class="form-control" style="height:50px" type="email" id="email" name="email" value="" required >
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="FinalBookingDetails_Info_ContactInfo_Phone">Phone Number</label>
                                <i class="fa fa-mobile-phone input-icon input-icon-show"></i>
                                <input class="form-control" name="phone" style="height:50px" placeholder="412345678" title="Please enter 11 digit no." 
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11"
                                value="<?php echo $phone;?>"
                                required
                                 />
                                <!-- <input class="form-control" style="height:50px" type="number" placeholder="1412345678" id="phone" name="phone" value="" pattern=".{12}" title="Please enter 11 digit no." maxlength="12"  required > -->
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group form-group-icon-left">
                                <label for="FinalBookingDetails_Info_NextOfKinInfo_Name">Next of Kin's Name</label>
                                <i class="fa fa-user input-icon input-icon-show"></i>
                                <input class="form-control" style="height:50px" type="text"  id="k_name" name="k_name" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="FinalBookingDetails_Info_NextOfKinInfo_Phone">Next of Kin's Phone Number</label>
                                <i class="fa fa-mobile-phone input-icon input-icon-show"></i>
                                <input class="form-control" name="k_phone" style="height:50px" placeholder="412345678" title="Please enter 11 digit no." 
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11"
                                required
                                 />
                                <!-- <input class="form-control" style="height:50px" type="number" placeholder="1412345678" id="k_phone" name="k_phone" value="" min="10" max="12" required > -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row booking-item-dates-change mb20 bg-white">
               
                    <div class="row">
                                <div class="col-md-12">
                                <p class="text-center">Transaction must be completed within <b>10 Minutes</b> to avoid a timeout and possible loss of chosen seat number.</p>
                                </div>
                                    <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    <input type="hidden" name="save" value="contact">
                                    <button id="completeSeatSelection1" type="submit" name="btn2" class="btn btn-primary btn-lg">Proceed</button>
                                    <!-- <button type="submit" name="btn1" class="btn btn-primary btn-lg">
                                        <i class="icon-ok icon-white"></i> Book Now
                                    </button> -->
                                    <button type="reset" class="btn btn-warning btn-lg">
                                        <i class="icon-refresh icon-black"></i> Clear
                                    </button>
                                </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                    </div>
                    </div>
            </div>
          
        </div>

    </div>
    </form>

<div id="loader"></div>
<div class="gap"></div>

    </div> </div>
  
    <footer id="main-footer">
    <div class="hidden-xs hidden-sm">
        <div id="fbaseone" class="container">
            <div class="col-md-5 col-sm-4">
                <ul style="float:right; margin-top:1%">
                    <li> <a class="no-child" href="https://giddycruisetransportation.com">HOME</a> </li>
                    <li>
                        <a href="About.php">ABOUT US</a>
                    </li>
                    <li>  <a class="no-child" href="ticketpolicy.php">TICKET POLICY</a> </li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4">
                <p align="center"><img src="img/new-skin/chisco_logo.png" width="150px"></p>
            </div>
            <div class="col-md-5 col-sm-4">
                <ul>
                    <li> <a href="#">FAQs</a> </li>
                    <li> <a href="airporttrip.php">AIRPORT DROP OFF</a> </li>
                    <li> <a href="Charter.php">CHARTER BUS</a> </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="container pt20">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <h4>ABOUT Giddy Cruise Transport</h4>
            <p>
                As a Brand, our reputation is built on cutting-edge customer focused solutions. Our goal is to become the most prominent Transport/Integrated Logistics and Supply Chain Organization/Brand and a one stop shop for travel/tourism .

            </p>
            <p class="pimg">
                <a href="#"><img src="img/new-skin/fb.svg" width="40px"></a>
                <a href="#"><img src="img/new-skin/twitter.svg" width="40px"></a>
                <a href="#"><img src="img/new-skin/ig.svg" width="40px"></a>
            </p>
        </div>
        <div class="col-md-2 col-sm-4 hidden-xs">
            <h4>SITE LINKS</h4>
            <ul>
                <!-- <li><a href="Careers.html">Career</a></li> -->
                <li><a href="Faq.php">FAQs</a></li>
                <li><a href="Contact.php">Contact us</a></li>
                <li><a href="ticketpolicy.php">Ticket Policy</a></li>
                <li><a href="#">Terms of use</a></li>

            </ul>
        </div>
        <div class="col-md-2 col-sm-4 hidden-xs ">
            <h4>COMPANY</h4>
            <ul>
                <li><a href="#/" target="_blank">Giddy Host</a></li>

            </ul>
            <h4>ADDRESS</h4>
            <p>
            10 Cinnamon Cir, Randallstown, MD 21133, USA
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <h4>HAVE QUESTION</h4>
            <p>+14432202654 </p>
            <p>+14439855520 </p>
            <h4>EMAIL ADDRESS </h4>
            <p>gidicruiztransportation@gmail.com </p>
            <p>support@giddycruisetransportation.com</p>


            <p align="">
                <button class="btn btn-large btnfoot"> <i class="fa fa-envelope" aria-hidden="true"></i> Contact us</button>
            </p>
        </div>

        <div style="clear:both"></div>
        <hr />

        <p align="center">
            Copyright © 2022 - Giddy Cruise Transport. All rights reserved. Powered by <a class="text-color bolded" target="_blank" href="https://giddyhost.com"> Giddy Host</a>
        </p>
    </div>


</footer>




    <div id="server-message-dialog" class="modal modal-message modal-success fade in" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i id="server-message-icon" class="glyphicon glyphicon-check"></i>
            </div>
            <div class="modal-title"><h4 class="modal-title" id="server-message-title">Model Title</h4></div>
            <div class="modal-body"><div id="server-message-content" class="text-align-left wrap">Content</div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div> </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

    <script src="js/modernizr.js"></script>
    <script src="js/jquery-migrate-1.4.1.min.js"></script>
    <script src="js/slimmenu.js"></script>
    <script src="js/bootstrap-timepicker.js"></script>
    <script src="js/bootstrap-select.js"></script>

    <script src="js/dropit.js"></script>
    <script src="js/ionrangeslider.js"></script>
    <script src="js/icheck.js"></script>
    <script src="js/fotorama.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/card-payment.js"></script>
    <script src="js/magnific.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/fitvids.js"></script>
    <script src="js/tweet.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/gridrotator.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/functionsc37a.js?v=he1Iyy-M8r_d_HYU_OnRF54ub32de-URpTmXgeWzv7E"></script>

    <script src="js/custom9969.js?v=5TxqwrZcIJk2iGhWpAs2932Ym8_WYyalqRK5aSa2vE8"></script>
    <script src="js/request.helper0b0e.js?v=1Yh7gtvjFt1dVE1kr3_cRhtAiSC3EHa59eAZl7faaOM"></script>

   
     
    <script type='text/javascript'>
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
                            return true;
						}
					}
				}
				alert('Please select at least 1 ticket.');
				return false;
			}
         
   
		</script> 

    <script>
        $(document).ready(function () {
            //$('a[href^="#"]').on('click',function (e) {
            //    e.preventDefault();

            //    var target = this.hash,
            //    $target = $(target);

            //    $('html, body').stop().animate({
            //        'scrollTop': $target.offset().top
            //    }, 900, 'swing', function () {
            //        window.location.hash = target;
            //    });
            //});

            $('.input-group.date').datepicker({ format: "D M d, yyyy" });

            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            })

        });</script>

<!-- <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: 'b185fdcf-cee6-47a0-a2a4-90b304162ad7', f: true }); done = true; } }; })();</script> -->
<!-- ..loading before submit -->
<script>
	function myFunction() {
	var spinner = $('#loader');
	document.getElementById("loader").style.display = "inline"; // to undisplay
	}
	</script>

<!-- php do not refresh page after submit post -->
<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>

            <!-- GetButton.io widget life chat -->
            <script type="text/javascript">
              (function () {
                  var options = {
                      facebook: "105248471461316", // Facebook page ID
                      whatsapp: "+14432202654", // WhatsApp number
                      call_to_action: "Chat Us", // Call to action
                      button_color: "#FF6550", // Color of button
                      position: "right", // Position may be 'right' or 'left'
                      order: "facebook,whatsapp", // Order of buttons
                  };
                  var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                  s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                  var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
              })();
          </script>
          <!-- /GetButton.io widget -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

<!-- Mirrored from chiscotransport.com.ng/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 06:12:00 GMT -->
</html>