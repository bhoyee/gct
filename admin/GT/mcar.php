<?php 
include('header.php');
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
                        <!-- end page title -->    
                        <div class="row d-flex justify-content-center">
              
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Vehicle for trip</h4>
                                    <p class="card-title-desc">Add and Manage Vehicle (<code>Edit and Delete Vehicle.</code>) </p>
                                    <div>
                                    <?php
                                    if (isset($_POST['create'])){
                                
                                        $bname  = trim($_POST["bname"]);
                                        $seat  = trim($_POST["seat"]);
                                

                                        $selectCus   = "select bus_name from buses where bus_name='$bname'"; 
                                        $resultCus   = mysqli_query($conn, $selectCus);
                                        $num_row_cus = mysqli_num_rows($resultCus);

                                        if($num_row_cus >0){

                                            echo '<div class="alert alert-danger" role="alert">
                                            <strong>Alert!</strong> Vehicle entered already exist.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                        </div>';
                                        }else {

                                        $sql = "INSERT INTO buses (bus_name, seat) 
                                        VALUES ('$bname', '$seat')";

                                        // $sql = mysqli_query($conn, $sql3_cus);

                                        if ($conn->query($sql) === TRUE) {
                                            
                                            echo '<div class="alert alert-success" role="alert">
                                            <strong>Alert!</strong> New Vehicle Added Successfully.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                        } else {
                                            // echo "Error: " . $sql . "<br>" . $conn->error; // this show err 
                                            echo '<div class="alert alert-danger" role="alert">
                                            <strong>Alert!</strong> Something Went Wrong.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                        }
                                    }
                                        
                                            
                                    }

                                        ?>
                                        <form action="" method="post">

                                            <div class="mb-4">
                                                <input class="form-control" type="text" name="bname" placeholder="Enter Vehicle Name " required>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <input class="form-control" type="number" name="seat" placeholder="Enter Total Vehicle Seats Number" required>
                                            </div>
                                        
                                            <div>
                                            <button type="submit" class="btn btn-primary" name="create"><i class="fas fa-car"></i> Add Vehicle</button>
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
        
                                       
                                    <h4 class="card-title">Manage Vehicle</h4>
                                        <p class="card-title-desc">Use the table below to manage vehicle both <code>edit , update and delete vehicle</code>  </p>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Vehicle Name</th>
                                                <th>Number Of Seats</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <?php
                     $cdate = date("Y-m-d");
                     $i = 1;
                     // $newDate = date("Y-m-d", strtotime($fdate));
                    // $fdatee = date("Y-m-d", strtotime($fdate));
                    $record11 = mysqli_query($conn,"SELECT id, bus_name, seat FROM buses"); // fetch data from database
                    if (mysqli_num_rows($record11) > 0) {
                    while($datas1 = mysqli_fetch_array($record11))
                      {
     
                      //  $rId = $datas['id'];
                      $name = $datas1['bus_name'];
                      $seat = $datas1['seat'];
                  ?>
                
                 <tr>
                 <td><?php echo $i; $i++; ?> </td>
                   <td><?php echo $name; ?></td> 
                   <td><?php echo $seat; ?></td>      
                   <td>
                   <a href="updatecar.php?id=<?php echo $datas1['id']; ?>"><button class="btn btn-warning"><i class="fa fa-edit" title="Edit Time">edit</i></button> </a>

                   </td>
                    <td>
                    <a href="cardelete.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to delete this vehicle ?')"> <button class="btn btn-danger">Delete</button></a>

                   </td>
                  </tr>
                      <?php
                  }
                 }else {
                   $msg = "No Result Found";

                  }
                  echo " <p style = 'font-size:20px; font-weight:bold; text-align: center; color:#FF0000; margin-top:10px'>$msg</p>
                 "; ?>
                </table>
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