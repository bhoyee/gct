<?php 
include("connect.php");

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
    $totalPrice = $price + $tax;
    $status = 'Paid';
    $date = date('Y-m-d H:i:s');
    $payDate = $_POST['invoiceDate'];
    $p_method = 'invoice';

    // Debugging: Print received form data
    error_log("Form Data: " . print_r($_POST, true));

    // Insert into invoice table
    $invoiceQuery = "INSERT INTO invoice (bookingCode, date, price, tax, payDate, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtInvoice = $conn->prepare($invoiceQuery);
    $stmtInvoice->bind_param("ssddss", $bookingCode, $invoiceDate, $price, $tax, $payDate, $status);

    // Insert into stripe_payment table
    $stripeQuery = "INSERT INTO stripe_payment (trx_id, bookingCode, fName, email, amt, status, p_date, pmethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtStripe = $conn->prepare($stripeQuery);
    $stmtStripe->bind_param("ssssssss", $trx_id, $bookingCode, $fullName, $email, $totalPrice, $status, $date, $p_method);

    if($stmtInvoice->execute() && $stmtStripe->execute()) {
        echo "<script>
                alert('Records added successfully.');
                window.location.href = 'index.php'; // Redirect to a relevant page
              </script>";
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
