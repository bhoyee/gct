<?php require 'partials/_functions.php';
include("session_timeout.php");
 $conn = db_connect();
 session_start();

 $current_date = date('Y-m-d');

 if($current_date){
    //update route table 
    mysqli_query($conn, "DELETE FROM routes WHERE route_dep_date < '$current_date'");
}


      //update booking
      $sqlx = "SELECT * from book";
      $resultx = mysqli_query($conn, $sqlx);
      $testx = mysqli_num_rows($resultx);
     
      if($testx > 0){
     
         $rowx = mysqli_fetch_array($resultx);
         $sta = $rowx['bookdate'];
    
            
             mysqli_query($conn, "UPDATE book SET bookstatus = 'expired' WHERE bookdate < '$current_date'");

             mysqli_query($conn, "UPDATE seats SET status = 'expired' WHERE date < '$current_date'");
             // $query1 = "DELETE FROM seats WHERE date < '$current_date'";
             // mysqli_query($conn,$query1) or die ( mysqli_error());
     
         
     
      }
 
 
 


?>
<?php include("header.php") ?>

    <div class="page-content">
        <div id="banner">
        <img src="img/new-skin/banner11.jpg" width="100%">
            <div class="container">
                <div class="bContent">
                    <h1>Book, Pay, Travel</h1>
                    <h4>Your comfort, our priority</h4>
                    <img src="img/new-skin/bannericon.svg" width="150px;">

                </div>
            </div>
        </div>

