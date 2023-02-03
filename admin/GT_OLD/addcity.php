<?php 
include('header.php');
?>
<?php
  include("connect.php");
?>



    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>City / Terminal Management</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p> Create Cities / Terminals</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Pricing Area Start ==-->
    <section id="pricing-page-area" class="section-padding">
        <div class="container">
        <div class="row">
                  <!-- Pricing Content Start -->
          <div class="col-lg-12">
          <?php
        if (isset($_POST['create'])){
    
            $city1  = trim($_POST["city1"]);
            $terminal1  = trim($_POST["terminal1"]);
      

            $selectCus   = "select name from city where name='$city1'"; 
            $resultCus   = mysqli_query($conn, $selectCus);
            $num_row_cus = mysqli_num_rows($resultCus);

            if($num_row_cus >0){

                echo '<div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Sorry city you entered already exist.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }else {

            $sql = "INSERT INTO city (name, terminal) 
            VALUES ('$city1','$terminal1')";

            // $sql = mysqli_query($conn, $sql3_cus);

            if ($conn->query($sql) === TRUE) {
                
                echo '<div class="alert alert-success" role="alert">
                <strong>Alert!</strong> New City / Termical Created Successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            } else {
                // echo "Error: " . $sql . "<br>" . $conn->error; // this show err 
                echo '<div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Something Went Wrong.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
          }
            
                
        }

            ?>

           <br/>
           <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

              <div class="col-lg-12 col-md-6 m-auto mt-3">
                <div class="login-page-content">
                  <div class="login-form">
                    <h6>Create City</h6>
                    <p style="color:white">Don't write or use comma in the words eg (Washington,DC)</p><br>
                    <form action="addcity.php" method="post">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <span style="color:#fff">Enter City / State Name (Departure):</span>
                          <input type="text" name="city1" class="form-control" value="" placeholder="Enter City/ State Name" required >
                                      
                        </div>
                        <div class="col-md-6 mb-3">

                          <span style="color:#fff">Enter Terminal Name (Departure):</span>
 
                          <input type="text" name="terminal1" class="form-control" value="" placeholder="Enter Terminal Name" required >                                      
                       
                        </div>
                       
                        <!-- <div class="col-md-3">
                          <span style="color:#fff">Select Trip Date</span>
                          <input type="date" name="tdate" class="form-control" required>
                        </div>
                         <div class="col-md-3 mb-3">
                          <span style="color:#fff">Book Status</span>
                          <select id="Dept" class="form-control mt-3" name="status" title="Select Booking Status">
                                                    <option value="0">Select status</option>
                                                    <option value="active">Active</option>
                                                    <option value="cancel">Cancel</option>
                                           
                                                </select>
                        </div>  -->
                        <!-- <div class="col-md-6">
                          <span style="color:#fff">Search By Phone Number</span>
                          <input type="number" name="phone" class="form-control" placeholder="Search By Phone nUMBER">
                        </div> -->
                      </div>
                      <div class="log-btn">
                        <button type="submit" name="create"> <i class="fa fa-sign-in"></i> Create City</button>
                      </div>
                    </form>

                  </div>
                  <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>


                </div>
                <br>
            </div>
           
                <!-- Pricing Content End -->
                <div class="table-responsive">
                <table class="table table-striped table-dark w-100 ">
                  <thead>
                    <tr>
                        <th scope="col"></th>
                      <th scope="col">City Name</th>
                      <th scope="col">Terminal</th>
                      <!-- <th scope="col">Depature Time</th> -->
                      <!-- <th scope="col">Amount</th> -->
                      <!-- <th scope="col">Route Status</th> -->
                      <th></th>

                    </tr>
                  </thead>

                <?php
        
                $cdate = date("Y-m-d");
                $count=1;
                // $newDate = date("Y-m-d", strtotime($fdate));
               // $fdatee = date("Y-m-d", strtotime($fdate));
               $record11 = mysqli_query($conn,"SELECT id, name, terminal FROM city"); // fetch data from database
               if (mysqli_num_rows($record11) > 0) {
               while($datas1 = mysqli_fetch_array($record11))
                 {

                 //  $rId = $datas['id'];
                 $name = $datas1['name'];
                 $terminal = $datas1['terminal'];
               
            
                 ?>
                 <tbody>
                 <tr>
                   <td align="center"><?php echo $count; ?></td>
                   <td><?php echo $name; ?></td>
                   <td><?php echo $terminal; ?></td>                
              

                   <td>
                     <a href="updatecity.php?id=<?php echo $datas1['id']; ?>"><button class="btn btn-warning"><i class="fa fa-edit" title="Edit Time">edit</i></button> </a>

                     </td>
                     <td align="center">
                   <a href="citydelete.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to delete  both city and terminal?')"> <button class="btn btn-danger">Delete</button></a>

                   </td>

                  </tr>
                  <?php $count++; ?>
                 </tbody>

                   <?php
                 }
                }else {
                  $msg = "No Register City Available";

                 }
                 echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                 ";
                
                  ?>
              </table> </div>
                 <?php 
                 
                 mysqli_close($conn); // Close connection ?>


              </div>


          </div>
        </div>
    </section>

<?php include('footer.php');?>