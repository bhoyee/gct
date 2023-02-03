<?php
   include('session.php');
   include("connect.php");

   include("connection.php");
require('invoicepdf.php');
   $msg ='';

if(isset($_POST['button2'])){    //trigger button click
  $date = date('Y-m-d H:i:s');
  // $prcie = mysqli_real_escape_string($conn, $_POST['price']);


$bnumb= $_POST['confNo'];
$records = mysqli_query($conn,"select * from boidata where bookingCode = '$bnumb'"); // fetch data from database
 if (mysqli_num_rows($records) > 0) {

  while($data = mysqli_fetch_array($records))
      {

        $bookingCode = $data;
        $bookCode = $bookingCode['bookingCode'];
        $msg = $bookCode;


            $getPrice = mysqli_query($conn,"select * from invoice where bookingCode = '$bnumb' ORDER BY date DESC");


            if (mysqli_num_rows($getPrice) > 0) {
              while($price = mysqli_fetch_array($getPrice))
                  {
                    $tfare =  $price;
                    // $suc = "Records added successfully.";
                    $qry2= "select * from boidata where bookingCode = '$bnumb'";
                    $result2= mysqli_query($conn,$qry2);
                    $data =mysqli_fetch_array($result2);


                    $cuDate = date('Y-m-d');


                     $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
                     $db = new dbObj();
                     $connString =  $db->getConnstring();
                    $pdf->AddPage();
                    $pdf->addSociete( "Giddy Cruise Transport",
                                      "10 Cinnamon Cir\n" .
                                      "Randallstown\n".
                                      "MD 21133\n" .
                                      "USA ");
                    $pdf->fact_dev( "Trip ", "Receipt" );
                    $pdf->temporaire( "Giddy Cruise Transport" );
                    $pdf->addDate( $cuDate);

                    $pdf->addPageNumber("1");
                    $pdf->addClientAdresse($data['fullName']."\n".$data['email'] );

                    // "Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS"
                    $pdf->addReglement("Cash/ Zelle/ CashApp/ Paypal");
                    $pdf->addEcheance($cuDate);
                    $pdf->addNumTVA($price['bookingCode']);

                    $cols=array( "REFERENCE"    => 23,
                                 "DESCRIPTION"  => 82,
                                 "DUE AMOUNT"     => 26,
                                 "DATE"      => 26,
                                 "PAID AMOUNT" => 30
                              );
                    $pdf->addCols( $cols);
                    $cols=array( "REFERENCE"    => "L",
                                 "DESCRIPTION"  => "L",
                                 "DUE AMOUNT"     => "C",
                                 "DATE"      => "R",
                                 "PAID AMOUNT" => "R");
                    $pdf->addLineFormat( $cols);
                    $pdf->addLineFormat($cols);

                    $y    = 109;
                    $line = array( "REFERENCE"=>$price['id'],
                                           "DESCRIPTION"=>"From : ".$data['pAddress']." To :  ".$data['DAddress'],
                                          "DUE AMOUNT"=> $price['price'],
                                          "DATE"=> $price['date'],
                                   "PAID AMOUNT" => $price['price']);


                    $size = $pdf->addLine( $y, $line );
                    $y   += $size + 2;



                    $tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                                        array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
                    $tab_tva = array( "1"       => 19.6,
                                      "2"       => 5.5);

                    $pdf->Output();

                 }
               }
              }
        } else {
                $msg = "No Booking Found";
        }

  }
