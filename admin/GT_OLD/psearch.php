<?php
  include("connect.php");
$msg = '' ;
$rSales = '';
$fdate = '';
// $tdate = '';
     //current sales
     // $date = date('Y-m-d');
     // $data = mysqli_query($conn, "select * from boidata where fullName LIKE '%{$fname}%' OR regDate LIKE '%{$fdate}%'");
     // $todaySale = mysqli_fetch_assoc($data);
     // $sale = $todaySale['price'];
     // if (is_null($sale)){
     //    $sale = 0;
     // }
     // //total sals
     // $data2 = mysqli_query($conn, "select SUM(price) AS price from invoice");
     // $totalSale = mysqli_fetch_assoc($data2);
     // $tSale = $totalSale['price'];
     // if (is_null($tSale)){
     //    $tSale = 0;
     // }

////

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
                     <h2>Search</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Search Passengers / Transactions</p>
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
           <br/>
           <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>

              <div class="col-lg-12 col-md-6 m-auto mt-3">
                <div class="login-page-content">
                  <div class="login-form">
                    <h6>Search for Passangers Using Either Date or Email</h6><br>
                    <form action="psearch.php" method="post">
                      <div class="form-row">
                        <div class="col-md-6">
                          <span style="color:#fff">Search By Date</span>
                          <input type="hidden" name="fID" value="1" />
                          <input type="date" name="fdate" class="form-control" placeholder="From">
                        </div>
                        <!-- <div class="col-md-6">
                          <span style="color:#fff">Search By Name</span>
                          <input type="text" name="fname" class="form-control" placeholder="Search By Name">
                        </div> -->
                        <div class="col-md-6">
                          <span style="color:#fff">Search By Email</span>
                          <input type="email" name="email" class="form-control" placeholder="Search By Email">
                        </div>
                        <!-- <div class="col-md-6">
                          <span style="color:#fff">Search By Phone Number</span>
                          <input type="number" name="phone" class="form-control" placeholder="Search By Phone nUMBER">
                        </div> -->
                      </div>
                      <div class="log-btn">
                        <button type="submit" name="button"> <i class="fa fa-sign-in"></i> Search</button>
                      </div>
                    </form>

                  </div>
                  <p style = "font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px"><?php echo $msg; ?></p>


                </div>
                <br>
                <div class="table-responsive">
                <table class="table table-striped table-dark w-100 ">
                  <thead>
                    <tr>
                        <th scope="col"></th>
                      <th scope="col">Full Name</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Email</th>
                      <th scope="col">Registration Date</th>

                    </tr>
                  </thead>

                <?php
                if(isset($_POST['button'])){    //trigger button click
                //date("Y-m-d", strtotime($orgDate));
                // $fname=$_POST['fname'];
                $fdate=$_POST['fdate'];
                $femail=$_POST['email'];
                // $fphone=$_POST['phone'];

                $count=1;
                 // $newDate = date("Y-m-d", strtotime($fdate));
                // $fdatee = date("Y-m-d", strtotime($fdate));
                // $record = mysqli_query($conn,"select fullName, phone, email, regDate from boidata where fullName LIKE '".$fname."' OR regDate LIKE '".$fdate."' OR email LIKE '".$femail."' OR phone LIKE '".$fphone."' ORDER BY id desc;"); // fetch data from database
                 $record = mysqli_query($conn,"select id, fullName, phone, email, regDate from boidata where regDate LIKE '".$fdate."' OR email LIKE '".$femail."' ORDER BY id desc;"); // fetch data from database

                if (mysqli_num_rows($record) > 0) {
                while($datas = mysqli_fetch_array($record))
                  {

                  //  $rId = $datas['id'];
                  $rfullName = $datas['fullName'];
                  $rPhone = $datas['phone'];
                  $rEmail = $datas['email'];
                  $rDate = $datas['regDate'];
                  ?>
                  <tbody>
                  <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td><?php echo $rfullName; ?></td>
                    <td><?php echo $rPhone; ?></td>
                    <td><?php echo $rEmail; ?></td>
                    <td><?php echo $rDate; ?></td>

                    <td>
                      <a href="pEditUpdate.php?id=<?php echo $datas['id']; ?>"> <i class="fa fa-edit"></i></a>

              		</td>
                  <td align="center">
                    <a href="psearchdelete.php?id=<?php echo $datas['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></a>


                    </td>
                   </tr>
                   <?php $count++; ?>
                  </tbody>

                    <?php
                  }
                 }else {
                   $msg = "No Result Found";

                  }
                  echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                  ";


                }
                  ?>
              </table> </div>
                 <?php mysqli_close($conn); // Close connection ?>


              </div>
            </div>
                <!-- Pricing Content End -->


          </div>
        </div>
    </section>

<?php include('footer.php');?>