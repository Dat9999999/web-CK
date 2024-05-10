<?php
include_once("connect_db.php");
function getProductByName($name){
    $sql = "SELECT * FROM product WHERE product_name = ?";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$name);
    if(!$stmt->execute()){
        return false;
    }

    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $product = $result->fetch_assoc();
        $conn->close();
        return $product;
    }
    return false;
}
function getProductByBarcode($barcode){
    $sql = "SELECT * FROM product WHERE barcode = ?";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$barcode);
    if(!$stmt->execute()){
        return false;
    }

    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $product = $result->fetch_assoc();
        $conn->close();
        return $product;
    }
    return false;
}


?>