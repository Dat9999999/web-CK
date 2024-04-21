<?php
include_once("connect_db.php");

function update_password($sql,$name, $newPassword ){
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newPassword, $name);
    return $stmt->execute();
}
function update_passwordAdmin($name, $newPassword){
    $sql = 'UPDATE acc_admin SET password = ? WHERE acc_admin.user = ?';
    return update_password($sql,$name, $newPassword);
}
?>