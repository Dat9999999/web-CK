<?php
include_once("connect_db.php");
include_once("check_account.php");

function set_status($userName){
    $conn = connect_db();
    $sql = "UPDATE employee SET status = 'active' WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$userName);
    if(!$stmt->execute()){
        return false;
    }
    $conn->close();
    return true;
}

function setExpiryTime($currTime,$email){
    $conn = connect_db();
    $sql = "UPDATE employee SET expiry_time = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $expiry_time = $currTime + 60;
    $stmt->bind_param("is",$expiry_time,$email);
    if(!$stmt->execute()){
        return false;
    }
    $conn->close();
    return true;
}
function uploadAvatar($sql,$avatar,$user_name){
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$avatar,$user_name);
    if(!$stmt->execute()){
        return false;
    }
    $conn->close();
    return true;
}
function uploadAvatarEmployee($user_name,$avatar){
    $sql = "UPDATE employee SET avatar = ? WHERE user_name = ?";
    uploadAvatar($sql,$avatar,$user_name);
}
function uploadAvatarAdmin($user_name,$avatar){
    $sql = "UPDATE acc_admin SET avatar = ? WHERE user_name = ?";
    uploadAvatar($sql,$avatar,$user_name);
}
function setLockOrUnlock($lock_, $email){
    $conn = connect_db();
    $sql = "UPDATE employee SET lock_ = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);

    $lock = "yes";
    $unlock = "no";
    
    // lock account if it is unlock 
    if($lock_ == $lock){
        $stmt->bind_param("ss",$unlock,$email);
    }
    // orthewise
    else{
        $stmt->bind_param("ss",$lock,$email);
    }
    if(!$stmt->execute()){
        return false;
    }
    $conn->close();
    return true;
}
?>