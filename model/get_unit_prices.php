<?php 
include_once("connect_db.php");

function getUnitPricesById($id){
    $conn = connect_db();
    $sql = "SELECT SUM(original_price *quantity) as unit_price FROM order_detail JOIN product ON order_detail.product_id = product.id
    WHERE order_id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id) ;
    if(!$stmt->execute()){
        return false;
    }
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $res = $result->fetch_assoc();
        
        return $res;
    }
    return false;
}


?>