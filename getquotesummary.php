<?php require 'partials/_functions.php';
include("session_timeout.php");
 $conn = db_connect();
 session_start();



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

  $route = $_SESSION['nroute'] ;
   $rbus =$_SESSION['bus'] ;
  $rtime =  $_SESSION['ntime'];


$remail = $_SESSION['email'];
$txt ='readonly';
// $kname = strip_tags( utf8_decode( $_POST['k_name'] ) );
if(!empty($_POST['k_name'])){
    $kname = strip_tags( utf8_decode( $_POST['k_name'] ) );
    $kphone = strip_tags( utf8_decode( $_POST['k_phone'] ) );
    $txt ='readonly';
  
}else{
    $kname ='';
    $kphone = '';
    $txt ='required';
}
//    $st = $_SESSION['st'];

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
<?php include("header.php") ?>
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
        <h5 class="content-header ">
        Trip Summaries
    </h5>
<div class="row">
<div class="col-md-12">

    <div class="col-md-5 visible-sm visible-xs">
        <div class=" gap gap-bottom visible-xs"></div>
        <aside class="sidebar-left">
            <div class="sidebar-widget booking-item-dates-change bg-white text-left">
    <h5 class="content-header ">
        Depature
    </h5>
    <ul class="thumb-list thumb-list-right" id="booking-summary" data-is-return="False">
<li>
    <div class="thumb-list-item-caption">
        <p class="thumb-list-item-title bolded"><a>
        <?php 
        
            $string = $_SESSION['route'];
            $str_arr = explode (",", $string); 
            //  print_r($str_arr);

           echo  strtoupper($str_arr[0] .' '.'=&gt;'.' '. $str_arr[1]);
      
        
        ?>
        </a></p>
   
        <form name="contactForm" action="t78gjgh259bs275est2.php" method="POST" class="form-horizontal" onsubmit="myFunction()">

        <?php 
						for($i=1; $i<16; $i++)
						{
							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
                                
                                $variable = $i; 

                                $seatarr[] = $i;

                                //   $cars = array("Volvo", "BMW", "Toyota");
                                // echo count($cars);
                                // echo $cars

                                $tside = implode(",",$seatarr);

                                $_SESSION['seat'] = $tside;
                                $g = $_SESSION['seat'];
								// echo "Seat Number <input type='text' style='background-color:#fff; border:0; width:8%; padding-top:12px;' class='span3' name=ch".$i." value=".$i." readonly/><br>";
                                
                                // $seatarr = array($_SESSION['seat']);
                                // echo implode(" ",$seatarr );
							}
                          
                            
						}
                        // $tside = implode(",",$seatarr);
                        // $_SESSION['nseats']=$tside;
                        // echo $_SESSION['seat'];
                       
					?>
        <div class="thumb-list-item-caption">
   
        <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-calendar"></i> Depature Date&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['deptDate']?></a></p>
            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-clock-o"></i>&nbsp;Depature Time&nbsp;&nbsp;&nbsp; <?php echo $rtime ?></a></p>
 

            <input type="hidden" name="journey_date" id="journey_date" value="<?php echo $_SESSION['deptDate']?>">
            <input type="hidden" name="return_date" id="return_date" value="<?php echo $_SESSION['returnDate']?>">
            <p><small><i class="fa fa-car"></i> Bus / Car Selected: </small><b><?php echo $rbus ?></b>
           </p>
           <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-wheelchair"></i> Seat Number: &nbsp;&nbsp;<?php echo $_SESSION['seat']?></a></p>
           <h5 class="content-header ">
           Destination
            </h5>
            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-map-marker"></i> &nbsp;&nbsp;<?php echo strtoupper($str_arr[2] .' '.'=&gt;'.' '. $str_arr[3]);?></a></p>
            <p class="thumb-list-item-title bolded mt10"><a>&nbsp;&nbsp;&nbsp;Retun Date&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['returnDate']?></a></p>
       

            <!-- <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp; dfghvcbvc₦14,000.00 /seat</a></p>
            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp; ₦700.00 (Discount)/seat</a></p> -->
                </div>
            </div>
        </li>    
          <?php 
            
            if(isset($_SESSION['seat'])){

                $_SESSION['price'] = 0;
            
                $re_date = date('Y-m-d');
                $seatselected = $_SESSION['seat'];
                // echo 'seats :'. $seatselected."\n";
                $seat = explode(",", $seatselected);
                //   print_r($seat)."\n";
                //  echo 'count: '.count($seat)."\n";
                $NumOfSeats = count($seat);
                // echo $NumOfSeats;
                $_SESSION['numOfSeat'] = $NumOfSeats;

                $tprice = $_SESSION['price'];
                $toprice = $tprice * $NumOfSeats;

                if($_SESSION['returnDate'] >= $re_date){
                    $toprice = $toprice  * $NumOfSeats;
                    $toprice = 0;
                }

                // header("Refresh: 5;");


            }
            ?>
 

        <!-- <li>
            <div class="thumb-list-item-caption">
                <div class="thumb-list-item-caption">
                <p class="thumb-list-item-title bolded"><a>Total Per Person: <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $_SESSION['price']?></span></a></p>
                    <p class="thumb-list-item-title bolded"><a><b>Total Cost Payable: <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $toprice?>.00</span></b></a></p>
                </div>
            </div>
        </li> -->
    </ul>
