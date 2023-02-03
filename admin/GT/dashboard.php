<?php 
include('header.php');
include("getData.php");
$month = date('m');
$year = date('Y');
$months = date('F, Y');
//fetch data from the table
$stmt=$con->query("Select EXTRACT(MONTH From `bookdate`) AS Mon, tripChar, count(*) as num from book where EXTRACT(YEAR From `bookdate`)=$year AND paystatus='Paid' GROUP BY tripChar");
// $query = "SELECT tripChar, count(*) as num FROM book GROUP BY tripChar";  

$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);


$months = date('F, Y');
//fetch data from the table
$query= "Select SUM(price) as amount, EXTRACT(MONTH From `payDate`) AS Mon, EXTRACT(YEAR From `payDate`) AS Year from invoice where status='Paid' AND EXTRACT(YEAR From `payDate`)=$year GROUP BY EXTRACT(MONTH From `payDate`), EXTRACT(YEAR From `payDate`);";
 $querys = "SELECT gender, count(*) as number FROM tbl_employee GROUP BY gender";  
 $result = mysqli_query($conn, $query);  


    $msg = '' ;
    $msgs = '';
    $datas = '';
    $rSales = '';
    $fdate = '';
    $tdate = '';
    $status = 'Paid';
    $unpaid = 'Unpaid'; 
     //current sales
     $date = date('Y-m-d');
     $data = mysqli_query($conn, "select SUM(price) AS price from invoice where date = '$date' and status = '$status' ");
     $todaySale = mysqli_fetch_assoc($data);
     $sale = $todaySale['price'];
     if (is_null($sale)){
        $sale = 0;
     }
     //total sals
     $data2 = mysqli_query($conn, "select SUM(price) AS price from invoice where status = '$status'");
     $totalSale = mysqli_fetch_assoc($data2);
     $tSale = $totalSale['price'];
     if (is_null($tSale)){
        $tSale = 0;
     }
     

         //this month sales
         $month = date('m');
         $year = date('Y');
         $data4 = mysqli_query($conn, "Select SUM(price) as price, EXTRACT(MONTH From `payDate`) AS Mon, EXTRACT(YEAR From `payDate`) AS Year from invoice where status='Paid' AND EXTRACT(MONTH From `payDate`)=$month AND EXTRACT(YEAR From `payDate`)=$year GROUP BY EXTRACT(MONTH From `payDate`), EXTRACT(YEAR From `payDate`)");
         $monthSale = mysqli_fetch_assoc($data4);
         $mSale = $monthSale['price'];
         if (is_null($mSale)){
            $mSale = 0;
         }


     //total Unpaid sals
     $data3 = mysqli_query($conn, "select SUM(price) AS price from invoice where status = '$unpaid'");
     $totaluSale = mysqli_fetch_assoc($data3);
     $tuSale = $totaluSale['price'];
     if (is_null($tuSale)){
        $tuSale = 0;
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
                                    <h4 class="mb-sm-0">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GCT</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                                                <h4 class="mb-2">$<?php echo $tSale; ?></h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-money-dollar-circle-fill font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                            
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">This Month Sales</p>
                                                <h4 class="mb-2">$<?php echo $mSale; ?></h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-usd font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Today Sales</p>
                                                <h4 class="mb-2">$<?php echo $sale; ?></h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-currency-fill font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total Unpaid Sales</p>
                                                <h4 class="mb-2">$<?php echo $tuSale; ?></h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="ri-coins-fill font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
    
                                <div class="card">
                                    <div class="card-body pb-0">
                                    <!-- title: "Trip Information For <?php echo $months; ?>  both paid and Unpaid",  -->
                                        <h4 class="card-title">Trip Information for <?php echo $year; ?></h4>
                                    </div>
                                    <div class="card-body py-0 px-2" >
                                       <div class="apex-charts" id="columnchart_values" dir="ltr"></div>
                                        <!-- <div id="area_chart" class="apex-charts" dir="ltr"></div> -->
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                      
                                        <h4 class="card-title mb-4">Total Revenue for the year <?php echo $year; ?> </h4>

                                        
                                    </div>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
                                    <script type="text/javascript">  
                                    google.charts.load('current', {'packages':['corechart']});  
                                    google.charts.setOnLoadCallback(drawChart1);  
                                    function drawChart1()  
                                    {  
                                            var data1 = google.visualization.arrayToDataTable([  
                                                    ['Gender', 'Number'],  
                                                    <?php  
                                                     while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        $mont = $row["Mon"];
                                                        $yea = $row["Year"];
                                                        $dateObj   = DateTime::createFromFormat('!m', $mont);
                                                        $monthName = $dateObj->format('F'.', '.$yea); // March
                                                    
                                                            echo "['".$monthName."', ".$row["amount"]."],";  

                                                        }
                                                    
                                                    ?>  
                                                ]);  
                                            var options1 = {  
                                                // title: 'Percentage of Male and Female Employee',  
                                                //is3D:true,  
                                                pieHole: 0.4  
                                                };  
                                            var chart1 = new google.visualization.PieChart(document.getElementById('piechart'));  
                                            chart1.draw(data1, options1);  
                                    }  
                                    </script>  
                                    <div class="card-body py-0 px-2">
                                        <div id="piechart" style="width: 100%; height: 387px;"></div>  
                                        <!-- <div id="column_line_chart" class="apex-charts" dir="ltr"></div> -->
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
    
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="card-title mb-4">Latest Booking Transactions</h4>
    
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Booking Num</th>
                                                <th>Full Name</th>
                                                <th>Trip Type</th>
                                                <th>Book Date</th>
                                                <th>Trip Date</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead><!-- end thead -->
                                            <?php
                                            $cdate = date("Y-m-d");
                                            $i = 1;
                                            // $newDate = date("Y-m-d", strtotime($fdate));
                                        // $fdatee = date("Y-m-d", strtotime($fdate));
                                        $record1 = mysqli_query($conn,"select boidata.fullName AS fullName,book.bookdate AS bbdate, book.bookstatus AS bstatus, book.bookingCode AS bcode, book.tripChar AS tType, book.regDate AS bDate from book INNER JOIN boidata ON book.userID = boidata.userid
                                        WHERE book.regDate='$cdate';"); // fetch data from database
                                        if (mysqli_num_rows($record1) > 0) {
                                        while($datas1 = mysqli_fetch_array($record1))
                                            {
                            
                                            //  $rId = $datas['id'];
                                            $bcode = $datas1['bcode'];
                                            $fName = $datas1['fullName'];
                                            $ttype = $datas1['tType'];
                                            $rdate = $datas1['bDate'];
                                            $bbdate = $datas1['bbdate'];
                                            $bstatus = $datas1['bstatus'];
                                        
                                    
                            
                                            ?>
                                            <tr>
                                            <td><?php echo $i; $i++; ?> </td>
                                            <td><?php echo $bcode; ?></td> 
                                            <td><?php echo $fName; ?></td>
                                            <td><?php echo $ttype; ?></td>                
                                            <td><?php echo $rdate; ?></td>
                                            <td><?php echo $bbdate; ?></td>
                                            <td><?php echo $bstatus; ?></td>                    
                                            <td>
                                            <a href="adminbcancel.php?id=<?php echo $datas1['bcode']; ?>" onClick="return confirm('Are you sure you want to cancel the booking?')"> <button class="btn btn-warning" style="font-size:10px">Cancel Booking</button></a>
                                            </td>
                                                <td>
                                            <a href="adminbdelete.php?id=<?php echo $datas1['bcode']; ?>" onClick="return confirm('Are you sure you want to delete the route?')"> <button class="btn btn-danger" style="font-size:10px">Delete</button></a>
                            
                                            </td>
                                            </tr>                   
                                            <?php
                                            }
                                            }else {
                                            $msg = "No Booking Today";
                                            }
                                        
                                            ?>
                                       </table> </div>
                                            <?php 
                                            
                                            mysqli_close($conn); // Close connection ?>
                                          
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                         
                        </div>
                        <!-- end row -->
                    </div>
                    
                </div>
                <!-- End Page-content -->
                <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
<script type="text/javascript">
 
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
 
      var data = google.visualization.arrayToDataTable([
        ["Company", "No of Trips"],
        <?php
         
        foreach($rows as $key=>$value){
          echo "['".$value['tripChar']."',".$value['num']."],";
        }
        ?>
      ]);
 
//customize the chart
      var options = {
       
        width: "100%",
        height: 400,
        bar: {groupWidth: "45%"},
        legend: { position: "bottom" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(data, options);
  }
</script>
<?php 
include('dfooter.php');

?>
     