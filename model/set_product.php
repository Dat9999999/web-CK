<?php
include_once("connect_db.php");

function setProduct($productName,
$catalog,
$originalPrice,
$price,
$creationalDate,
$barcode, $id){
    $conn = connect_db();
    $sql = "UPDATE product SET product_name = ? , 
    original_price = ? ,
    price = ? ,
    catalog = ? ,
    creational_date = ? ,
    barcode = ?
     WHERE id = ?";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare SQL statement
    $stmt = $conn->prepare($sql);

    
    // Check for SQL errors
    if (!$stmt) {
        die("Error: " . $conn->error);
    }



    // Bind parameters to statement
    $stmt->bind_param("siisisi",$productName, $originalPrice, $price,$catalog , $creationalDate, $barcode,$id);
    
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