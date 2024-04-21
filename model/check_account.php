<?php
include_once("connect_db.php");
function getAdmin(){
    $sql = "SELECT * FROM acc_admin";
    $conn = connect_db();
    $res = $conn->query($sql);
    $admin = $res->fetch_assoc();
    return $admin;
}
function checkAdmin($name , $pass){
    $admin = getAdmin();
    return strcmp($admin["user"] , $name) == 0 && strcmp($admin["password"] , $pass) == 0;
}
?>