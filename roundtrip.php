<?php require 'partials/_functions.php';
include("session_timeout.php");
 $conn = db_connect();
 session_start();

 $current_date = date('Y-m-d');
//  if($current_date){
//      //update route table 
//      mysqli_query($conn, "UPDATE routes SET route_dep_date = '$current_date'");

//  }

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


<div class="container page-content">
   

   <div class="row">

<div class="col-md-12 newstates">
   <div id="faci">
       <h2 align="center">Round Trip Booking / Reservation</h2>
       <div class="busdetails">

           <div class="col-md-12 newstates">
               <div class="panel with-nav-tabs panel-default">
                   <div class="panel-heading">
                       <ul class="nav nav-tabs">
                           <li class="active"><a href="#executive-coach" data-toggle="tab">Round Trip</a></li>
                           <li><a href="https://giddycruisetransportation.com">One Way</a></li>

                       </ul>
                   </div>
                   <div class="panel-body">
                   <?php
                                    if(isset($_POST["search"]))
                                    {
                                      
                                        $current_date = date('Y-m-d');
                                        $tripFrom = trim($_POST["dfrom"]);
                                        $tripTo   = trim($_POST["dto"]);
                                        $Date = date_create($_POST["DapartureDate"]);
                                        $tripDate = date_format($Date,"Y-m-d");
                                        $adult = trim((int)$_POST["adult"]);

                                         $nextday= date('Y-m-d', strtotime($tripDate. ' + 7 days'));
                                         
                                        $rDate = date_create($_POST["ReturnDate"]);
                                        $ReturnDate = date_format($rDate,"Y-m-d");

                                       
                                        $_SESSION['returnDate'] = $ReturnDate;

                                        if($tripDate < $current_date){

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> You can only book for current and future date.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>'; 
                                        }
                                        if($ReturnDate < $tripDate){

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> Return day cannot be before departure day.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>'; 
                                        }
                                        elseif($tripFrom === $tripTo){

                                            echo '<div class="alert alert-danger " role="alert">
                                            <strong>Alert!</strong> Your departure and destination are same . Please change it. Thank you !!
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
                                                $_SESSION['adult'] = $adult;   
                                                
                                                $_SESSION['deptTime']  = date("g:i a", strtotime("$deptTime"));

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
                             
                       <div class="tab-content">
                           <div class="tab-pane fade  active in" id="executive-coach">

                               <div class="col-md-12 col-sm-5 col-xs-12">
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

    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">

        <label for="DapartureDate">When are you traveling?</label>
        <input class="form-control" type="date" id="DapartureDate" name="DapartureDate" value="" require />

    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">

    <label for="ReturnDate">When do you plan to return?</label>
    <input class="form-control" type="date" id="ReturnDate" name="ReturnDate" value="" require />

    </div> <br><br>
    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:20px">

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