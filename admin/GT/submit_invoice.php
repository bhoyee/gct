<?php 
namespace FPDF;
include("connect.php");

require('vendor/fpdf/fpdf/src/Fpdf/Fpdf.php');

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




    if($stmtInvoice->execute() && $stmtStripe->execute()) {
                // Generate PDF invoice
                $pdf = new \FPDF\FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, "Booking Code: $bookingCode", 0, 1);
                $pdf->Cell(0, 10, "Customer Name: $fullName", 0, 1);
                $pdf->Cell(0, 10, "Email: $email", 0, 1);
                $pdf->Cell(0, 10, "Trip Date: $tripDate", 0, 1);
                $pdf->Cell(0, 10, "Pickup Address: $pickupAddress", 0, 1);
                $pdf->Cell(0, 10, "Dropoff Address: $dropoffAddress", 0, 1);
                $pdf->Cell(0, 10, "Invoice Date: $invoiceDate", 0, 1);
                $pdf->Cell(0, 10, "Price: $$price", 0, 1);
                $pdf->Cell(0, 10, "Tax: $$tax", 0, 1);
                $pdf->Cell(0, 10, "Total Price: $amt", 0, 1);
        
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

