<?php  
 $connect = mysqli_connect("localhost", "root", "", "gt");  
 $month = date('m');
$months = date('F, Y');
//fetch data from the table
$query= "Select SUM(price) as amount, EXTRACT(MONTH From `payDate`) AS Mon from invoice where status='Paid' GROUP BY EXTRACT(MONTH From `payDate`), EXTRACT(YEAR From `payDate`);";
 $querys = "SELECT gender, count(*) as number FROM tbl_employee GROUP BY gender";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          $mmonths = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                     
                          
                          while($row = mysqli_fetch_array($result))  
                          {  
                            $mont = $row["Mon"];
                            $dateObj   = DateTime::createFromFormat('!m', $mont);
                            $monthName = $dateObj->format('M'); // March
                          
                                echo "['".$monthName."', ".$row["amount"]."],";  

                            }
                        
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Male and Female Employee',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>