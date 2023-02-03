<?php
   include("connect.php");
     $status = 'Paid';
     $date = date('Y-m-d');
     $data = mysqli_query($conn, "select SUM(price) AS price from invoice where date = '$date' and status ='$status' ");
     $todaySale = mysqli_fetch_assoc($data);
     $sale = $todaySale['price'];
     if (is_null($sale)){
        $sale = 0;
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
                     <h2>Welcome <?php echo $login_session; ?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Manage GCT System.</p>
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
					<div class="pricing-details-content">
						<div class="row">
							<!-- Single Pricing Table -->
							<div class="col-lg-4 col-md-4 text-center">
								<a href="managebooking.php">
                  <div class="single-pricing-table">
  									<h3><i class="fa fa-ticket" style="font-size:48px;"></i></h3>
  									<h2>Booking</h2>
                    <h5 class="pb-2">Manage Booking</h5>
		              </div> </a>
							</div>
							<!-- Single Pricing Table -->

							<!-- Single Pricing Table -->

              <div class="col-lg-4 col-md-4 text-center">
                <a href="genrept.php">
								<div class="single-pricing-table">
										<h3><i class="fa fa-book" style="font-size:48px;"></i></h3>
									<h2>Receipt</h2>
									<h5 class="pb-2">Generate Receipt </h5>

								</div>
              </a>
							</div>

							<!-- Single Pricing Table -->

							<!-- Single Pricing Table -->
							<div class="col-lg-4 col-md-4 text-center">
            	<a href="psearch.php">
								<div class="single-pricing-table">
									<h3><i class="fa fa-users" style="font-size:48px;"></i></h3>
									<h2>Passengers</h2>
									<h5 class="pb-2">Search for Passengers</h5>

								</div>
              </a>
							</div>
							<!-- Single Pricing Table -->

							<!-- Single Pricing Table -->
							<div class="col-lg-4 col-md-4 text-center">
                <a href="sales.php">
								<div class="single-pricing-table">

									<h3><i class="fa fa-dollar" style="font-size:48px;"></i></h3>
									<h2>Sales</h2>
									<h5 class="pb-2">Sales Activities</h5>
                </a>
								</div>
							</div>
							<!-- Single Pricing Table -->

              <!-- Single Pricing Table -->
              <div class="col-lg-4 col-md-4 text-center">
                <a href="adminpayment.php">
                <div class="single-pricing-table">

                  <h3><i class="fa fa-credit-card" style="font-size:48px;"></i></h3>
                  <h2>Payment</h2>
                  <h5 class="pb-2">Manage Payment</h5>
                </a>
                </div>
              </div>
              <!-- Single Pricing Table -->

              <!-- Single Pricing Table -->
              <div class="col-lg-4 col-md-4 text-center">
                <a href="search.php">
                <div class="single-pricing-table">

                  <h3><i class="fa fa-search-plus" style="font-size:48px;"></i></h3>
                  <h2>Transaction</h2>
                  <h5 class="pb-2">Seach for Transaction</h5>
                </a>
                </div>
              </div>
              <!-- Single Pricing Table -->

              <!-- Single Pricing Table -->
              <div class="col-lg-4 col-md-4 text-center">
                <a href="pwd.php">
                <div class="single-pricing-table">

                  <h3><i class="fa fa-key" style="font-size:48px;"></i></h3>
                  <h2>Password</h2>
                  <h5 class="pb-2">Change Password</h5>
                </a>
                </div>
              </div>
                 <!-- Single Pricing Table -->
                 <div class="col-lg-4 col-md-4 text-center">
                <a href="seat.php">
                <div class="single-pricing-table">
                <i class="fa-solid fa-seat-airline"></i>
                  <h3><i class="fa fa-book" style="font-size:48px;"></i></h3>
                  <h2>Book / Seats</h2>
                  <h5 class="pb-2">Manage Seats / Booking</h5>
                </a>
                </div>
              </div>
                 <!-- Single Pricing Table -->
                 <div class="col-lg-4 col-md-4 text-center">
                <a href="manageroute.php">
                <div class="single-pricing-table">
              
                  <h3><i class="fa fa-road" style="font-size:48px;"></i></h3>
                  <h2>Routes</h2>
                  <h5 class="pb-2">Manage Routes</h5>
                </a>
                </div>
              </div>
              <!-- Single Pricing Table -->

                       <!-- Single Pricing Table -->
                <div class="col-lg-4 col-md-4 text-center">
                <a href="mcar.php">
                <div class="single-pricing-table">
              
                  <h3><i class="fa fa-car" style="font-size:48px;"></i></h3>
                  <h2>Bus / Car</h2>
                  <h5 class="pb-2">Manage Bus / Car</h5>
                </a>
                </div>
              </div>
              <!-- Single Pricing Table -->
						</div>
					</div>
				</div>
                <!-- Pricing Content End -->


            </div>
        </div>
    </section>
    <!--== FAQ Area End ==-->

<?php include('footer.php');?>