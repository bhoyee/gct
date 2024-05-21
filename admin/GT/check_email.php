<?php 
include("connect.php");

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['email'])){
    $email = $_POST['email'];

    // Prepare and execute query using prepared statements
    $stmt = $conn->prepare("SELECT fullName FROM boidata WHERE email = ?");
    $stmt->bind_param("s", $email);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $fullName = $row['fullName'];
            echo json_encode(['status' => 'found', 'fullName' => $fullName]); // Return customer's full name
        } else {
            echo json_encode(['status' => 'not_found']);
        }
    } else {
        echo json_encode(['status' => 'query_failed', 'error' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
