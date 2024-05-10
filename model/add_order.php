<?php
include_once("connect_db.php");
function addOrder($phone,$totalAmount, $amountPaid, $orderDate){
    // Establish database connection
    $conn = connect_db();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL statement
    $sql = "INSERT INTO order_ (customer_phone, order_date,total_amount, amount_paid) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    
    // Check for SQL errors
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
    // Bind parameters to statement
    $stmt->bind_param("siii",$phone, $orderDate,$totalAmount, $amountPaid);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Close statement and connection
        $stmt->close();
        $conn->close();
        return true;
    } else {
        return false;
    }

}
function addOrderDetail($product_id, $quantity, $orderId){
    $conn = connect_db();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL statement
    $sql = "INSERT INTO order_detail (product_id, order_id,quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    
    // Check for SQL errors
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    // Bind parameters to statement
    $stmt->bind_param("iii",$product_id, $orderId,$quantity,);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Close statement and connection
        $stmt->close();
        $conn->close();
        return true;
    } else {
        return false;
    }
}

?>