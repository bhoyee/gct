<?php
   include('session.php');
   include("connect.php");

   include("connection.php");
require('invoicepdf.php');
   $msg ='';

$bnumb =    $_SESSION['bnumb']; //trigger button click
  $date = date('Y-m-d H:i:s');
  $status = "Paid";
  // $prcie = mysqli_real_escape_string($conn, $_POST['price']);


$records = mysqli_query($conn,"select * from book where bookingCode = '$bnumb'"); // fetch data from database
 if (mysqli_num_rows($records) > 0) {

  while($data = mysqli_fetch_array($records))
      {

        $bookingCode = $data;
        $bookCode = $bookingCode['bookingCode'];
        $msg = " No Paid Invoice Generated For this Passanger";


            $getPrice = mysqli_query($conn,"select * from invoice where bookingCode = '$bnumb' and status = '$status' ORDER BY date DESC");


            if (mysqli_num_rows($getPrice) > 0) {
              while($price = mysqli_fetch_array($getPrice))
                  {
                    $tfare =  $price;
                    // $suc = "Records added successfully.";
                    $qry2= "select boidata.fullName AS fullName, boidata.gender AS gender, boidata.phone AS phone, book.bookingCode AS bCode, book.tripChar AS tChar, book.route AS route, 
                    book.bookdate AS depDate, book.time AS time, book.seat AS seat, book.returnD AS rDate, book.returnD AS returnD, book.email AS email, book.airport AS airport,book.triptype AS ttipe,book.location AS location, 
                    book.paddress AS pAddress, book.daddress AS dAddress, book.nAdlut AS nAldult,book.nChild AS nChild, book.regDate AS regDate from book INNER JOIN boidata ON book.userid=boidata.userid
                     WHERE bookingCode = '$bnumb'";
                    $result2= mysqli_query($conn,$qry2);
                    $data =mysqli_fetch_array($result2);
                    $tt= $data['tChar'];


                    $cuDate = date('Y-m-d');

                    if($tt == 'Inter-State'){
                      $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
                      $db = new dbObj();
                      $connString =  $db->getConnstring();
                     $pdf->AddPage();
                     $pdf->addSociete( "Giddy Cruise Transport",
                                       "10 Cinnamon Cir\n" .
                                       "Randallstown\n".
                                       "MD 21133\n" .
                                       "USA ");
                      $pdf->fact_dev( "Trip ", "Paid Receipt" );
                     $pdf->temporaire( "Giddy Cruise Transport" );
                     $pdf->addDate( $cuDate);
 
                     $pdf->addPageNumber("1");
                     $pdf->addClientAdresse($data['fullName']."\n".$data['email'] );
 
                     // "Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS"
                     $pdf->addReglement("Cash/ Stripe/ Zelle/ CashApp/ Paypal");
                     $pdf->addEcheance($cuDate);
                     $pdf->addNumTVA($price['bookingCode']);
 
                     $cols=array( "REFERENCE"    => 23,
                                  "DESCRIPTION"  => 82,
                                  "DUE AMOUNT"     => 26,
                                  "DATE"      => 26,
                                  "PAID AMOUNT" => 30
                               );
                     $pdf->addCols( $cols);
                     $cols=array( "REFERENCE"    => "L",
                                  "DESCRIPTION"  => "L",
                                  "DUE AMOUNT"     => "C",
                                  "DATE"      => "R",
                                  "PAID AMOUNT" => "R");
                     $pdf->addLineFormat( $cols);
                     $pdf->addLineFormat($cols);
 
                     $y    = 109;
                     $routes = $data['route'];
                     $str_arr = explode (",", $routes); 
                     
                     $line = array( "REFERENCE"=>$price['id'],
                                            "DESCRIPTION"=>"Trip From : ".$str_arr[0] .' '.'To: '.' '. $str_arr[1]."\n"."\n"." Trip Date: ".$data['depDate']. "  "."Trip Time: ".$data['time']."\n"."\n"."Trip Type : ".$data['tChar'],
                                           "DUE AMOUNT"=> $price['price']." USD",
                                           "DATE"=> $price['date'],
                                    "PAID AMOUNT" => $price['price']." USD");
                    }
                    elseif($tt == 'Airport-Chater'){
                      $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
                      $db = new dbObj();
                      $connString =  $db->getConnstring();
                     $pdf->AddPage();
                     $pdf->addSociete( "Giddy Cruise Transport",
                                       "10 Cinnamon Cir\n" .
                                       "Randallstown\n".
                                       "MD 21133\n" .
                                       "USA ");
                     $pdf->fact_dev( "Trip ", "Paid Receipt" );
                     $pdf->temporaire( "Giddy Cruise Transport" );
                     $pdf->addDate( $cuDate);
 
                     $pdf->addPageNumber("1");
                     $pdf->addClientAdresse($data['fullName']."\n".$data['email'] );
 
                     // "Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS"
                     $pdf->addReglement("Cash/ Stripe/ Zelle/ CashApp/ Paypal");
                     $pdf->addEcheance($cuDate);
                     $pdf->addNumTVA($price['bookingCode']);
 
                     $cols=array( "REFERENCE"    => 23,
                                  "DESCRIPTION"  => 82,
                                  "DUE AMOUNT"     => 26,
                                  "DATE"      => 26,
                                  "PAID AMOUNT" => 30
                               );
                     $pdf->addCols( $cols);
                     $cols=array( "REFERENCE"    => "L",
                                  "DESCRIPTION"  => "L",
                                  "DUE AMOUNT"     => "C",
                                  "DATE"      => "R",
                                  "PAID AMOUNT" => "R");
                     $pdf->addLineFormat( $cols);
                     $pdf->addLineFormat($cols);
 
                     $y    = 109;
                     $line = array( "REFERENCE"=>$price['id'],
                                            "DESCRIPTION"=>"Trip Type : ".$data['ttipe']."\n"."\n"."Trip From/To : ".$data['airport']."\n"."\n"."To/From :  ".$data['location']."\n"."\n"."Passangers :"."\n"."\n"." Adult: ".$data['nAldult']. "  "."Children: ".$data['nChild'],
                                           "DUE AMOUNT"=> $price['price']." USD",
                                           "DATE"=> $price['date'],
                                    "PAID AMOUNT" => $price['price']." USD");
                    }
                    elseif($tt == 'Point-Point'){
                      $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
                      $db = new dbObj();
                      $connString =  $db->getConnstring();
                     $pdf->AddPage();
                     $pdf->addSociete( "Giddy Cruise Transport",
                                       "10 Cinnamon Cir\n" .
                                       "Randallstown\n".
                                       "MD 21133\n" .
                                       "USA ");
                      $pdf->fact_dev( "Trip ", "Paid Receipt" );
                     $pdf->temporaire( "Giddy Cruise Transport" );
                     $pdf->addDate( $cuDate);
 
                     $pdf->addPageNumber("1");
                     $pdf->addClientAdresse($data['fullName']."\n".$data['email'] );
 
                     // "Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS"
                     $pdf->addReglement("Cash/ Stripe /Zelle/ CashApp/ Paypal");
                     $pdf->addEcheance($cuDate);
                     $pdf->addNumTVA($price['bookingCode']);
 
                     $cols=array( "REFERENCE"    => 23,
                                  "DESCRIPTION"  => 82,
                                  "DUE AMOUNT"     => 26,
                                  "DATE"      => 26,
                                  "PAID AMOUNT" => 30
                               );
                     $pdf->addCols( $cols);
                     $cols=array( "REFERENCE"    => "L",
                                  "DESCRIPTION"  => "L",
                                  "DUE AMOUNT"     => "C",
                                  "DATE"      => "R",
                                  "PAID AMOUNT" => "R");
                     $pdf->addLineFormat( $cols);
                     $pdf->addLineFormat($cols);
 
                     $y    = 109;
                     $line = array( "REFERENCE"=>$price['id'],
                                            "DESCRIPTION"=>"Trip From : ".$data['pAddress']."\n"."\n"."To :  ".$data['daddress']."\n"."\n"."Passangers :"."\n"."\n"." Adult: ".$data['nAldult']. "  "."Children: ".$data['nChild']."\n"."\n"."Trip Type : ".$data['tChar'],
                                           "DUE AMOUNT"=> $price['price']." USD",
                                           "DATE"=> $price['date'],
                                    "PAID AMOUNT" => $price['price']." USD");

                    }


                   
                    $size = $pdf->addLine( $y, $line );
                    $y   += $size + 2;



                    $tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                                        array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
                    $tab_tva = array( "1"       => 19.6,
                                      "2"       => 5.5);

                    $pdf->Output();

                 }
               }
              }
        } else {
                $msg = "No Booking Found";
        }


?>
<?php mysqli_close($conn); // Close connection ?>
