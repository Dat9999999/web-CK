<?php
session_start();
$typeOfUser = $_SESSION['role'];
$info = '';
include_once("./model/check_account.php");
if($typeOfUser == "admin"){
    $info = getAdmin();
}
else{
    $info = getEmployeeByUserName($_SESSION['name']);
}
$renderInfoEmployee = '<tr>
                        <td><strong>Hình ảnh:</strong></td>
                        <td><img style = "max-width:20%; height:auto;"src="./view/asset/img/avatar/'.$info['avatar'].'" alt="Avatar" /></td>
                        <td>
                        <form action = "./model/upload_file.php" method = "post" enctype = "multipart/form-data">
                            <input type = "hidden" name = "user_name" value = "'.$info['user_name'].'">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                        </td>
                        </tr>
                        <tr>
                        <td><strong>Họ tên:</strong></td>
                        <td id="hoTen">'.$info['full_name'].'</td>
                        </tr>
                        <tr>
                        <td><strong>Mật khẩu:</strong></td>
                        <td id="matKhau">'.$info['password'].'</td>
                        </tr>';
?>
<link rel="stylesheet" href="./view/asset/css/ThongTinCaNhan.css" />
<div class="container">
      <div class="title-1">Thông Tin Cá Nhân</div>
      <table class="infor">
        <?=$renderInfoEmployee?>
      </table>
    </div>