<?php
include_once("connect_db.php");
function addProduct($productName,
$catalog,
$originalPrice,
$price,
$creationalDate,
$barcode){
    $conn = connect_db();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL statement
    $sql = "INSERT INTO product (barcode , product_name, original_price, price, catalog, creational_date) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    
    // Check for SQL errors
    if (!$stmt) {
        die("Error: " . $conn->error);
    }



    // Bind parameters to statement
    $stmt->bind_param("ssiisi",$barcode, $productName, $originalPrice,$price,$catalog, $creationalDate);
    
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