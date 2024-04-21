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
    return strcmp($admin["user"] , $name) == 0 && strcmp($admin["password"] , $pass) == 0;
}


// function check employee


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
        return $employee;
    }
    return false;
}

function checkEmployee($name, $pass){
    $emp = getEmployee($name, $pass);
    return  $emp;
}

function checkStatus($name){

    return true;
}

?>