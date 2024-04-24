<?php

include_once("connect_db.php");
include_once("set_account.php");

$target_dir = "../view/asset/img/avatar/"; // Thư mục để lưu trữ tệp tải lên
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // Đường dẫn đầy đủ đến tệp tải lên
$uploadOk = 1; // Biến để kiểm tra nếu tải lên thành công

if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
//update path 
    if($_POST['user_name'] == "admin"){
        uploadAvatarAdmin("admin",basename($_FILES["fileToUpload"]["name"]));
    }
    else{
        uploadAvatarEmployee($_POST['user_name'],basename($_FILES["fileToUpload"]["name"]));
    }
    header("location: ../index.php?pg=info");
}
else{
    echo 'có lỗi';
}  
?>