<div class="container">
    <div id="booking-box">

        <div class="col-md-8 col-sm-12 col-x-12">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#book-ticket-one-way" data-toggle="tab"><i class="fa fa-ticket"></i> <span>BOOK A SEAT</span></a></li>
                                <li><a href="BookingReference.php" title='Booking Status'><i class="fa fa-book"></i> <span>Book Status</span></a></li>
                                <li> <a href="airporttrip.php" title='Airport Transportation'><i class="fa fa-plane"></i> <span>Airport Transportation</span></a></li>
                                <li> <a href="Charter.php" title='Point to Point'><i class="fa fa-car"></i> <span>Point to Point</span></a></li>

                            </ul>
                        </div>
                    <!-- getting all routes in database and store in JSON-->
                    <?php
                        $routeSql = "Select * from routes";
                        $resultRouteSql = mysqli_query($conn, $routeSql);
                        $arr = array();
                        while($row = mysqli_fetch_assoc($resultRouteSql))
                            $arr[] = $row;
                        $routeJson = json_encode($arr);
                        
                    ?>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="book-ticket-one-way" style="padding:2% 0%">

                                <div style="margin-bottom: 2%" class="btn-group">
                                    <a data-toggle="tab" class="btn btn-default active" id="one-way-button">One Way</a>
                                    <a href="roundtrip.php" title='Round Trip Booking' class="btn btn-default" id="round-trip-button">Round Trip</a>
                                </div>
                                <?php
                                    if(isset($_POST["search"]))
                                    {
                                        
                                        $current_date = date('Y-m-d');
                                        $tripFrom = trim($_POST["dfrom"]);
                                        $tripTo   = trim($_POST["dto"]);
                                        $Date = date_create($_POST["DapartureDate"]);
                                        $tripDate = date_format($Date,"Y-m-d");
                                        $adult = trim((int)$_POST["adult"]);

                                         $nextday= date('Y-m-d', strtotime($tripDate. ' + 365 days'));
                                         
              
                                            //check trip date

                                        if($tripDate < $current_date){

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> You can only book for current and future date.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>'; 
                                        }
                                        elseif($tripFrom === $tripTo){

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> Your departure and destination are same . Please change the date. Thank you !!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>'; 

                                        }
                                        elseif($adult < 1){

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> Minimun of 1 Adult per booking.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';

                                        }

                                        elseif($adult > 15){

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> Only maximum of 15 Adults per booking.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';

                                        }
                                        else{
                                        
                                        $sql = "SELECT * FROM routes WHERE route_cities='$tripFrom,$tripTo'";

                                        // $sql = "SELECT * FROM routes WHERE route_cities='$tripFrom,$tripTo' AND route_dep_date='$tripDate'";
                                        $result = mysqli_query($conn, $sql);

                                        $sql2 = "SELECT * FROM routes WHERE route_cities='$tripFrom,$tripTo' AND route_status = 1 AND route_dep_date ='$tripDate' ";

                                        // $sql2 = "SELECT * FROM routes WHERE route_cities='$tripFrom,$tripTo' AND route_dep_date='$tripDate' AND route_status = 1";
                                        $result2 = mysqli_query($conn, $sql2);

                                        // sql to Find next Available trip
                                        $sql3 = "SELECT route_dep_date FROM routes WHERE route_cities='$tripFrom,$tripTo' AND route_status = 1 AND route_dep_date BETWEEN '$tripDate' AND '$nextday' ORDER BY route_dep_date DESC";
                                        $result3 = mysqli_query($conn, $sql3);
                                        $ndate = '';
                                        if(mysqli_num_rows($result3) >= 1)
                                            {
                                                
                                                while($row = mysqli_fetch_array($result3))
                                                {
                                                    $ndates = $row['route_dep_date'];
                                                    $ndate = date('F j, Y', strtotime($ndates));
                                             
                                                }
                                            
                                            }else{
                                                $ndate ='';
                                                
                                            }
                                        

                                
                                        if(mysqli_num_rows($result))
                                        {
                                                                                       
                                            if(mysqli_num_rows($result2)){
                                                
                                                $row = mysqli_fetch_assoc($result2);
                                               
                                                $_SESSION['route']      = $row['route_cities'];
                                                $_SESSION['deptDate']   = $tripDate;
                                                $deptTime               = $row['route_dep_time'];
                                                // $deptTime2               = $row['route_dep_time'];
                                                $_SESSION['adult'] = $adult;   
                                                // $_SESSION['price'] =  $row['price'];
                                                
                                                $_SESSION['deptTime']  = date("g:i a", strtotime("$deptTime"));
                                                $_SESSION['routeID'] = $row['id'];
                                                $_SESSION['bustrip'] = $row['bus'];

                                               

                                                                                             
                                                // echo $_SESSION['route'].' '.$_SESSION['deptDate'].' '.$_SESSION['deptTime'];
                                                
                                                $script = "<script>
                                                window.location = 'booking.php';</script>";
                                                echo $script;
                                                exit();

                                            }elseif(empty($ndate) or !isset($ndate)){

                                                echo '<div class="alert alert-danger " role="alert">
                                                <strong>Alert!</strong> Trip Unavailable on seleted date and future date for now .</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>';

                                            }else{
                                                echo '<div class="alert alert-danger " role="alert">
                                                <strong>Alert!</strong> Trip Unavailable on seleted date .<span style=color:green><strong> Our Next available trip is on ('. $ndate.')</strong></span>.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>';

                                            }
                                        }
                                        else{
                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> Trip on this route Unavailable presently.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                        }
                                    }}
                                
                                ?>
                               
                                <form asp-cont action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="myFunction()">

                                    <div class="row">

                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <div class="form-group">
                                                <label for="DepartureTerminalId">Traveling From</label>
                                     
                                                <select id="Dept" class="form-control selectpicker show-tick" name="dfrom" title="Select a departure terminal" data-live-search="true">
                                                <option value="">-- Select Location --</option>
                                                    <?php
                                                $sqlii = "SELECT name, terminal FROM city";
                                                    $resulti = mysqli_query($conn, $sqlii);
                                                    while ($rowi = mysqli_fetch_array($resulti)) {
                                                    $name = $rowi['name'];
                                                    $terminal = $rowi['terminal']; 
                                                    echo '<option value="'.$name.','.$terminal.'">'.$name.'</option>';
                                        
                                                    }
                                                    
                                                    echo '</select>';
                                                    
                                                    ?>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <div class="form-group">
                                                <label for="RouteId">Traveling to</label>
                                   
                                                <select class="form-control selectpicker show-tick" name="dto" title="Select a destination terminal" data-live-search="true" data-val="true" data-val-required="Specify destination terminal" >
                                                <option value="">-- Select Location --</option>
                                                    <?php
                                                $sqlii = "SELECT name, terminal FROM city";
                                                    $resulti = mysqli_query($conn, $sqlii);
                                                    while ($rowi = mysqli_fetch_array($resulti)) {
                                                    $name = $rowi['name'];
                                                    $terminal = $rowi['terminal']; 
                                                    echo '<option value="'.$name.','.$terminal.'">'.$name.'</option>';
                                        
                                                    }
                                                    
                                                    echo '</select>';
                                                    
                                                    ?>
                                            </div>
                                            <!-- <span class="text-color field-validation-valid" data-valmsg-for="RouteId" data-valmsg-replace="true"></span> -->

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <label for="DapartureDate">When are you traveling?</label>
                                            <!-- <div class="input-group date" data-date-format="D M d, yyyy"> -->
                                            <input class="form-control" type="date" id="DapartureDate" name="DapartureDate" value="" require />

                                                <!-- <input class="form-control date-pick" type="text" data-date-format="D M d, yyyy" readonly data-val="true" data-val-required="Specify departure date" id="DapartureDate" name="DapartureDate" value="" /> -->
                                                <!-- <div class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </div> -->
                                            <!-- </div> -->
                                            <!-- <span class="text-color field-validation-valid" data-valmsg-for="DapartureDate" data-valmsg-replace="true"></span> -->

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12" id="return-date-div" style="display:none">

                                            <label for="ReturnDate">When do you plan to return?</label>
                                            <input class="form-control" type="date" id="ReturnDate" name="ReturnDate" value="" require />

                                            <!-- <div class="input-group date" data-date-format="D M d, yyyy">
                                                <input class="form-control date-pick" value="" type="text" data-date-format="D M d, yyyy" readonly id="ReturnDate" name="ReturnDate" />
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <span class="text-color field-validation-valid" data-valmsg-for="ReturnDate" data-valmsg-replace="true"></span> -->

                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 ">

                                            <label for="AgentMode">Adults</label>
                                            <input class="form-control" type="text" id="Adult" name="adult" value="" placeholder="Number of Adults" required/>

                                        </div>
                                    </div>
                                    <div class="row mt15">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <button class="btn btn-danger sbb" id="search" name="search">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="loader"></div>

                            </div>

                            <!-- MANAGE TICKET -->

                            <!-- <div class="tab-pane fade" id="manage-ticket">

                          

                                

                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 hidden-sm hidden-xs">



            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                <div class="item active">
                        <p align="center">
                            <img src="img/minibaner.jpg" width="100%" style="margin-top: 25%">
                        </p>
                    </div>
                    <div class="item">
                        <p align="center">
                            <img src="img/minibaner2.jpg" width="100%" style="margin-top: 25%">
                        </p>
                    </div>
                    <div class="item">
                        <p align="center">
                            <img src="img/minibaner1.jpg" width="100%" style="margin-top: 25%">
                        </p>
                    </div>
                    <div class="item">
                        <p align="center">
                            <img src="img/hanger-now-u-can-book.png" width="100%" style="margin-top: 25%">
                            <img src="img/hanger-up-to-15-percent-discount.png" width="100%" style="margin-top: 25%">
                        </p>
                    </div>
                </div>


            </div>


            <!-- <p align="center">
                <img src="~/img/new-skin/bus1.png" style="margin-top: 25%">
            </p> -->
        </div>

    </div>

    

   





    


    <img src="img/new-skin/banner10.jpeg" width="100%" style="margin-top: 5%">


    <div class="row">

        <div class="col-md-12 newstates">
            <div id="faci">
                <h2 align="center">Facilities Available On Our Buses</h2>
                <div class="busdetails">

                    <div class="col-md-12 newstates">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <!-- <li class="active"><a href="#executive-coach" data-toggle="tab">Executive</a></li> -->
                                    <li class="active"><a href="#smart-coach" data-toggle="tab">Smart</a></li>
                                    <li class=""><a href="#blazer-coach" data-toggle="tab">Blazer</a></li>
                                    <!-- <li class=""><a href="#sedan-coach" data-toggle="tab">Sedan</a></li> -->

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <!-- <div class="tab-pane fade  active in" id="executive-coach"> -->

                                        <!-- <div class="col-md-5 col-sm-5 col-xs-12">
                                            <p align="center">
                                                <img src="img/new-skin/bus2.png" width="100%" style="margin-top: 25%">
                                            </p>
                                        </div> -->
                                        <!-- <div class="col-md-7 col-sm-7 col-xs-12"> -->
                                            <!-- <h3>Chisco Executive Coach</h3>
                                            <p style="color: #D5411E">Luxury Buses</p>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Air Conditioner"><img src="img/new-skin/ac.svg" width="100%"></i>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Toilet"><img src="img/new-skin/toilet.svg" width="100%"></i>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Extra Leg Room"><img src="img/new-skin/legspace.svg" width="100%"></i>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Media"><img src="img/new-skin/media.svg" width="100%"></i>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Media"><img src="img/new-skin/media.svg" width="100%"></i>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Power"><img src="img/new-skin/charger.svg" width="100%"></i>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Excess Luggage"><img src="img/new-skin/bag.svg" width="100%"></i>
                                            </div> -->

                                            <!-- <div class="col-xs-12 mt10">
                                                <p><b>Seat Capacity :</b> <br class="hidden-lg hidden-md hidden-sm" /> <span class="num4"> 49 - 63 persons </span></p>
                                            </div> -->

                                        <!-- </div> -->
                                        <!-- <div class="col-xs-12">
                                            <p>
                                                A combination of Comfort, Safety and Timeliness delivered in class and style.
                                                It is our frontline bus services, fully air-conditioned with executive recline-able seats,
                                                adequate leg room, toilet, onboard refreshments etc.
                                            </p>
                                        </div> -->
                                    <!-- </div> -->

                                    <div class="tab-pane fade active in" id="smart-coach">

                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <p align="center">
                                                <img src="img/new-skin/bus3.png" width="100%" style="margin-top: 25%">
                                            </p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h3>Ford Mover </h3>
                                            <p style="color: #D5411E">Luxury Mini Buses </p>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Air Conditioner"><img src="img/new-skin/ac.svg" width="100%"></i>
                                            </div>
                                            <!-- <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Toilet"><img src="img/new-skin/toilet.svg" width="100%"></i>
                                            </div> -->
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Extra Leg Room"><img src="img/new-skin/legspace.svg" width="100%"></i>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Media"><img src="img/new-skin/media.svg" width="100%"></i>
                                            </div>

                                            <div class="col-xs-12 mt10">
                                                <p class="mt5"><b>Seat Capacity :</b> <br class="hidden-lg hidden-md hidden-sm" /> <span class="num4"> 15 Seat Capacity </span></p>
                                            </div>



                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                             This specialized bus service starts your trip in one city and ends your trip in another city- getting you there safely and efficiently. You won't forget your great experience and friendly service on one of our luxury mini buses.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="blazer-coach">

                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <p align="center">
                                                <img src="img/new-skin/bus1.png" width="100%" style="margin-top: 25%">
                                            </p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h3>GCT Blazer</h3>
                                            <p style="color: #D5411E">Mini Luxury Buses </p>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Air Conditioner"><img src="img/new-skin/ac.svg" width="100%"></i>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Media"><img src="img/new-skin/media.svg" width="100%"></i>
                                            </div>
                                            <div class="col-xs-12 mt10">
                                                <p class="mt5"><b>Seat Capacity :</b> <br class="hidden-lg hidden-md hidden-sm" /> <span class="num4"> 6 Seat Capacity </span></p>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                                GCT Blazer is our bus service
                                                experience, delivered in a smart and
                                                classy mini bus design; fully
                                                air-conditioned with very comfortable
                                                seats and poised to take you wherever you need to go faster and with peace of mind.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="sedan-coach">

                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <p align="center">
                                            <img src="img/new-skin/car3.jpeg" width="100%" style="margin-top: 25%">
                                        </p>
                                    </div>

                                    <!-- <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h3>GCT Sedan</h3>
                                            <p style="color: #D5411E">Mini Luxury Car </p>
                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Air Conditioner"><img src="img/new-skin/ac.svg" width="100%"></i>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-6 mb10 mt10">
                                                <i data-toggle="tooltip" data-placement="top" title="" data-original-title="Media"><img src="img/new-skin/media.svg" width="100%"></i>
                                            </div>
                                            <div class="col-xs-12 mt10">
                                                <p class="mt5"><b>Seat Capacity :</b> <br class="hidden-lg hidden-md hidden-sm" /> <span class="num4"> 3 Seat Capacity </span></p>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                                GCT Sedan is our luxury car service
                                                experience, delivered in a smart and
                                                classy mini car design; fully
                                                air-conditioned with very comfortable
                                                seats and poised to take you wherever you need to go faster and with peace of mind.
                                            </p>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 align="center">We Listen</h2>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 mb5">
                    <a href="Contact.php">
                        <img src="img/new-skin/talktous.svg" width="100%">
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 mb5">
                    <a href="trip.php">
                        <img src="img/new-skin/trip.png" width="100%">
                    </a>

                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 mb5">
                    <a href="faq.php">
                        <img src="img/new-skin/question.svg" width="100%">
                    </a>

                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 mb5">
                    <a href="terminal.php">
                        <img src="img/new-skin/terminal.svg" width="100%">
                    </a>

                </div>
               

            </div>
        </div>
    </div>

