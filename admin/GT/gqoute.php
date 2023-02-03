<?php 

include('header.php');
include("connect.php");

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

                                    <h4 class="mb-sm-0">SET PRICE ON/OFF</h4>



                                    <div class="page-title-right">

                                        <ol class="breadcrumb m-0">

                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>

                                            <li class="breadcrumb-item active">ON/OFF Price</li>

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
                                    
                                <?php

                                 if (isset($_POST['create'])){
                                    $pstatus = trim($_POST["pon"]);

                                    $sql = "UPDATE price_status SET status=$pstatus";

                                    if ($conn->query($sql) === TRUE) {

                                        echo '<div class="alert alert-warning" role="alert">

                                        <strong>Alert ! </strong> Price status updated successfully .

                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>


                                    </div>';

                                    } else {
                                      echo "Error updating record: " . $conn->error;
                                    }
                                    
                                    // $conn->close();
                                 }

                                 ?>

                                    <h4 class="card-title">Switch Price ON/OFF</h4>

                                    <div>

                                        <form action="" method="post">



                                            <div class="mb-4">
                                                <p class="p-3 mb-2 text-danger">By default the price is OFF </p>
                                                <select class="form-control" name="pon" id="pon">
                                                    <option value="0">Select Option -- </option>
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                   
                                                </select>

                                            </div>
                                       

                                            <div>

                                            <button type="submit" class="btn btn-danger" name="create"> ON / OFF Price</button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div> 

                        </div>

                    </div>  

                    

                     <!-- tabel data start here    -->

                     <div class="row">

                            <div class="col-12">

                                <div class="card">

                                    <div class="card-body table-responsive">

        

                                       

                                    <h4 class="card-title">Price Status</h4>
                                    
                                    <?php



                                            $record11 = mysqli_query($conn,"SELECT status FROM price_status"); // fetch data from database

                                            if (mysqli_num_rows($record11) > 0) {

                                            while($datas1 = mysqli_fetch_array($record11))

                                            {



                                            //  $rId = $datas['id'];

                                            $name = $datas1['status'];

                                            if ($name == 1){
                                            echo '<p class="p-3 mb-2  bg-success text-white w-50"> PRICE IS ON </p>
                                            ';
                                            }
                                            else {
                                                echo '<p class="p-3 mb-2  bg-danger text-white w-50"> PRICE IS OFF </p>
                                                ';

                                            }

                                        }
                                    }

                                         

                                            ?>
                      
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