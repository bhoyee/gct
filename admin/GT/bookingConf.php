<?php 
include('header.php');
?>

    <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Booking Confirmation</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Confirm Booking</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row d-flex justify-content-center">
              
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Confirm Booking</h4>
                                        <p class="card-title-desc">Confirm all reservation using booking code (eg. 883153).</p>
                                        <div>
                                            <form action="" method="post">

                                                <div class="mb-4">
                                                    <input class="form-control" type="text" name="bnumb" placeholder="Booking Number">
                                                </div>
                                           
                                                <div>
                                                <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-search"></i> Search</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
             <div class="row">
              <!-- Page Title Start -->
              <div class="col-lg-12">
                  <div class="text-left"> <br>
                     
                  </div>
                  <div class="">
                    <?php
                    include "connect.php"; // Using database connection file here
                    if(isset($_POST['button'])){ 
                         //trigger button click
                    $bnumb=$_POST['bnumb'];

                    $records = mysqli_query($conn,"select boidata.fullName AS fname, boidata.gender AS gender, boidata.phone AS phone, book.bookingCode AS bCode, book.tripChar AS tChar, book.route AS route, 
                    book.bookdate AS depDate, book.time AS time, book.bookstatus AS bstatus, book.pCar AS car, book.seat AS seat, book.returnD AS rDate, book.returnD AS returnD, book.email AS email, book.airport AS airport,book.triptype AS ttipe,book.location AS location, 
                    book.paddress AS pAddress, book.paystatus AS pstatus, book.daddress AS dAddress, book.price AS price, book.nAdlut AS nAldult,book.nChild AS nChild, book.regDate AS regDate from book INNER JOIN boidata ON book.userid=boidata.userid
                     WHERE book.bookingCode ='$bnumb'"); // fetch data from database
                     
                    if (mysqli_num_rows($records) > 0) {
                    while($data = mysqli_fetch_array($records))
                      {
                          $tt = $data['tChar'];
                          if($tt == 'Inter-State'){
                            
                            ?>
                      <div class="bg-white">
                      <h2 class="m-3 pt-3">Booking Details</h2>
                      <br>
                         <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Customer Details</th>
                               
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">Trip Type:</th>
                                  <td><?php echo $data['tChar']; ?></td>
                                 
                                </tr>
                                <tr>
                                  <th scope="row">Trip Route:</th>
                                  <td>  <?php 
                                    $routes = $data['route'];
                                    $str_arr = explode (",", $routes); 
                
                                    echo 'Trip From: '.$str_arr[0] .' '.':- '.' '. $str_arr[1] .' '.' To:'.' '. strtoupper($str_arr[2]) .' '.' :-'.$str_arr[3];
                                    ?>
                                  </td>
                           
                                </tr>
                             
                                <tr>
                                  <th scope="row">Booking Number</th>
                                  <td><?php echo $data['bCode']; ?></td>
                                 
                                </tr>
                                <tr>
                                  <th scope="row">Full Name:</th>
                                  <td><?php echo $data['fname']; ?></td>
                           
                                </tr>
                                 <tr>
                                  <th scope="row">Number of Adults:</th>
                                  <td colspan="2"><?php echo $data['nAldult']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Seat Number:</th>
                                   <td colspan="2"><?php 
                                   $seat = $data['seat']; 
                                   $str_seat = explode(" ", $seat);
                                  
                                  // echo $str_seat[0];
                                
                                    foreach ($str_seat as $book_seat) {
                                  
                                        echo $book_seat;
                                    }
                                                                      
                                  ?></td>
       
                                </tr>
                           
                                <tr>
                                  <th scope="row">Departure Time:</th>
                                  <td colspan="2"><?php echo $data['time']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Departure Date:</th>
                                  <td colspan="2"><?php echo $data['depDate']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Phone:</th>
                                  <td colspan="2"><?php echo $data['phone']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Email:</th>
                                  <td colspan="2"><?php echo $data['email']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Return Date:</th>
                                  <td colspan="2"><?php echo $data['returnD']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Book Date:</th>
                                  <td colspan="2"><?php echo $data['regDate']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Amount Payable:</th>
                                  <td colspan="2">$<?php echo $data['price']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Payment Status:</th>
                                  <td colspan="2"><?php echo $data['pstatus']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Book Status:</th>
                                  <td colspan="2"><?php echo $data['bstatus']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Car / Bus Booked:</th>
                                  <td colspan="2"><?php echo $data['car']; ?></td>
                                
                                </tr>
                              </tbody>
                            </table>

                            <?php
                          } elseif($tt == 'Airport-Chater'){

                            ?>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Customer Details</th>
                               
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">Trip Category:</th>
                                  <td><?php echo $data['tChar']; ?></td>
                                 
                                </tr>
                                                           
                                <tr>
                                  <th scope="row">Booking Number</th>
                                  <td><?php echo $data['bCode']; ?></td>
                                 
                                </tr>
                                <tr>
                                  <th scope="row">Full Name:</th>
                                  <td><?php echo $data['fname']; ?></td>
                           
                                </tr>
                                <tr>
                                  <th scope="row">Phone:</th>
                                  <td colspan="2"><?php echo $data['phone']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Email:</th>
                                  <td colspan="2"><?php echo $data['email']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Trip Type:</th>
                                  <td colspan="2"><?php echo $data['ttipe']; ?></td>
       
                                </tr>
                           
                                <tr>
                                  <th scope="row">Airport:</th>
                                  <td colspan="2"><?php echo $data['airport']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Location:</th>
                                  <td colspan="2"><?php echo $data['location']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Gender:</th>
                                  <td colspan="2"><?php echo $data['gender']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Number of Adults:</th>
                                  <td colspan="2"><?php echo $data['nAldult']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Number of Children:</th>
                                  <td colspan="2"><?php echo $data['nChild']; ?> </td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Travel Date:</th>
                                  <td colspan="2"><?php echo $data['depDate']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Travel Time:</th>
                                  <td colspan="2"><?php echo $data['time'] ?> </td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Payment Status:</th>
                                  <td colspan="2"><?php echo $data['pstatus']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Book Status:</th>
                                  <td colspan="2"><?php echo $data['bstatus']; ?></td>
                                
                                </tr>
                              </tbody>
                            </table>


                            <?php
                            
                          }elseif($tt == 'Point-Point'){

                            ?>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Customer Details</th>
                               
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">Trip Category:</th>
                                  <td><?php echo $data['tChar']; ?></td>
                                 
                                </tr>
                                                           
                                <tr>
                                  <th scope="row">Booking Number</th>
                                  <td><?php echo $data['bCode']; ?></td>
                                 
                                </tr>
                                <tr>
                                  <th scope="row">Full Name:</th>
                                  <td><?php echo $data['fname']; ?></td>
                           
                                </tr>
                                <tr>
                                  <th scope="row">Phone:</th>
                                  <td colspan="2"><?php echo $data['phone']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Email:</th>
                                  <td colspan="2"><?php echo $data['email']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Trip Type:</th>
                                  <td colspan="2"><?php echo $data['ttipe']; ?></td>
       
                                </tr>
                           
                                <tr>
                                  <th scope="row">PickUp Address::</th>
                                  <td colspan="2"><?php echo $data['pAddress']; ?></td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">DropOff Address:</th>
                                  <td colspan="2"><?php echo $data['dAddress']; ?></td>
                                
                                </tr>
                             
                                <tr>
                                  <th scope="row">Number of Adults:</th>
                                  <td colspan="2"><?php echo $data['nAldult']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Number of Children:</th>
                                  <td colspan="2"><?php echo $data['nChild']; ?> </td>
                                
                                </tr>

                                <tr>
                                  <th scope="row">Travel Date:</th>
                                  <td colspan="2"><?php echo $data['depDate']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Travel Time:</th>
                                  <td colspan="2"><?php echo $data['time'] ?> </td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Payment Status:</th>
                                  <td colspan="2"><?php echo $data['pstatus']; ?></td>
                                
                                </tr>
                                <tr>
                                  <th scope="row">Book Status:</th>
                                  <td colspan="2"><?php echo $data['bstatus']; ?></td>
                                
                                </tr>
                              </tbody>
                            </table>

                           <?php

                          }
                      $msg = "";
                      ?>
                       
                     <?php
                       }
                      }else {
                        $msg = "No Record Found";
                       }
                     }
                   ?>

                  <?php mysqli_close($conn); // Close connection ?>

                  </div></div>
                  
                  <div style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></div>

              </div>
   

<?php 
include('footer.php');
?>