<?php
include_once("connect_db.php");
function getCustomer($phone){
    $sql = "SELECT * FROM customer WHERE phone = ?";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$phone);
    if(!$stmt->execute()){
        return false;
    }

    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $customer = $result->fetch_assoc();
        $conn->close();
        return $customer;
    }
    return false;
}
function getNumberCustomers(){
    $sql = "SELECT phone FROM customer";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    if(!$stmt->execute()){
        return false;
    }

    $list_nums = array();
    $result = $stmt->get_result();
    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()) {
            // Thêm thông tin vào mảng 2 chiều
            $list_nums[] = $row;
        }
        $conn->close();

    }
    return $list_nums;
}




?>