<?php 
include('header.php');

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
                                    <h4 class="mb-sm-0">Update Payment Status</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Update Payment</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
              
                           <div class="col-lg-8">
                             <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit / Update Payment Status </h4>
                                    <p class="card-title-desc"><code> Edit / Update Payment Status.</code></p>
                                   
                                    <?php

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
                                        $status = "<b>Record Updated Successfully.</b> </br></br>
                                            <a href='sales.php'class='btn btn-primary btn-lg' >Go Back to Sales Page</a>";
                                        echo '<h4 style="color:green;">'.$status.'</h4>';

                                        } else {
                                    ?>
                                   <form action="" method="post">
                                   <div class="">
                                        <input type="hidden" name="new" value="1" />
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                                    </div>
                                       <span>Booking Number</span>
                                        <div class="mb-4">
                                            <input type="text" name="rbook" style="background-color: #72A4D2;" class="form-control" value="<?php echo $rbook;?>" readonly>
                                        </div>

                                        <span>Amount</span>
                                        <div class="mb-4">
                                             <input type="text" name="rprice" class="form-control" value="<?php echo $rprice;?>">
                                        </div>

                                        <span>Transaction Date</span>
                                        <div class="mb-4">
                                            <input type="date" name="rdate" class="form-control" value="<?php echo $rdate;?>">
                                        </div>
                                        <div>
                                        <button type="submit" class="btn btn-primary" name="button"><i class="fas fa-wallet"></i> Update</button>
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