<?php
include_once("connect_db.php");
include_once("get_purchase_history.php");
function deleteProduct($id){
    $conn = connect_db();
    if(checkOrder($id)){
        return false;
    }
    $sql = "DELETE FROM product WHERE id = ?";
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
    $stmt->bind_param("i",$id);
    
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