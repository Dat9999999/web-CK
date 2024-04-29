<?php
include_once("connect_db.php");
function getOrder($phone){
    $conn = connect_db();
    $sql = "SELECT * FROM order_ WHERE customer_phone = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$phone);
    if(!$stmt->execute()){
        return false;
    }

    $arrOrder = array();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $arrOrder[] = $row;
        }
        $conn->close();
        return $arrOrder;
    }
    return false;
}
function getOrderDetail($phone){
    $conn = connect_db();
    $sql = "SELECT order_id,product_name,quantity,price FROM order_detail JOIN order_ ON order_detail.order_id = order_.id
    JOIN product ON order_detail.barcode = product.barcode
    WHERE customer_phone = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$phone);
    if(!$stmt->execute()){
        return false;
    }

    $arrOrder = array();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $arrOrder[] = $row;
        }
        $conn->close();
        return $arrOrder;
    }
    return false;
}
?>