</div>


    <div style="clear: both"></div>
</div>
<div id="explore">

    <div class="container">

        <h3 align="center">Explore Inter State Trip With Giddy Cruise</h3>
        <div class="col-md-4 col-sm-4 col-xs-6">
        <span>Baltimore to New York</span>
            <p align="center">
                
                <a href="#">
                    <img src="img/new-skin/Baltimore.png" width="100%" />
                </a>
              
                <button class="btn btn-danger" style="margin-top:10px">Book Now</button>
            </p>

        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 mt-5 mb-5">
        <span>Baltimore to Washington</span>
            <p align="center">
                <a href="#">
                    <img src="img/new-skin/washington.png" width="100%" />
                </a>
              
                <button class="btn btn-danger" style="margin-top:10px">Book Now</button>
            </p>

        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 mt-5 mb-5">
        <span>Baltimore to Delaware</span>
            <p align="center">
                <a href="#">
                    <img src="img/new-skin/Delaware.png" width="100%" />
                </a>
              
                <button class="btn btn-danger" style="margin-top:10px">Book Now</button>
            </p>
        </div>


        <div class="col-md-4 col-sm-4 col-xs-6">
        <span>Baltimore to Phil</span>
            <p align="center">
                <a href="#">
                    <img src="img/new-skin/philadelphia.png" width="100%" />
                </a>
        
                <button class="btn btn-danger" style="margin-top:10px">Book Now</button>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 mt-5">
        <span>Baltimore to Ocean City</span>
            <p align="center">
                <a href="#">
                    <img src="img/new-skin/ocean-city.png" width="100%" />
                </a>
        
                <button class="btn btn-danger" style="margin-top:10px">Book Now</button>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
        <span>Baltimore to Virginia</span>
            <p align="center">
                <a href="#">
                    <img src="img/new-skin/virginia.png" width="100%" />
                </a>
        
                <button class="btn btn-danger" style="margin-top:10px">Book Now</button>
            </p>
        </div>


    </div>


</div>

    
<?php include("footer.php") ?>