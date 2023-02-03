<?php require 'partials/_functions.php';
 session_start();
 include("header.php") ;
include("session_timeout.php");
 $conn = db_connect();

 if(!isset($_SESSION['email'])) {

    $script = "<script>
    window.location = 'index.php';</script>";
    echo $script;
    exit();
 }
?>
  <div class="container page-content">
    <h4 class="page-title pt30">Update Your GCT Booking</h4>
     <div>
<?php
 //getting id from url
$bid = $_GET['id'];

 $cuEmail = $_SESSION['email'];

 $records = mysqli_query($conn,"select boidata.fullName AS fname, boidata.gender AS gender, boidata.phone AS phone, book.bookingCode AS bCode, book.tripChar AS tChar, book.route AS route, 
 book.bookdate AS depDate, book.time AS time, book.bookstatus AS bstatus, book.seat AS seat, book.returnD AS rDate, book.returnD AS returnD, book.email AS email, book.airport AS airport,book.triptype AS ttipe,book.location AS location, 
 book.paddress AS pAddress, book.paystatus AS pstatus, book.daddress AS dAddress, book.nAdlut AS nAldult,book.nChild AS nChild, book.regDate AS regDate from book INNER JOIN boidata ON book.userid=boidata.userid
  WHERE book.email = '$cuEmail' AND book.bookingCode ='$bid'"); 

  if (mysqli_num_rows($records) > 0) {
    while($data = mysqli_fetch_array($records))
      {
          $bstatus = $data['bstatus'];
          if($bstatus == 'expired' || $bstatus == 'cancel'){
            echo '<script> alert("You cant modify expired or cancelled booking !"); </script>';
            $script = "<script>
            window.location = 'mbook.php';</script>";
            echo $script;

          }
          $tt = $data['tChar'];
          if($tt == 'Inter-State'){ ?>

<div class="row">
    <div class="col-md-8 col-sm-8">
        <h5 class="content-header">Update your Inter-State booking !</h5>
        <p style="color:red"><b>Note: Use the below form to modify your booking if need be contact support for assistance.</b></p>

        <?php

            if(isset($_POST['psend'])){
                $tripFrom = trim($_POST["dfrom"]);
                $tripTo   = trim($_POST["dto"]);
                $tdate  = trim($_POST["tdate"]);
                $ttime  = trim($_POST["ttime"]); 
                $hroute = trim($_POST["htripe"]); 
                // $htime = trim($_POST["htime"]); 
                // $hdate = trim($_POST["hdate"]); 

                $route = "$tripFrom,$tripTo";

                if($tripFrom == "" || $tripTo == ""){
                    $route = $hroute;
                }
               
                // $Date = date_create($_POST["DapartureDate"]);
                // $tripDate = date_format($Date,"Y-m-d");
                // $adult = trim((int)$_POST["adult"]);

                $result = mysqli_query($conn, "UPDATE book SET route='$route', bookdate='$tdate', time='$ttime' WHERE bookingCode='$bid'");

                if($result){
                    echo '<div class="alert alert-success" role="alert">
                    <strong>Alert!</strong> Booking Updated Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }

            }

        ?>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Booking Number</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;" id="bcode" name="bcode" value="<?php echo $data['bCode']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Trip Type</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;"  id="ttype" name="ttype" value="<?php echo $data['tChar']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Full Name</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;" id="fname" name="fname" value="<?php echo $data['fname']; ?>" readonly />
                    </div>
                </div>
           
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label for="Email">Email</label>
                        <input class="form-control" style="background-color:#E5E7E9; color:#17202A;" type="Email" id="email" name="email" value="<?php echo $data['email']; ?>" readonly />
                    </div>
                </div>
                <input type="hidden" id="htripe" name="htripe" value="<?php echo $data['route']; ?>" readonly />
                <input type="hidden" id="hdate" name="hdate" value="<?php echo $data['depDate']; ?>" readonly />
                <input type="hidden" id="htime" name="htime" value="<?php echo $data['time']; ?>" readonly />

                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Traveling From:</label>
                        <select id="Dept" class="form-control" name="dfrom" title="Select a departure terminal">
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
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Traveling to</label>
                        <select class="form-control" name="dto" title="Select a destination terminal">
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
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Travel Date <span style="color:green"> <b>(<?php echo $data['depDate']; ?>)</b></span></label>
                        <input class="form-control" type="date" id="tdate" name="tdate" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Travel Time <span style="color:green"> <b>(<?php echo $data['time']; ?>)</b></span></label>
                        <input class="form-control" type="time" id="ttime" name="ttime" required>
                    </div>
                </div>
            
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg ml-5" name="psend" id="psend">
                                            <i class="icon-ok icon-white"></i> Update Now
                                        </button>
                                        <?php
                                        echo "<a href=\"javascript:history.go(-1)\" class='btn btn-warning btn-lg'>GO BACK</a>"; ?>
                                  
                                    </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                </div>
                            </div>
        </form>
        <div id="loader"></div>
        </div>

    </div>
</div>



<?php


          }
        // point-point
          elseif($tt == 'Point-Point'){ ?>

     <div class="row">
        <div class="col-md-8 col-sm-8">
        <h5 class="content-header">Update your Point-Point booking !</h5>
        <p style="color:red"><b>Note: Use the below form to modify your booking if need be contact support for assistance.</b></p>

        <?php

            if(isset($_POST['psend1'])){
                
                $ntti = trim($_POST["ttype"]); 
                $htti = trim($_POST["htti"]); 
                $paddress = trim($_POST["paddress"]);
                $daddress = trim($_POST["daddress"]);
                $rdate = trim($_POST["tdate"]);
                $rtime = trim($_POST["ttime"]);
                $nnadult = trim($_POST["nadult"]);
                $nnchild = trim($_POST["nchild"]);

                if($htti == ""){
                    $ntti = $htti;
                }
               
                // $Date = date_create($_POST["DapartureDate"]);
                // $tripDate = date_format($Date,"Y-m-d");
                // $adult = trim((int)$_POST["adult"]);

                $result = mysqli_query($conn, "UPDATE book SET triptype='$ntti', paddress='$paddress', daddress='$daddress', time='$rtime', bookdate='$rdate', nAdlut='$nnadult', nChild='$nnchild' WHERE bookingCode='$bid'");

                if($result){
                    echo '<div class="alert alert-success" role="alert">
                    <strong>Alert!</strong> Booking Updated Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

                echo "<meta http-equiv='refresh' content='0'>";// auto refresh the page

                }

            }

        ?>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Booking Number</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;" id="bcode" name="bcode" value="<?php echo $data['bCode']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Trip Category</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;"  id="ttype" name="ttype" value="<?php echo $data['tChar']; ?>" readonly />
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Full Name</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;" id="fname" name="fname" value="<?php echo $data['fname']; ?>" readonly />
                    </div>
                </div>
           
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label for="Email">Email</label>
                        <input class="form-control" style="background-color:#E5E7E9; color:#17202A;" type="Email" id="email" name="email" value="<?php echo $data['email']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Phone Number</label>
                        <input class="form-control" type="number" style="background-color:#E5E7E9; color:#17202A;" id="phone" name="phone" value="<?php echo $data['phone']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Trip Type <span style="color:green"> <b>(<?php echo $data['ttipe']; ?>)</b></span></label>
                        <select class="form-control selectpicker show-tick" title="Select Tripe Type" name="ttype" id="ttype" >
                             <option value="">Select Tripe Type</option>
                              <option value="single-tripe">Single Trip</option>
                               <option value="round-trip">Round Trip</option>
                        </select>
                    </div>
                </div>
           
               <input type="hidden" id="htti" name="htti" value="<?php echo $data['ttipe']; ?>" readonly />

                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Pick Up Address</label>

                        <textarea class="form-control" rows="3" id="paddress" name="paddress" required>
                        <?php echo $data['pAddress']; ?>
                         </textarea>                   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Drop Off Address</label>
                        <textarea class="form-control" rows="3" id="daddress" name="daddress" required>
                        <?php echo $data['dAddress']; ?>
                        </textarea>                   
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Travel Date <span style="color:green"> <b>(<?php echo $data['depDate']; ?>)</b></span></label>
                        <input class="form-control" type="date" id="tdate" name="tdate" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Travel Time <span style="color:green"> <b>(<?php echo $data['time']; ?>)</b></span></label>
                        <input class="form-control" type="time" id="ttime" name="ttime" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Number Of Adult</label>
                        <input class="form-control" type="number" value="<?php echo $data['nAldult']; ?>" id="nadult" name="nadult" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Number Of Children</label>
                        <input class="form-control" type="number" value="<?php echo $data['nChild']; ?>" id="nchild" name="nchild" required>
                    </div>
                </div>
            
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg ml-5" name="psend1" id="psend">
                                            <i class="icon-ok icon-white"></i> Update Now
                                        </button>
                                        <?php
                                        echo "<a href=\"javascript:history.go(-1)\" class='btn btn-warning btn-lg'>GO BACK</a>"; ?>
                                    </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                </div>
                            </div>
        </form>
        <div id="loader"></div>
        </div>

    </div>
</div>
<?php
          }
        //   Airport-Chater
          elseif($tt == 'Airport-Chater'){ ?>

<div class="row">
        <div class="col-md-8 col-sm-8">
        <h5 class="content-header">Update your Airport-Chater booking !</h5>
        <p style="color:red"><b>Note: Use the below form to modify your booking if need be contact support for assistance.</b></p>

        <?php

            if(isset($_POST['psend2'])){
                
                $ntti = trim($_POST["ttype"]); 
                $htti = trim($_POST["htti"]); 
                $location = trim($_POST["location"]);
                $airport = trim($_POST["airport"]);
                $rdate = trim($_POST["tdate"]);
                $rtime = trim($_POST["ttime"]);
                $nnadult = trim($_POST["nadult"]);
                $nnchild = trim($_POST["nchild"]);

                if($htti == ""){
                    $ntti = $htti;
                }
               
                // $Date = date_create($_POST["DapartureDate"]);
                // $tripDate = date_format($Date,"Y-m-d");
                // $adult = trim((int)$_POST["adult"]);

                $result = mysqli_query($conn, "UPDATE book SET triptype='$ntti', airport='$airport', location='$location', time='$rtime', bookdate='$rdate', nAdlut='$nnadult', nChild='$nnchild' WHERE bookingCode='$bid'");

                if($result){
                    echo '<div class="alert alert-success" role="alert">
                    <strong>Alert!</strong> Booking Updated Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

                echo "<meta http-equiv='refresh' content='0'>";// auto refresh the page

                }

            }

        ?>
        <div class="col-md-12 item-features">
            <form method="post" action="#" onsubmit="myFunction()">
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Booking Number</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;" id="bcode" name="bcode" value="<?php echo $data['bCode']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Trip Category</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;"  id="ttype" name="ttype" value="<?php echo $data['tChar']; ?>" readonly />
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Full Name</label>
                        <input class="form-control" type="text" style="background-color:#E5E7E9; color:#17202A;" id="fname" name="fname" value="<?php echo $data['fname']; ?>" readonly />
                    </div>
                </div>
           
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label for="Email">Email</label>
                        <input class="form-control" style="background-color:#E5E7E9; color:#17202A;" type="Email" id="email" name="email" value="<?php echo $data['email']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Phone Number</label>
                        <input class="form-control" type="number" style="background-color:#E5E7E9; color:#17202A;" id="phone" name="phone" value="<?php echo $data['phone']; ?>" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-phone input-icon input-icon-show"></i>
                        <label for="Phone">Trip Type <span style="color:green"> <b>(<?php echo $data['ttipe']; ?>)</b></span></label>
                        <select class="form-control selectpicker show-tick" title="Select a destination terminal" id="ttype" name="ttype"> 
                              <option value="">Select Tripe Type</option>
                               <option value="Drop Off To Airport">Drop Off To Airport</option>
                                 <option value="Pick Of To Airport">Pick UP From Airport</option>
                                                    
                         </select>
                    </div>
                </div>
           
               <input type="hidden" id="htti" name="htti" value="<?php echo $data['ttipe']; ?>" readonly />

                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Select Airport  <span style="color:green"> <b>(<?php echo $data['airport']; ?>)</b></span></label>
                        <select class="form-control selectpicker show-tick" title="Select a destination terminal" id="airport" name="airport">
                                                    <option value="">Select Airport</option>
                                                    <option value="BWI Airport">BWI Airport</option>
                                                    <option value="Dulless Airport">Dulles’s Airport</option>
                                                    <option value="Reagan Airport">Reagan Airport</option>
                                                </select>                
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="FirstName">Location (Address)</label>
                        <textarea class="form-control" rows="3" id="location" name="location" required>
                        <?php echo $data['location']; ?>
                        </textarea>                   
                    </div>
                </div>
             
               
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Travel Date <span style="color:green"> <b>(<?php echo $data['depDate']; ?>)</b></span></label>
                        <input class="form-control" type="date" id="tdate" name="tdate" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Travel Time <span style="color:green"> <b>(<?php echo $data['time']; ?>)</b></span></label>
                        <input class="form-control" type="time" id="ttime" name="ttime" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Number Of Adult</label>
                        <input class="form-control" type="number" value="<?php echo $data['nAldult']; ?>" id="nadult" name="nadult" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left">
                        <i class="fa fa-user input-icon input-icon-show"></i>
                        <label for="Subject">Number Of Children</label>
                        <input class="form-control" type="number" value="<?php echo $data['nChild']; ?>" id="nchild" name="nchild" required>
                    </div>
                </div>
            
                <div class="col-md-6">
                </div>
                            <div class="col-md-6 ">
                               <div class="col-md-12 text-center">
                                    <div class="form-actions">
                                    
                                        <button type="submit" class="btn btn-primary btn-lg ml-5" name="psend2" id="psend">
                                            <i class="icon-ok icon-white"></i> Update Now
                                        </button>
                                        <?php
                                        echo "<a href=\"javascript:history.go(-1)\" class='btn btn-warning btn-lg'>GO BACK</a>"; ?>                                     
                                    </div>
                                        <!-- <button type="submit" class="btn btn-primary btn-lg">Book Now</button> -->
                                </div>
                            </div>
        </form>
        <div id="loader"></div>
        </div>

    </div>
</div>
<?php

          }
      }
    }
 
 
 ?>
</div>
</div>

<?php include("footer.php") ?>