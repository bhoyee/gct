<?php 
namespace FPDF;
include("connect.php");

require('vendor/fpdf/fpdf/src/Fpdf/Fpdf.php');
// require('PDF.php');
require 'vendor/autoload.php';

// require_once 'vendor/fpdf/fpdf/src/Fpdf/Fpdf.php';

// require_once __DIR__ . '/vendor/autoload.php';




// require 'vendor/autoload.php'; // Include the Composer autoload file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use FPDF\FPDF;

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submitInvoice'])){
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];
    $bookingCode = $_POST['bookingCode'];
    $trx_id = $_POST['trx_id'];
    $tripDate = $_POST['tripDate'];
    $pickupAddress = $_POST['pickupAddress'];
    $dropoffAddress = $_POST['dropoffAddress'];
    $invoiceDate = $_POST['invoiceDate'];
    $price = $_POST['price'];
    $tax = ($price * 0.06); // 6% tax
    $amt = $price + $tax;
    $status = 'Paid';
    $date = date('Y-m-d H:i:s');
    $ddate = date('Y-m-d');
    $payDate = $_POST['invoiceDate'];
    $p_method = 'invoice';

    // Debugging: Print received form data
    error_log("Form Data: " . print_r($_POST, true));

    // Insert into invoice table
    $invoiceQuery = "INSERT INTO invoice (bookingCode, date, price, tax, payDate, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtInvoice = $conn->prepare($invoiceQuery);
    $stmtInvoice->bind_param("ssddss", $bookingCode, $invoiceDate, $price, $tax, $payDate, $status);

    // Insert into stripe_payment table
    $stripeQuery = "INSERT INTO stripe_payment (trx_id, bookingCode, fName, email, amt, status, p_date, ddate, pmethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtStripe = $conn->prepare($stripeQuery);
    $stmtStripe->bind_param("ssssdssss", $trx_id, $bookingCode, $fullName, $email, $price, $status, $date, $ddate, $p_method);




    class PDF_Rotate extends \FPDF\FPDF {
        var $angle = 0;
    
        function Rotate($angle, $x=-1, $y=-1)
        {
            if($x==-1)
                $x=$this->x;
            if($y==-1)
                $y=$this->y;
            if($this->angle!=0)
                $this->_out('Q');
            $this->angle=$angle;
            if($angle!=0)
            {
                $angle*=M_PI/180;
                $c=cos($angle);
                $s=sin($angle);
                $cx=$x*$this->k;
                $cy=($this->h-$y)*$this->k;
                $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
            }
        }
    
        function _endpage() {
            if ($this->angle != 0) {
                $this->angle = 0;
                $this->_out('Q');
            }
            parent::_endpage();
        }
    }


    if ($stmtInvoice->execute() && $stmtStripe->execute()) {


        
        // Generate PDF invoice
        $pdf = new PDF_Rotate();

        $pdf->AddPage();
    
        // Company logo
        $pdf->Image('gct_logo.png', 10, 10, 30); // Adjust the path and dimensions as needed
    
        // Company information header
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Giddy Cruise Transportation', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 6, '200 E Pratt St Suite 4100, Baltimore, MD 21202, USA', 0, 1, 'C');
        $pdf->Cell(0, 6, 'Phone: +14432202654 , +14439855520', 0, 1, 'C');
        $pdf->Cell(0, 6, 'Email: support@giddycruisetransportation.com', 0, 1, 'C');
        $pdf->Ln(5); // Line break
    
        // Invoice title
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Paid Invoice', 0, 1, 'C');
        $pdf->Ln(10); // Line break
    
        // Invoice details table
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Booking Number:', 0);
        $pdf->Cell(0, 10, $bookingCode, 0, 1);
        $pdf->Cell(50, 10, 'Customer Name:', 0);
        $pdf->Cell(0, 10, $fullName, 0, 1);
        $pdf->Cell(50, 10, 'Email:', 0);
        $pdf->Cell(0, 10, $email, 0, 1);
        $pdf->Cell(50, 10, 'Trip Date:', 0);
        $pdf->Cell(0, 10, $tripDate, 0, 1);
        $pdf->Cell(50, 10, 'Pickup Address:', 0);
        $pdf->Cell(0, 10, $pickupAddress, 0, 1);
        $pdf->Cell(50, 10, 'Dropoff Address:', 0);
        $pdf->Cell(0, 10, $dropoffAddress, 0, 1);
        $pdf->Cell(50, 10, 'Invoice Date:', 0);
        $pdf->Cell(0, 10, $invoiceDate, 0, 1);
        $pdf->Cell(50, 10, 'Price:', 0);
        $pdf->Cell(0, 10, '$' . number_format($price, 2), 0, 1);
        $pdf->Cell(50, 10, 'Tax(6%):', 0);
        $pdf->Cell(0, 10, '$' . number_format($tax, 2), 0, 1);
        $pdf->Cell(50, 10, 'Total Price:', 0);
        $pdf->Cell(0, 10, '$' . number_format($amt, 2), 0, 1);
    
        // Add footer
        $pdf->SetY(200); // Position at 2 cm from bottom
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(0, 10, 'www.giddycruisetransportation.com', 0, 0, 'C');



            // Add watermark
        $pdf->SetFont('Arial', 'B', 50);
        $pdf->SetTextColor(230, 230, 230); // Light gray color
        $pdf->Rotate(45,55,190);
        $pdf->Text(55,190, 'Giddy Cruise Transport');
        $pdf->Rotate(0); // Reset rotation
    
        // Save the PDF to a file
        $pdfFilePath = "invoices/invoice_$bookingCode.pdf";
        $pdf->Output('F', $pdfFilePath);
    
        
                // Send email with PDF attachment
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();
                    // $mail->SMTPDebug = 2;
                    $mail->Host = 'mail.giddycruisetransportation.com'; // Set the SMTP server to send through
                    $mail->SMTPAuth = true;
                    $mail->Username = 'noreply@giddycruisetransportation.com'; // SMTP username
                    $mail->Password = 'Samaravictor@1'; // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

                    $mail->Port = 465;
        
                    //Recipients
                    $mail->setFrom('noreply@giddycruisetransportation.com', 'Giddy Cruise Transportation');
                    $mail->addAddress($email, $fullName);
                    $mail->addAddress('support@giddycruisetransportation.com'); // Add admin email for copy
        
                    // Attachments
                    $mail->addAttachment($pdfFilePath);
        
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Payment Paid Receipt';
                    $mail->Body = "Dear $fullName,<br><br>Thank you for your payment. Attached is your payment receipt.<br><br>Best regards,<br>Giddy Transport";
        
                    $mail->send();
                    echo "<script>
                            alert('Records added successfully and email sent.');
                            window.location.href = 'dashboard.php'; // Redirect to a relevant page
                          </script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "<script>
                        alert('Error: " . $stmtInvoice->error . " - " . $stmtStripe->error . "');
                      </script>";
            }
        
            $stmtInvoice->close();
            $stmtStripe->close();
            $conn->close();

            
        }
        ?>

