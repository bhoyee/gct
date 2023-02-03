<?php
// including the database connection file
   include("connect.php");

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT bus_name FROM buses WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name=$res['bus_name'];
    // $terminal=$res['terminal'];
   
   
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
                     <h2>Edit / Update Bus / Car Name</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Edit / Update Bus / Car</p>
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
                  <h6>Edit / Update BUS / CAR</h6><br>

                  <?php

                     $status = "";
                 if(isset($_POST['new']) && $_POST['new']==1)
                 {
                      $id = $_POST['id'];

                      $name=$_POST['bname'];
                      $seat =$_POST['seat'];
                    //   $terminal=$_POST['terminal'];
             


                      // checking empty fields

                          //updating the table
                          $result = mysqli_query($conn, "UPDATE buses SET bus_name='$name', seat='$seat' WHERE id=$id");

                          //redirectig to the display page. In our case, it is index.php
                          // header("Location: index.php");
                          $status = "Bus / CAR Name Updated Successfully. </br></br>
                            <a href='mcar.php' ><b style='color:green'>Go Back to Add Bus/Car Page</b></a>";
                          echo '<p style="color:#fff;">'.$status.'</p>';

                        } else {

                        ?>

                  <form action="" method="post">
                    <div class="form-row">
                      <div class="">
                        <input type="hidden" name="new" value="1" />
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                      </div>
                      <div class="col-md-12">
                        <span style="color:#fff">Bus /Car Name</span>
                        <input type="text" name="bname" class="form-control" value="<?php echo $name;?>" >
                      </div>
                      <div class="col-md-12">
                        <span style="color:#fff">Seat Number</span>
                        <input type="number" name="seat" class="form-control" value="<?php echo $seat;?>" >
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