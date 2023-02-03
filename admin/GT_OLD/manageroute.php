<?php 
include('header.php');

$current_date = date('Y-m-d');

if($current_date){
   //update route table 
   mysqli_query($conn, "DELETE FROM routes WHERE route_dep_date < '$current_date'");
}
?>
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                     <h2>Routes</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Manager Terminal and  Routes.</p>
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
              <div class="col-lg-4 col-md-6 text-center">
                <a href="addcity.php">
                <div class="single-pricing-table">

                  <h3><i class="fa fa-book" style="font-size:48px;"></i></h3>
                  <h2>City & Terminal</h2>
                  <h5 class="pb-2">Create and Manage  City / Terminal</h5>
                </a>
                </div>
              </div>
              <!-- Single Pricing Table -->

              <!-- Single Pricing Table -->

                <div class="col-lg-4 col-md-6 text-center">
                  <a href="addroute.php">
                  <div class="single-pricing-table">

                    <h3><i class="fa fa-book" style="font-size:48px;"></i></h3>
                    <h2>Create Routes</h2>
                    <h5 class="pb-2">Create Routes</h5>
                  </a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                  <a href="route.php">
                  <div class="single-pricing-table">

                    <h3><i class="fa fa-book" style="font-size:48px;"></i></h3>
                    <h2>Manage Single Trip</h2>
                    <h5 class="pb-2">Manage and Edit Trip</h5>
                  </a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                  <a href="mtrip.php">
                  <div class="single-pricing-table">

                    <h3><i class="fa fa-book" style="font-size:48px;"></i></h3>
                    <h2>Manage All Trips</h2>
                    <h5 class="pb-2">Manage and Edit All Trips</h5>
                  </a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                  <a href="deltrip.php">
                  <div class="single-pricing-table">

                    <h3><i class="fa fa-book" style="font-size:48px;"></i></h3>
                    <h2>Delete Trips</h2>
                    <h5 class="pb-2">Delete Single / All Trips</h5>
                  </a>
                  </div>
                </div>

                </div>
              </div> <br/>
              <div class="col-lg-9 col-md-8 m-auto mt-3">
                <!-- <form>
                  <div class="form-row">
                    <div class="col">
                      <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="Last name">
                    </div>
                  </div>
                </form> -->


              </div>
            </div>
                <!-- Pricing Content End -->


          </div>
        </div>
    </section>


    <?php include('footer.php');?>