?>
<?php mysqli_close($conn); // Close connection ?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="We provide safe, affordable,
    and convenient daily transportation. We also offer Private One on One transportation services.">
    <meta name="keywords" content="Transport, House Movers, Logistic Services, Airport Pickup and DropOff">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Giddy Cruise Transport </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">

        <style type="text/css">

      div.invoice {
      border:1px solid #ccc;
      padding:10px;
      height:740pt;
      width:570pt;
      }

      div.company-address {
        border:1px solid #ccc;
        float:left;
        width:200pt;
      }

      div.invoice-details {
        border:1px solid #ccc;
        float:right;
        width:200pt;
      }

      div.customer-address {
        border:1px solid #ccc;
        float:right;
        margin-bottom:50px;
        margin-top:100px;
        width:200pt;
      }

      div.clear-fix {
        clear:both;
        float:none;
      }

      table {
        width:100%;
      }

      th {
        text-align: left;
      }

      td {
      }

      .text-left {
        text-align:left;
      }

      .text-center {
        text-align:center;
      }

      .text-right {
        text-align:right;
      }

      </style>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> 21133 Randallstown, Maryland
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +1 4432202654
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Mon-Sat 08:00 - 23:00
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="https://wa.me/14439855520?text=I%20want%20to%20book%20for%20transport" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/giddycruisetransport/"><i class="fa fa-instagram"></i></a>
                            <a href="https://facebook.com/Giddycruise" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/giddycruise"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logo.png" alt="JSOFT">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="https://giddycruisetransportation.com/">Home</a>

                                </li>
                              <!--  <li><a href="about.html">About</a></li>
                                <li><a href="services.html">services</a></li>
                              -->
                  <!--          <li><a href="index.php">Pages</a>
                                    <ul>
                                        <li><a href="package.html">Pricing</a></li>
                                        <li><a href="driver.html">Driver</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="help-desk.html">Help Desk</a></li>
                                        <li><a href="login.html">Log In</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="https://giddycruisetransportation.com/faq.php">FAQ</a>

                                </li>
                                <li><a href="https://giddycruisetransportation.com/contact.php">Contact</a></li>
                                <li class="active"><a href="https://giddycruisetransportation.com/logout.php">LogOut</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Donwload Invoice / Receipt</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Payment Invoice / Receipt for Trip.</p>
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
                        <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>
                		<div class="login-form">
                			<h3>Download invoice</h3>
        							<form action="dloadinv.php" method="post">
                        <div class="username">
        									<input type="number" name="confNo" placeholder="Confirmation Number" required>
        								</div>
        								<!-- <div class="username">
        									<input type="text" name="price" placeholder="Price" required>
        								</div> -->

        								<div class="log-btn">
        									<button type="submit" name="button2" class="btn btn-primary"><i class="fa fa-sign-in"></i> Download  Invoice</button>
        								</div>



        							</form>

                		</div>

                	</div>
                </div>

        	</div>

        </div>
    </section>

        <!--== Footer Area Start ==-->
        <section id="footer-area">
            <!-- Footer Widget Start -->
            <div class="footer-widget-area">
                <div class="container">
                    <div class="row">
                        <!-- Single Footer Widget Start -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h2>About Us</h2>
                                <div class="widget-body">
                                    <img src="assets/img/logo.png" alt="JSOFT">
                                    <p>Giddy Cruise Transport  is the synonym of superb chauffeur service in Baltimore and outside Baltimore, and we are ready to go above and beyond to prove that to you.</p>

                                    <div class="newsletter-area">
                                        <form action="index.php">
                                            <input type="email" placeholder="Subscribe Our Newsletter">
                                            <button type="submit" class="newsletter-btn"><i class="fa fa-send"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Widget End -->

                        <!-- Single Footer Widget Start -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h2>Follow Us </h2>
                                <div class="widget-body">
                                    <ul class="recent-post">
                                        <li>
                                            <a href="https://facebook.com/Giddycruise" target="_blank">
                                               facebook
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/14439855520?text=I%20want%20to%20book%20for%20transport" target="_blank">
                                              whatsapp
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/giddycruisetransport/">
                                               Instagram
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/giddycruise">
                                                twitter
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Widget End -->

                        <!-- Single Footer Widget Start -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h2>get touch</h2>
                                <div class="widget-body">
                                    <p>Contact Giddy Cruise Transport and let us be your transportation professionals. Call us or message us for more info, or to make a reservation.</p>

                                    <ul class="get-touch">
                                        <li><i class="fa fa-map-marker"></i> 10 Cinnamon Cir, Randallstown, MD 21133, USA</li>
                                        <li><i class="fa fa-mobile"></i>+14432202654 / <i class="fa fa-whatsapp"></i>+14439855520</li>
                                          <li><i class="fa fa-envelope"></i> support@giddycruisetransportation.com</li>
                                        <li><i class="fa fa-envelope"></i> gidicruiztransportation@gmail.com</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Widget End -->
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Bottom Start -->
            <div class="footer-bottom-area">
                <div class="container">
                  <div class="row">
                      <div class="col-lg-2 text-left">
                          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                           <a href="https://premium90.web-hosting.com:2096/webmaillogin.cgi" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> Check Mail </a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                      </div>
                      <div class="col-lg-10 text-center">
                          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                           Copyright &copy;<script>document.write(new Date().getFullYear());</script> Giddy Cruise . All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i>                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                      </div>
                  </div>
                </div>
            </div>
            <!-- Footer Bottom End -->
        </section>
        <!--== Footer Area End ==-->

        <!--== Scroll Top Area Start ==-->
        <div class="scroll-top">
            <img src="assets/img/scroll-top.png" alt="JSOFT">
        </div>
        <!--== Scroll Top Area End ==-->

        <!--=======================Javascript============================-->
        <!--=== Jquery Min Js ===-->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <!--=== Jquery Migrate Min Js ===-->
        <script src="assets/js/jquery-migrate.min.js"></script>
        <!--=== Popper Min Js ===-->
        <script src="assets/js/popper.min.js"></script>
        <!--=== Bootstrap Min Js ===-->
        <script src="assets/js/bootstrap.min.js"></script>
        <!--=== Gijgo Min Js ===-->
        <script src="assets/js/plugins/gijgo.js"></script>
        <!--=== Vegas Min Js ===-->
        <script src="assets/js/plugins/vegas.min.js"></script>
        <!--=== Isotope Min Js ===-->
        <script src="assets/js/plugins/isotope.min.js"></script>
        <!--=== Owl Caousel Min Js ===-->
        <script src="assets/js/plugins/owl.carousel.min.js"></script>
        <!--=== Waypoint Min Js ===-->
        <script src="assets/js/plugins/waypoints.min.js"></script>
        <!--=== CounTotop Min Js ===-->
        <script src="assets/js/plugins/counterup.min.js"></script>
        <!--=== YtPlayer Min Js ===-->
        <script src="assets/js/plugins/mb.YTPlayer.js"></script>
        <!--=== Magnific Popup Min Js ===-->
        <script src="assets/js/plugins/magnific-popup.min.js"></script>
        <!--=== Slicknav Min Js ===-->
        <script src="assets/js/plugins/slicknav.min.js"></script>

        <!--=== Mian Js ===-->
        <script src="assets/js/main.js"></script>


        <!-- GetButton.io widget life chat -->
      <script type="text/javascript">
          (function () {
              var options = {
                  facebook: "105248471461316", // Facebook page ID
                  whatsapp: "+14439855520", // WhatsApp number
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

    </body>

    </html>