</div>
                <!-- <div class="sidebar-widget booking-item-dates-change">
                    <h5 class="content-header text-center">
                        Amount Payable
                    </h5>
                    <h2 class="text-center bolded amount-payable">$<?php echo $toprice ?>.00</h2>
                </div> -->
            
            
        </aside>
    </div>

    <div class="col-md-7">
      
          
            <div class="row booking-item-dates-change mb20 bg-white">
                <h5 class="content-header"><i class="fa f fa-users rounded box-icon-border-dashed pull-left"></i> Passenger Details</h5><hr>
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
                                   <input type="hidden" name="nseat" readonly value="<?php echo  $_SESSION['seat']?>" id="">
                                   <input type="hidden" name="ncar" readonly value="<?php echo $_SESSION['bus']?>" id="">
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
                                   <input type="hidden" name="ncar" readonly value="<?php echo $_SESSION['bus']?>" id="">

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
                                <input class="form-control" style="height:50px" type="email" id="email" name="email" value="<?php echo $remail?>" required >
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
                                readonly
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
                                <input class="form-control" style="height:50px" type="text"  id="k_name" name="k_name" value="<?php echo $kname?>" <?php echo $txt;?>>
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
                                value="<?php echo $kphone;?>"
                                <?php echo $txt;?>
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
                                    <button type="submit" name="btn1" class="btn btn-primary btn-lg">
                                        <i class="icon-ok icon-white"></i> Book Now
                                    </button>
                                    <?php
                                        echo "<a href=\"javascript:history.go(-1)\" class='btn btn-warning btn-lg'>GO BACK</a>"; ?>  
                                </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                    </div>
                    </div>
            </div>
          
    </div>
    <div class="col-md-5 hidden-sm hidden-xs">
        <div class=" gap gap-bottom visible-xs"></div>
        <aside class="sidebar-right">
            <div class="sidebar-widget booking-item-dates-change bg-white text-left">
    <h5 class="content-header ">
    Depature
    </h5>
    <ul class="thumb-list thumb-list-right" id="booking-summary" data-is-return="False">
<li>
    <div class="thumb-list-item-caption">

        <p class="thumb-list-item-title bolded"><a>
        <?php 
        $string = $_SESSION['route'];
        $str_arr = explode (",", $string); 
//  print_r($str_arr);

         echo  strtoupper($str_arr[0] .' '.'=&gt;'.' '. $str_arr[1]);
      
        
        ?>
        </a></p>
        <p><small><i class="fa fa-car"></i> Bus / Car Selected: </small><b><?php echo $rbus?></b>
           </p>
        <div class="thumb-list-item-caption">
            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-calendar"></i> Depature Date&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['deptDate']?></a></p>
            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-clock-o"></i> &nbsp;&nbsp;Depature Time&nbsp;&nbsp;&nbsp; <?php echo $rtime?></a></p>

            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-wheelchair"></i> Seat Number: &nbsp;&nbsp;<?php echo $_SESSION['seat']?></a></p>
            
            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-user"></i> No Of Adult: &nbsp;&nbsp;<?php echo $_SESSION['adult'];?></a> adult/s</p>
            <br><h5 class="content-header ">
           Destination
            </h5>
            <p class="thumb-list-item-title bolded mt10"><a><i class="fa fa-map-marker"></i>&nbsp;<?php echo strtoupper($str_arr[2] .' '.'=&gt;'.' '. $str_arr[3]);?></a></p>
            <p class="thumb-list-item-title bolded mt10"><a>&nbsp;&nbsp;&nbsp;Retun Date&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['returnDate']?></a></p>
        </div>
    </div>
</li>        <li>
    <?php
    if(isset($_SESSION['seat'])){
        $re_date = date('Y-m-d');
  
        $seatselected = $_SESSION['seat'];
        // echo 'seats :'. $seatselected."\n";
        $seat = explode(",", $seatselected);
        //   print_r($seat)."\n";
        //  echo 'count: '.count($seat)."\n";
        $NumOfSeats = count($seat);
        // echo $NumOfSeats;
        $_SESSION['numOfSeat'] = $NumOfSeats;
    
        // $tprice = $_SESSION['price'];
        // $toprice = $tprice * $NumOfSeats;
    
        if($_SESSION['returnDate'] >= $re_date){
            $toprice = $toprice  * $NumOfSeats;
            $toprice = 0;
        }
        // header("Refresh: 5;");
    
    
    }
    ?>
            <div class="thumb-list-item-caption">
                <div class="thumb-list-item-caption">
                <input type="hidden" name="newprice" readonly value="<?php $_SESSION['price'] = 0; echo $_SESSION['price']?>" id="">
                <input type="hidden" name="totalprice" readonly value="<?php echo $toprice?>" id="">
                <!-- <p class="thumb-list-item-title bolded"><a>Total Per Person: <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $_SESSION['price']?></span></a></p>
                    <p class="thumb-list-item-title bolded"><a><b>Total Cost Payable: <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $toprice?>.00</span></b></a></p> -->
                </div>
            </div>
        </li>
    </ul>
</div>
                <!-- <div class="sidebar-widget booking-item-dates-change">
                    <h5 class="content-header text-center">
                        Amount Payable
                    </h5>
                    <h2 class="text-center bolded amount-payable">$<?php echo $toprice ?>.00</h2>
                </div>
             -->
            
        </aside>
    </div>
</div>
</form>

<div id="loader"></div>
<div class="gap"></div>

    </div> </div>

<?php include("footer.php") ?>