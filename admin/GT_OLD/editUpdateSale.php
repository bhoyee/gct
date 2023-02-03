<?php
// including the database connection file
   include("connect.php");

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM invoice WHERE id=$id");

while($reg = mysqli_fetch_array($result))
{
  $rbook = $reg['bookingCode'];
  $rprice = $reg['price'];
  $rdate = $reg['date'];
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
                     <h2>Edit / Update Sales Record</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Edit / Update Messagaer Sales Info</p>
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
                  <h6>Edit / Update Sales Record</h6><br>

                  <?php

                     $status = "";
                 if(isset($_POST['new']) && $_POST['new']==1)
                 {
                      $id = $_POST['id'];
                      $rbook=$_POST['rbook'];
                      $rprice=$_POST['rprice'];
                      $rdate=$_POST['rdate'];



                      // checking empty fields

                          //updating the table
                          $result = mysqli_query($conn, "UPDATE invoice SET price='$rprice',date='$rdate' WHERE id=$id");

                          //redirectig to the display page. In our case, it is index.php
                          // header("Location: index.php");
                          $status = "Record Updated Successfully. </br></br>
                            <a href='sales.php'class='btn btn-primary btn-lg' >Go Back to Sales Page</a>";
                          echo '<h4 style="color:#fff;">'.$status.'</h4>';

                        } else {

                        ?>

                  <form action="" method="post">
                    <div class="form-row">
                      <div class="">
                        <input type="hidden" name="new" value="1" />
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Confirmation Number</span>
                        <input type="text" name="rbook" style="background-color: #72A4D2;" class="form-control" value="<?php echo $rbook;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <span style="color:#fff">Amount($)</span>
                        <input type="text" name="rprice" class="form-control" value="<?php echo $rprice;?>">
                      </div>

                      <div class="col-md-6">
                        <span style="color:#fff">Transaction Date</span>

                        <input type="date" name="rdate" class="form-control" value="<?php echo $rdate;?>">
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