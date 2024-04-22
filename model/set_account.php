<?php
include_once("connect_db.php");

function set_status($userName){
    $conn = connect_db();
    $sql = "UPDATE employee SET status = 'active' WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$userName);
    if(!$stmt->execute()){
        return false;
    }
    return true;
}



?>