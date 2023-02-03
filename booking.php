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

?>

<!-- this handle the price on / off  -->
<?php
  
  // Connect to database 
  $con = db_connect();

  $sql = "SELECT status FROM price_status";
  $Sql_query = mysqli_query($con,$sql);
  $testx = mysqli_num_rows($Sql_query);
  if($testx > 0){
     
    $rowx = mysqli_fetch_array($Sql_query);
    $All_status = $rowx['status'];
  }
//   $All_price = mysqli_fetch_array($Sql_query);
?>

<?php include("header.php") ?>
<div class="container page-content">
        <div class="gap"></div>


    <div ng-app="BusSeats" class="ng-scope">
        
<div>
  
        
<div id="leave">
    <h4 class="booking-title bolded">
        <?php 
            $date = date('Y-m-d');
             $string = $_SESSION['route'];
             $Date =  $_SESSION['deptDate'];
            //  if($string == 'Baltimore,New-York');
            //  $nstring = 'Baltimore->Exxon Gas Station,New-York->4880 Broadway';
            //  if($string == 'New-York,Baltimore');
            //  $nstring = 'New-York->4880 Broadway,Baltimore->Exxon Gas Station';
             $str_arr = explode (",", $string); 
     //  print_r($str_arr);

     echo "<h5> From ". strtoupper($str_arr[0]) .":-<i>".strtolower($str_arr[1]).'</i>'." =&gt; To:".strtoupper($str_arr[2])." ".':-'.'<i>'.$str_arr[3] ."</i><small>".' '.' '."</small></h>";

     
   
             
             ?><small class="header-text bolded"><?php echo $_SESSION['deptDate'] ?></small>
        <small><a class="popup-text" href="#search-dialog" data-effect="mfp-zoom-out">Change search</a></small>
    </h4>
    <?php
        $route = $string;
    
        
        $record1 = mysqli_query($conn,"select routes.id AS id, routes.route_dep_time AS time, routes.bus AS bus, routes.price AS price, buses.picture AS picture, buses.seat AS seat from routes INNER JOIN buses ON buses.bus_name = routes.bus where routes.route_cities='$route' and routes.route_dep_date ='$Date' and routes.route_status =1;"); // fetch data from database
        if (mysqli_num_rows($record1) > 0) {
          
            while($datas1 = mysqli_fetch_array($record1))
            { 
                
                   
                $bus = $datas1['bus'];
                $seat = $datas1['seat'];
                $routeID =  $datas1['id'];
              
                // print_r($bus);
                $date = date('Y-m-d');
                $string = $_SESSION['route'];
                $str_arr = explode (",", $string); 

           
                    // print_r(' what is '. $bus.' I got u ');
                    unset($_SESSION['deptTime']);
                    $bimg = $datas1['picture'];
                    $busimg = 'img/'.$bimg;
              
                    // $_SESSION['bus1'] = 'Ford Van';
                    // $bus = $_SESSION['bus1'];

                    $deptTime  = $datas1['time'];
                    $_SESSION['deptTime1']  = date("g:i a", strtotime("$deptTime"));
                    $_SESSION['price1'] = $datas1['price'];
                                        

                    ?>
         <br><br>
         <form action="t3458jdey8est.php" method="POST" onsubmit="return validateCheckBox();">

              <div class="row">
        <div class="col-md-12">
            <ul class="booking-list">
      <li>
        <div class="booking-item-container">
    <div class="booking-item bg-white">
        <div class="row">
            <div class="col-md-2">
                <div class="booking-item-img-wrap">
                    <img src="<?php echo $busimg; ?>" alt="Chisco Blazer (15 Seats)" title="Chisco Blazer (15 Seats)">
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="booking-item-flight-details">
                    <h5 class="booking-item-title text-primary"> <?php echo $bus; ?> (<?php echo $seat; ?> Seats)</h5>
                    <p class="booking-item-address"><i class="fa fa-map-marker"></i>
                    <?php 
                        $date = date('Y-m-d');
                        $string = $_SESSION['route'];
                        $str_arr = explode (",", $string); 
                //  print_r($str_arr);
                  echo strtoupper($str_arr[2]) .'('.strtolower($str_arr[3]).')';

                        ?>
                    </p>
                    <!-- <p class="booking-item-address"> <i class="fa fa-wheelchair"></i>
                     <?php
                      $route = $string;
                      $date = date('Y-m-d');
                      $sql = "SELECT * FROM seats WHERE date ='$date' AND route='$route' AND bus='$bus' AND status='active' ORDER BY id DESC";

                      $result = mysqli_query($conn, $sql);
                      $testx = mysqli_num_rows($result);
                      $st = $seat;

                    //   $_SESSION['st'] = $st;

                    echo 'total ';
                      if($testx > 0){
              
                        while($row = mysqli_fetch_array($result))
                        {
                                  $totalSeat = explode(",", $row["PNR"]);
                                                       
                                  $total = count($totalSeat);
                                  echo 'total ' .$total;
                                                                
                                  $availSeat  = $st-$total;
                                  echo $availSeat. ' '. "Seats(s) Available";
                        }

                      }
                      else{
                        echo $st. ' '. "Seats(s) Available";
                      }
                     ?> -->
                    <p class="booking-item-address"> <i class="fa fa-user"></i> Adults:<?php echo $_SESSION['adult']?> </p>
                    <ul class="booking-item-features booking-item-features-rentals booking-item-features-sign">
                            <li rel="tooltip" data-placement="top" title="" data-original-title="Air Condition">
                                <i class="im im-air"></i><span class="booking-item-feature-sign">Air Condition</span>
                            </li>
                            <li rel="tooltip" data-placement="top" title="" data-original-title="Media">
                                <i class="fa fa-film"></i><span class="booking-item-feature-sign">Media</span>
                            </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="booking-item-arrival">
                    <p class="text-color mt15"><b>Departure Info</b></p>
                    <p class="booking-item-address"><i class="fa fa-clock-o"></i> <?php echo $_SESSION['deptTime1']?></p>
                    <input type="hidden" name="doj" id="doj" value="<?php echo $_SESSION['deptTime1']?>" readonly>
                    <p class="booking-item-address"><i class="fa fa-calendar"></i> <?php echo $_SESSION['deptDate']?></p>
                    <p class="booking-item-address"><i class="fa fa-map-marker"></i> <?php echo strtoupper($str_arr[0]).' :- '. strtolower($str_arr[1])?> </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <!-- <del class="booking-item-price text-darken discounted-price">₦14,200.00</del> <span>(0.00 % off)</span> <br> -->
                
                <!-- <button id="completeSeatSelection1" type="submit" name="btn2" class="btn btn-primary btn-lg">View Seats</button> -->
                <!-- <a class="btn btn-primary btn-lg" href="viewseats.php?status=viewseats&&id=<?php echo $datas1['id'];?>&&bus=<?php echo $datas1['bus']?>"
                 target="_blank">View Seats</a> -->

                 <!-- change the status of the button -->
                 <?php 
                    if($All_status == 1) 
                      
                        echo 
                       " <span class='booking-item-price text-darken text-color'>$".$_SESSION['price1']."></span><span>/person</span>
                          <br>
                        <a class='btn btn-primary btn-lg' href=viewseats.php?status=viewseats&&id=".$datas1['id']."&&bus=".$datas1['bus'].">View Seats</a>";

                            // "<a href=deactivate.php?id=".$course['id']." class='btn red'>Price Show here</a>";
                    else 
                        echo 
                        "<a class='btn btn-primary btn-lg' href=getquote.php?status=viewseats&&id=".$datas1['id']."&&bus=".$datas1['bus'].">Get Quote</a>";

                        // "<a href=activate.php?id=".$course['id']." class='btn green'>Activate</a>";
                    ?>
                 <!-- <a class="btn btn-primary btn-lg" href="viewseats.php?status=viewseats&&id=<?php echo $datas1['id'];?>&&bus=<?php echo $datas1['bus']?>">View Seats</a> -->
                <!-- <a class="btn btn-primary btn-lg" id="expander">View Seat</a> -->
            </div>
        </div>
     
</div>
</form>
             <?php                

            }
        }

    ?>
  

    </li>            </ul>
            <p class="text-right">
                Not what you're looking for? <a class="" href="index.php" data-effect="">Try your search again</a>
            </p>
        </div>
    </div>
</div>

</div>
    </div>
    </div>
</div>
<div class="gap"></div>

</div> </div>
<?php include("footer.php") ?>