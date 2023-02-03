
<?php
//include connection file
include_once("connection.php");
include_once('libs/fpdf.php');

   class PDF extends FPDF
{
// Page header
  function Header()
  {
    $date = date('F j, Y');
      // Logo
      $this->Image('assets/img/logo2.png',10,10,70);
      $this->SetFont('Arial','B',13);
      // Move to the right
      $this->Cell(80);
      // Title
      $this->Cell(80,10,$date,1,0,'C');
     $this->Ln(18);
      $this->Cell(40,10,'Total Sales Report');
      // Line break
      $this->Ln(20);


  }

  // Page footer
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);

      // Page number
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

  }
}

$db = new dbObj();
$date = date('Y-m-d');
$status = 'Paid';

  $connString =  $db->getConnstring();
  $display_heading = array('id'=>'Ref. No', 'bookingCode'=> 'Booking Number', 'date'=> 'Transaction Date', 'price'=> 'Amount ($)', 'status'=> 'Status');

  $display_heading2 = array('id'=>'Total Sales',);

  $result = mysqli_query($connString, "SELECT id, bookingCode, date, price, status FROM invoice where  status='$status'") or die("database error:". mysqli_error($connString));

  // $result = mysqli_query($connString, "SELECT id, bookingCode, price , date FROM invoice where status = '$status' ") or die("database error:". mysqli_error($connString));

  $results = mysqli_query($connString, "SELECT SUM(price) AS price FROM invoice where status = '$status' ") or die("database error:". mysqli_error($connString));

  $header = mysqli_query($connString, "SHOW columns FROM invoice");
  $header2 = mysqli_query($connString, "SHOW columns FROM invoice");

  $pdf = new PDF();
  //header
  $pdf->AddPage();
  //foter page
  $pdf->AliasNbPages();
  $pdf->SetFont('Arial','B',12);
  foreach($header as $heading) {
  $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
  }
  foreach($result as $row) {
  $pdf->Ln();
  foreach($row as $column)
  $pdf->Cell(40,12,$column,1);

  }
      $pdf->Ln();
  foreach($results as $row) {
  $pdf->Ln();
  foreach($row as $column)
  $pdf->Cell(40,12,'Total : $'.$column,1);

  }

  $pdf->Output();
?>
