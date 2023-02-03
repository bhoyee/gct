<?php
// including the database connection file
   include("connect.php");

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT route_cities, route_dep_date, route_dep_time, price, route_status FROM routes WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $cities=$res['route_cities'];
    $ddate=$res['route_dep_date'];
    $dtime=$res['route_dep_time'];
    $sstatus=$res['route_status'];
    $price =$res['price']; 
   
}
?>
<?php 
include('header.php');
?>
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Edit / Update Route Timing</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Edit / Update Route Timing</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <section id="pricing-page-area" class="section-padding">
        <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div class="col-lg-12 col-md-6 m-auto mt-3">
              <div class="login-page-content">
                <div class="login-form">
                  <h6>Edit / Update Route</h6><br>

                  <?php

                     $status = "";
                 if(isset($_POST['new']) && $_POST['new']==1)
                 {
                      $id = $_POST['id'];

                      $ucities=$_POST['cities'];
                      $uddate=$_POST['ddate'];
                      $udtime=$_POST['dtime'];
                      $ustatus=$_POST['status'];
                      $bus = $_POST['bus'];
                      $price = $_POST['amt'];

                      // convert 12-hour time to 24-hour time 
                      $ntime  = date("H:i", strtotime($udtime));
                           


                      // checking empty fields

                          //updating the table
                          $result = mysqli_query($conn, "UPDATE routes SET route_cities='$ucities',route_dep_date='$uddate',route_dep_time='$ntime',bus='$bus',route_status='$ustatus', price='$price' WHERE id=$id");

                          //redirectig to the display page. In our case, it is index.php
                          // header("Location: index.php");
                          $status = "Route Time Updated Successfully. </br></br>
                            <a href='route.php' >Go Back to Route Page</a>";
                          echo '<p style="color:#fff;">'.$status.'</p>';

                        } else {

                        ?>

                  <form action="" method="post">
                    <div class="form-row">
                      <div class="">
                        <input type="hidden" name="new" value="1" />
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Route Cities</span>
                        <input type="text" name="cities" class="form-control" value="<?php echo $cities;?>">
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Depature Date</span>
                        <input type="text" name="ddate" class="form-control" value="<?php echo $ddate;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Departure Time</span>
                        <input type="time" name="dtime" class="form-control" value="<?php echo $dtime;?>" required>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Route Status</span>

                        <!-- <input type="hidden" name="status" class="form-control" value="<?php echo $sstatus;?>" readonly> -->
                   

                          <span style="color:#fff">Activate / Deativate Trip :</span>
                          <select id="Dstatus" class="form-control mt-3" name="status" title="Select Active / Disable">
                          <option value="0">Select Option</option>
                          <option value="1">Activate</option>
                          <option value="0">Disable</option>
                
                      </select>

                      </div>
                      <div class="col-md-6 mb-3">
                          <span style="color:#fff">Select Bus / Car:</span>
                          <!-- <input type="text" name="city1" class="form-control" value="" placeholder="Enter City/ State Name" required > -->
                          <select id="city1" class="form-control mt-3" name="bus" title="Select destination city">
                              <option value="">-- Select Bus / Car --</option>
                                <?php
                             $sqlii = "SELECT bus_name FROM buses";
                                $resulti = mysqli_query($conn, $sqlii);
                                 while ($rowi = mysqli_fetch_array($resulti)) {
                                 $name = $rowi['bus_name'];
                                  // $terminal = $rowi['terminal']; 
                                  echo '<option value="'.$name.'">'.$name.'</option>';
                    
                                 }
                                
                                echo '</select>';
                                
                                ?>
				                 </div>
                         <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter Amount:(eg 175.00)</span>
                          <input type="number" name="amt" class="form-control" value="<?php echo $price;?>" step=".01" required >
                                      
                        </div>


                      <div class="log-btn">
                        <!-- <input name="submit" type="submit" class="btn btn-lg-primary" value="Update" /> -->
                        <button type="submit" name="button"> <i class="fa fa-sign-in"></i> Update</button>
                      </div>

                  </form>
                   <?php } ?>

                </div>


              </div>



            </div>
          </div>
        </div>
      </section>

<?php include('footer.php');?>