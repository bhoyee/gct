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
                                    <h4 class="mb-sm-0">City / Terminal  Management</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Manage City</li>
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
                                    <h4 class="card-title">Add City / Terminal</h4>
                                    <p class="card-title-desc">Add and Manage City (<code>Edit and Delete City / Terminal.</code>) </p>
                                    <div>
                                    <?php
                                     if (isset($_POST['create'])){
    
                                        $city1  = trim($_POST["city1"]);
                                        $terminal1  = trim($_POST["terminal1"]);
                                  
                            
                                        $selectCus   = "select name from city where name='$city1'"; 
                                        $resultCus   = mysqli_query($conn, $selectCus);
                                        $num_row_cus = mysqli_num_rows($resultCus);
                            
                                        if($num_row_cus >0){
                            
                                            echo '<div class="alert alert-danger" role="alert">
                                            <strong>Alert!</strong> City Name already exist.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                        }else {
                            
                                        $sql = "INSERT INTO city (name, terminal) 
                                        VALUES ('$city1','$terminal1')";
                            
                                        // $sql = mysqli_query($conn, $sql3_cus);
                            
                                        if ($conn->query($sql) === TRUE) {
                                            
                                            echo '<div class="alert alert-success" role="alert">
                                            <strong>Alert!</strong> New City / Termical Created Successfully.
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
                                                <input class="form-control" type="text" name="city1" placeholder="Enter City / State Name" required>
                                            </div>
                                            
                                            <div class="mb-4">
                                                <input class="form-control" type="text" name="terminal1" placeholder="Enter Terminal Name " required>
                                            </div>
                                        
                                            <div>
                                            <button type="submit" class="btn btn-primary" name="create"><i class="fas fa-university"></i> Add City</button>
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
        
                                       
                                    <h4 class="card-title">Manage City / Terminal</h4>
                                        <p class="card-title-desc">Use the table below to manage City / Terminal <code>edit , update and delete city / terminal</code>  </p>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>    
                                        <tr>
                                                <th></th>
                                                <th>City Name</th>
                                                <th>Terminal</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <?php
                     $cdate = date("Y-m-d");
                     $i = 1;
                     // $newDate = date("Y-m-d", strtotime($fdate));
                    // $fdatee = date("Y-m-d", strtotime($fdate));
                    $record11 = mysqli_query($conn,"SELECT id, name, terminal FROM city"); // fetch data from database
                    if (mysqli_num_rows($record11) > 0) {
                    while($datas1 = mysqli_fetch_array($record11))
                      {
     
                      //  $rId = $datas['id'];
                      $name = $datas1['name'];
                      $terminal = $datas1['terminal'];
                      ?>
              
                 <tr>
                   <td><?php echo $i; $i++; ?> </td>
                   <td><?php echo $name; ?></td> 
                   <td><?php echo $terminal; ?></td>      
                   <td>
                   <a href="updatecity.php?id=<?php echo $datas1['id']; ?>"><button class="btn btn-warning"><i class="fa fa-edit" style="font-size:10px" title="Edit Time">edit</i></button> </a>

                   </td>
                    <td>
                    <a href="citydelete.php?id=<?php echo $datas1['id']; ?>" onClick="return confirm('Are you sure you want to delete  both city and terminal?')"> <button style="font-size:10px" class="btn btn-danger">Delete</button></a>
                   </td>
                  </tr>
                    <?php
                  }
                 }else {
                   $msg = "No Record Found";

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