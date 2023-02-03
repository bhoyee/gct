<?php 
include('header.php');

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT bus_name,seat FROM buses WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name=$res['bus_name'];
    // $terminal=$res['terminal'];
    $seat = $res['seat'];
}
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
                                    <h4 class="mb-sm-0">Vehicle Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Manage Vehicle</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
              
                           <div class="col-lg-8">
                             <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Vehicle for trip</h4>
                                    <p class="card-title-desc">Add and Manage Vehicle (<code>Edit and Delete Vehicle.</code>) </p>
                                   
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
                                      $status = "Vehicle Records Updated Successfully. </br></br>
                                      <a href='mcar.php' class='btn btn-primary btn-lg' >Go Back to Add Vehicle Page</a>";
                                      echo '<p style="color:green;">'.$status.'</p>';
            
                                    } else {
            
                                    ?>
                                   <form action="" method="post">
                                   <div class="">
                                        <input type="hidden" name="new" value="1" />
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                    </div>
                                        <div class="mb-4">
                                            <input class="form-control" type="text" name="bname" value="<?php echo $name;?>" required>
                                        </div>

                                        <div class="mb-4">
                                            <input class="form-control" type="number" name="seat" value="<?php echo $seat;?>" required>
                                        </div>

                                        <div>
                                        <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-car"></i> Update Vehicle</button>
                                        </div>
                                    </form>
                                    <?php } ?>
                                 </div>
                             </div>
                         </div>
                      </div>
                       
                </div> 
             </div>
        </div>   
                   
<?php 
include('footer.php');
?>