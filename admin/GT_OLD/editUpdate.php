<?php
// including the database connection file
   include("connect.php");

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM boidata WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $fname=$res['fullName'];
    $fphone=$res['phone'];
    $fdate=$res['PDate'];
    $fdAddress=$res['DAddress'];
    $fpAddress=$res['pAddress'];
    $fbdate=$res['regDate'];
    $femail=$res['email'];
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
                     <h2>Edit / Update Records</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Edit / Update Messagaer Info</p>
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
                  <h6>Edit / Update Records</h6><br>

                  <?php

                     $status = "";
                 if(isset($_POST['new']) && $_POST['new']==1)
                 {
                      $id = $_POST['id'];

                      $fname=$_POST['fname'];
                      $fphone=$_POST['fphone'];
                      $fdate=$_POST['fdate'];
                      $fdAddress=$_POST['fdAddress'];
                      $fpAddress=$_POST['fpAddress'];
                      $fbdate=$_POST['fbdate'];
                      $femail=$_POST['femail'];


                      // checking empty fields

                          //updating the table
                          $result = mysqli_query($conn, "UPDATE boidata SET fullName='$fname',phone='$fphone',PDate='$fdate',DAddress='$fdAddress',pAddress='$fpAddress',regDate='$fbdate',email='$femail' WHERE id=$id");

                          //redirectig to the display page. In our case, it is index.php
                          // header("Location: index.php");
                          $status = "Record Updated Successfully. </br></br>
                            <a href='search.php' >Go Back to Search Page</a>";
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
                        <span style="color:#fff">Full Name</span>
                        <input type="text" name="fname" class="form-control" value="<?php echo $fname;?>">
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Phone Number</span>
                        <input type="text" name="fphone" class="form-control" value="<?php echo $fphone;?>">
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Email</span>
                        <input type="text" name="femail" class="form-control" value="<?php echo $femail;?>">
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">PickUp Date</span>

                        <input type="date" name="fdate" class="form-control" value="<?php echo $fdate;?>">
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Pickup Address</span>
                        <input type="text" name="fpAddress" class="form-control" value="<?php echo $fpAddress;?>">

                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Destination Address</span>
                        <input type="text" name="fdAddress" class="form-control" value="<?php echo $fdAddress;?>">

                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Booking Date</span>

                        <input type="date" name="fbdate" class="form-control" value="<?php echo $fbdate;?>">
                      </div>
                      <div class="col-md-6">

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