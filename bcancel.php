<?php require 'partials/_functions.php';
 $conn = db_connect();
 session_start();
?>

<?php include("header.php") ?>


    <div class="container page-content">
   

    <div class="row">

<div class="col-md-12 newstates">
    <div id="faci">
        <h2 align="center">Booking / Reservation Cancellation</h2>
        <div class="busdetails">

            <div class="col-md-12 newstates">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#executive-coach" data-toggle="tab">Booking Number</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade  active in" id="executive-coach">

                                <div class="col-md-12 col-sm-5 col-xs-12">
                                <?php
                                if(isset($_POST["searchBook"]))
                                {
                                    $book_id = $_POST["paymentRef"];

                                    $sqls = "SELECT * FROM book WHERE bookingCode='$book_id'";
                                    $results = mysqli_query($conn, $sqls);

                                    mysqli_num_rows($results);
                                   
                                         $date = date('Y-m-d'); 
                                         $cTime = date('H:i:s');                            
                                        // if(mysqli_num_rows($result2)){
                                        if($row = mysqli_fetch_assoc($results)) {
                                            $route      = $row['route'];
                                            $seat      = $row['seat'];
                                            $deptDate  = $row['bookdate'];
                                            $deptTime   = $row['time'];
                                            $bid       = $row['bookingCode'];
                                            $status  = $row['bookstatus'];
                                            $tt     = $row['tripChar'];
                                            $airport   = $row['airport'];
                                            $location  = $row['location'];
                                            $paddress   = $row['paddress'];
                                            $daddress    = $row['daddress'];
                                            $pstatus = $row['paystatus'];


                                            if($status == 'cancel'){
                                                if($tt == 'Inter-State'){

                                                    echo '<div class="alert alert-danger" role="alert">
                                                    <strong>Alert!</strong> Reservation Already Cancelled.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>';
                                                    $str_arr = explode (",", $route); 
                                                
                                                    
                                                    echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                    <p><b>Below are your details</b> </p> 
                                                    <span><b>Trip From     :</b> '. strtoupper($str_arr[0]) .':- '.$str_arr[1].' <b>To:</b> '.' '. strtoupper($str_arr[2]).' :-'.$str_arr[3].'</span><br>
                                                    <span><b>Seat Number   :</b> '.$seat.'</span><br>
                                                    <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="text-white" style="font-size:15px; background-color:red; padding:10px"> Trip Cancel</b></span><br>
                                                    <span><b>Departure Time:</b> '.$deptTime.'</span>
                                                    <br>
                                                    <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
        
                                                    </div><br> <hr/>';

                                                } 
                                                elseif($tt == 'Airport-Chater'){

                                                    echo '<div class="alert alert-danger" role="alert">
                                                    <strong>Alert!</strong> Reservation Already Cancelled.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>';
                                                    $str_arr = explode (",", $route); 
                                                
                                                    
                                                    echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                    <p><b>Below are your details</b> </p> 
                                                    <span><b>Trip From / To Airport     :</b> '. $airport.'</span><br>
                                                    <span><b>Location   :</b> '.$location.'</span><br><br>
                                                    <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="text-dark" style="font-size:15px; background-color:red; padding:10px"> Trip Cancel</b></span><br>
                                                    <span><b>Departure Time:</b> '.$deptTime.'</span>
                                                    <br>
                                                    <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
        
                                                    </div><br> <hr/>';
                                                }
                                                elseif($tt == 'Point-Point'){
                                                    echo '<div class="alert alert-danger" role="alert">
                                                    <strong>Alert!</strong> Reservation Already Cancelled.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>';
                                                    $str_arr = explode (",", $route); 
                                                
                                                    
                                                    echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                    <p><b>Below are your details</b> </p> 
                                                    <span><b>PickOff Address  :</b> '. $paddress.'</span><br>
                                                    <span><b>DropOff Address   :</b> '.$daddress.'</span><br><br>
                                                    <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="text-dark" style="font-size:30px; background-color:red; padding:10px"> Trip Cancel</b></span><br>
                                                    <span><b>Departure Time:</b> '.$deptTime.'</span>
                                                    <br>
                                                    <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
        
                                                    </div><br> <hr/>';
                                                }
                
                           
                                            }
                                            elseif($status =='active'){

                                                if(($cTime > $deptTime) && ($date == $deptDate)) {
                                                    $tripstatus = 'Trip Exipred';
                                                    $clas = "bg-danger";
                                                    echo $cTime;
    
                                                    }else{
                                                        $tripstatus = 'Trip Active';
                                                        $clas = "bg-primary";
                                                    }
                                                    if($date > $deptDate) {
                                                        $tripstatus = 'Trip Exipred';
                                                        $clas = "bg-danger";
                                                     
                                                    }else{
                                                        $tripstatus = 'Trip Active';
                                                        $clas = "bg-primary";
    
                                                    }

                                                    if($tt == 'Inter-State'){
                                                        echo '<div class="alert alert-success" role="alert">
                                                        <strong>Alert!</strong> Reservation Available.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';
                                                        $str_arr = explode (",", $route); 
                                                    
                                                        
                                                        echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                        <p><b>Below are your details</b> </p> 
                                                        <span><b>Trip From     :</b> '. strtoupper($str_arr[0]) .':- '.$str_arr[1].' <b>To:</b> '.' '. strtoupper($str_arr[2]).' :-'.$str_arr[3].'</span><br>
                                                        <span><b>Seat Number   :</b> '.$seat.'</span><br>
                                                        <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="'.$clas.' text-dark" style="font-size:20px; padding:5px"> '.$tripstatus.'</b></span><br>
                                                        <span><b>Departure Time:</b> '.$deptTime.'</span>
                                                        <br>
                                                        <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
            
                                                        </div><br> <hr/>';
                                                    }

                                                    elseif($tt == 'Airport-Chater'){
                                                        echo '<div class="alert alert-success" role="alert">
                                                        <strong>Alert!</strong> Reservation Available.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';                                                        
                                                        echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                        <p><b>Below are your details</b> </p> 
                                                        <span><b>Trip From / To Airport     :</b> '. $airport.'</span><br>
                                                        <span><b>Location   :</b> '.$location.'</span><br><br>
                                                        <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="'.$clas.' text-dark" style="font-size:20px; padding:5px"> '.$tripstatus.'</b></span><br>
                                                        <span><b>Departure Time:</b> '.$deptTime.'</span>

                                                        <br>
                                                        <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
            
                                                        </div><br> <hr/>';
                                                    }
                                                    elseif($tt == 'Point-Point'){
                                                        echo '<div class="alert alert-success" role="alert">
                                                        <strong>Alert!</strong> Reservation Available.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';
                                                        
                                                        echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                        <p><b>Below are your details</b> </p> 
  
                                                        <span><b>PickOff Address  :</b> '. $paddress.'</span><br>
                                                        <span><b>DropOff Address   :</b> '.$daddress.'</span><br><br>
                                                        <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="'.$clas.' text-dark " style="font-size:20px; padding:5px; margin-top: 25px"> '.$tripstatus.'</b></span><br>
                                                        <span><b>Departure Time:</b> '.$deptTime.'</span>
                                                        <br>
                                                        <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
            
                                                        </div><br> <hr/>';
                                                    }

                                                   
                                              
                                                    ?>
                                                    <p align="center">
                                                    <a href="boocancel.php?id=<?php echo $bid; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger btn-lg">Cancel Booking</button></a>
                
                                                  </p>
                                                <?php
                                            }

                                            elseif($status =='expired'){

                                                if(($cTime > $deptTime) && ($date == $deptDate)) {
                                                    $tripstatus = 'Trip Exipred';
                                                    $clas = "bg-danger";
                                                    echo $cTime;
    
                                                    }else{
                                                        $tripstatus = 'Trip Active';
                                                        $clas = "bg-primary";
                                                    }
                                                    if($date > $deptDate) {
                                                        $tripstatus = 'Trip Exipred';
                                                        $clas = "bg-danger";
                                                     
                                                    }else{
                                                        $tripstatus = 'Trip Active';
                                                        $clas = "bg-primary";
    
                                                    }

                                                    if($tt == 'Inter-State'){
                                                        echo '<div class="alert alert-danger" role="alert">
                                                        <strong>Alert!</strong> Reservation Available But Expired.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';
                                                        $str_arr = explode (",", $route); 
                                                    
                                                        
                                                        echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                        <p><b>Below are your details</b> </p> 
                                                        <span><b>Trip From     :</b> '. strtoupper($str_arr[0]) .':- '.$str_arr[1].' <b>To:</b> '.' '. strtoupper($str_arr[2]).' :-'.$str_arr[3].'</span><br>
                                                        <span><b>Seat Number   :</b> '.$seat.'</span><br>
                                                        <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="'.$clas.' text-dark" style="font-size:20px; padding:5px"> '.$tripstatus.'</b></span><br>
                                                        <span><b>Departure Time:</b> '.$deptTime.'</span>
                                                        <br>
                                                        <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
            
                                                        </div><br> <hr/>';
                                                    }

                                                    elseif($tt == 'Airport-Chater'){
                                                        echo '<div class="alert alert-danger" role="alert">
                                                        <strong>Alert!</strong> Reservation Available But Expired.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';                                                        
                                                        echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                        <p><b>Below are your details</b> </p> 
                                                        <span><b>Trip From / To Airport     :</b> '. $airport.'</span><br>
                                                        <span><b>Location   :</b> '.$location.'</span><br><br>
                                                        <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="'.$clas.' text-dark" style="font-size:20px; padding:5px"> '.$tripstatus.'</b></span><br>
                                                        <span><b>Departure Time:</b> '.$deptTime.'</span>

                                                        <br>
                                                        <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
            
                                                        </div><br> <hr/>';
                                                    }
                                                    elseif($tt == 'Point-Point'){
                                                        echo '<div class="alert alert-danger" role="alert">
                                                        <strong>Alert!</strong> Reservation Available But Expired.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';
                                                        
                                                        echo '<div class="fs-2 p-5" style="background-color:#F0FFF0 ">
                                                        <p><b>Below are your details</b> </p> 
  
                                                        <span><b>PickOff Address  :</b> '. $paddress.'</span><br>
                                                        <span><b>DropOff Address   :</b> '.$daddress.'</span><br><br>
                                                        <span><b>Departure Date:</b> '.$deptDate.'</span> <span><b class="'.$clas.' text-dark " style="font-size:20px; padding:5px; margin-top: 25px"> '.$tripstatus.'</b></span><br>
                                                        <span><b>Departure Time:</b> '.$deptTime.'</span>
                                                        <br>
                                                        <span><b>Payment Status:</b>  <strong><h3 style="display:inline">'.$pstatus.'</h3></strong></span>
            
                                                        </div><br> <hr/>';
                                                    }

                                                   
                                              
                                                    ?>
                                                    <p align="center">
                                                    <a href="boocancel.php?id=<?php echo $bid; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-danger btn-lg">Cancel Booking</button></a>
                
                                                  </p>
                                                <?php
                                            }
                                        
                                        
                                        }
                                        else{

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> Reservation Unavailable.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';

                                        } 
                                        
                                  
                                }
                               
                               
                                ?>
                                
                                </div>
                        
                                <div class="col-xs-12">
                                <form method="post" action="#" onsubmit="myFunction()">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="paymentRef">Your Booking Reference Code</label>
                                        <input class="typeahead form-control larger-input text-uppercase" placeholder="Enter your reference code here" type="text" name="paymentRef" />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-large btn-danger sbb" id="searchBook" name="searchBook">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            Search
                                        </button>
                                    


                                    </div>
                                </div>
                            

                                </form>
                                <div id="loader"></div>

                                </div>
                            </div>

                         
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


    </div>

<?php include("footer.php") ?>