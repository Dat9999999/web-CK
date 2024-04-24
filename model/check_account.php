<?php
include_once("connect_db.php");
// function check admin
function getAdmin(){
    $sql = "SELECT * FROM acc_admin";
    $conn = connect_db();
    $res = $conn->query($sql);
    $admin = $res->fetch_assoc();
    $conn->close();
    return $admin;
}
function checkAdmin($name , $pass){
    $admin = getAdmin();
    return strcmp($admin["user_name"] , $name) == 0 && strcmp($admin["password"] , $pass) == 0;
}


// function check employee

// this function helps admin get infomation of employee when he or she click button chi tiet
function getEmployeeByUserName($name){
    $sql = "SELECT * FROM employee WHERE user_name = ?";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$name);
    if(!$stmt->execute()){
        return false;
    }

    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $employee = $result->fetch_assoc();
        $conn->close();
        return $employee;
    }
    return false;
}

function getEmployee($name, $pass){
    $sql = "SELECT * FROM employee WHERE user_name = ? AND password = ?";
    $conn = connect_db();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$name, $pass);
    if(!$stmt->execute()){
        return false;
    }

    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $employee = $result->fetch_assoc();
        $conn->close();
        return $employee;
    }
    return false;
}

function checkEmployee($name, $pass){
    $emp = getEmployee($name, $pass);
    return  $emp;
}

function checkStatus($status){
    if(strcmp($status,"inactive") == 0){
        return false;
    }
    return true;
}
function unlock($lock_){
    if($lock_ == "yes"){
        return false;
    }
    return true;
}

?>