<?php
include_once("connect_db.php");
include_once("get_unit_prices.php");
function getIdOfNewOrder(){
    $sql = "SELECT MAX(id) as order_id FROM order_  ";
    $conn = connect_db();


    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $id = $result->fetch_assoc();
        $conn->close();
        return $id['order_id'];
    }
    return false;
}
function getOrderByTime($startTime,$endTime){
    $sql = "SELECT 	id,order_date,total_amount FROM order_ WHERE order_date BETWEEN  ? AND ?";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$startTime,$endTime);
    if(!$stmt->execute()){
        return false;
    }
    $list_order = [];
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            // Thêm thông tin vào mảng 2 chiều
            $unitPrices = getUnitPricesById($row['id']);
            $list_order[] = array(
                'id' =>$row['id'],
                'order_date'=>$row['order_date'],
                'total_amount' => $row['total_amount'],
                'unit_prices'=> $unitPrices
            );
        }
        $conn->close();
        return $list_order;
    }
    return false;
}

function getQuantityProductInOrder($order){
    $arrId = [];
    foreach($order as $item){
        extract($item);
        $arrId[] = $id;
    }

    $strId = join(", ", $arrId);
    
    $sql = "SELECT COUNT(DISTINCT id) AS total FROM order_detail WHERE order_id IN (?)";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$strId);

    if(!$stmt->execute()){
        return false;
    }
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $number = $result->fetch_assoc();
        $conn->close();
        return $number['total'];
    }
    return false;

}
?>