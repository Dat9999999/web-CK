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



?>