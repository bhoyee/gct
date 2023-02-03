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
                                    <h4 class="mb-sm-0">Data Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Data Tables</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Default Datatable</h4>
                                        <p class="card-title-desc">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p>
                                   
        <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto table-responsive">
        <table class="table table-bordered table-hovered table-striped" id="databank">
					<thead>   
            <th></th>
            <th scope="col">Date </th>
            <th scope="col">Time</th>
            <th scope="col"> Brand </th>
            <th scope="col"> Adtype </th>        
    			</thead>
					<tbody>
                        <?php 
                           $cdate = date("Y-m-d");
                           $i = 1;
                                // $count=1;
                                // $newDate = date("Y-m-d", strtotime($fdate));
                               // $fdatee = date("Y-m-d", strtotime($fdate));
                               $record11 = mysqli_query($conn,"SELECT id, name, terminal FROM city"); // fetch data from database
                               if (mysqli_num_rows($record11) > 0) {
                               while($datas1 = mysqli_fetch_array($record11))
                                 {
                                 $name = $datas1['name'];
                                 $terminal = $datas1['terminal'];
                                ?>  
                        <tr>
                             <td>
                                <?php echo $i; $i++; ?> 
                            </td>
						    <td><?php echo $name?></td>
						    <td><?php echo $terminal?></td>
						    <td><?php echo 'hello'?></td>
						    <td><?php echo 'whas good'?></td>
						
					    </tr>
					<?php 
				    }
			    }
		    ?>
		        </tbody>       
                             
				</table>
          
			</div>
        </div>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                      
                        
                    </div> <!-- container-fluid -->
                </div>
       
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>

$(document).ready(function() {
    $('#databank').DataTable(
   
    );
});

</script>

<?php 
include('footer.php');
?>