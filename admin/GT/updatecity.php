<?php 
include('header.php');

$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT name, terminal FROM city WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name=$res['name'];
    $terminal=$res['terminal'];
   
   
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
                                    <h4 class="mb-sm-0">City / Terminal Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Manage City / Terminal</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
              
                           <div class="col-lg-8">
                             <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manage City / Terminal</h4>
                                    <p class="card-title-desc">Edit and Update City / Terminal</p>
                                   
                        <?php
                             $status = "";
                             if(isset($_POST['new']) && $_POST['new']==1)
                             {
                                  $id = $_POST['id'];
            
                                  $name=$_POST['name'];
                                  $terminal=$_POST['terminal'];
                         
            
            
                                  // checking empty fields
            
                                      //updating the table
                                      $result = mysqli_query($conn, "UPDATE city SET name='$name',terminal='$terminal' WHERE id=$id");
            
                                      //redirectig to the display page. In our case, it is index.php
                                      // header("Location: index.php");
                                      $status = "<b>City route Updated Successfully.</b> </br></br>
                                        <a href='addcity.php' class='btn btn-primary btn-lg' >Go Back to City Page</a>";
                                      echo '<p style="color:green;">'.$status.'</p>';
            
                                    } else {
            
                                    ?>
                                   <form action="" method="post">
                                   <div class="">
                                        <input type="hidden" name="new" value="1" />
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                    </div>
                                        <div class="mb-4">
                                            <input class="form-control" type="text" name="name" value="<?php echo $name;?>" required>
                                        </div>

                                        <div class="mb-4">
                                            <input class="form-control" type="text" name="terminal" value="<?php echo $terminal;?>" required>
                                        </div>

                                        <div>
                                        <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-university"></i> Update Vehicle</button>
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