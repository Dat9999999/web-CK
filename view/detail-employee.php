<?php

session_start();
include_once("./model/check_account.php");
$employee = getEmployeeByUserName($_SESSION['detail-name-staff']);
$renderInfoEmployee = '<div class="modal-content">
                          <div class = "infor-worker">
                            <h1>THÔNG TIN NHÂN VIÊN</h1><br>
                              <div class = "image"> 
                                <th><strong>Ảnh đại diện<br></strong> </th><br>     
                                <img src="'.$employee['avatar'].'" width ="15%">
                              </div>
                              <div class = "detail-infor">
                              <div class = "infor-1" style ="background-color: rgb(228, 227, 227)">        
                                <th><strong>Họ và Tên: <br></strong> '.$employee['full_name'].'</th><br>
                              </div>
                              <div class = "infor-2">
                                <th><strong>Trạng thái tài khoản: <br></strong> '.$employee['status'].'</th><br>
                              </div> 
                              <div class = "infor-1" style ="background-color: rgb(228, 227, 227)">
                                <th><strong>Tài khoản bị khóa: <br></strong>'.$employee['lock_'].'</th><br>
                              </div>
                              <div class = "infor-2">
                                <th><strong>Số sản phẩm bán được<br></strong> '.$employee['sales'].'</th><br>
                              </div>
                              </div>
                            </div>
                              <button style ="background-color:#294031" type = "submit" class="">
                              <a style = "text-decoration:none; color : #fff" href="index.php?resend-email='.$employee['email'].'">
                              Gửi lại email
                              </a></button>
                              <button>
                                <a style = "background-color:#294031; text-decoration:none; color : #fff" href="index.php?lock-or-unlock='.$employee['lock_'].'&src='.$employee['email'].'">khóa/mở khóa tài khoản</a>
                              </button>
                          <button style ="background-color:#294031" class="close">
                          <a style = "text-decoration:none; color : #fff" href = "index.php?pg=employee-manager">
                            Trở lại 
                          </a>
                          </button>
                    </div>';
  
?>
<link rel="stylesheet" href="./view/asset/css/Nhanvien.css" />
<div class="staff">

      <div class="staff-header">
        <?=$renderInfoEmployee?>
        <!-- show the detail info of staff -->
        <!-- <div id="detailModal" class="modal">
          <div class="modal-content">
            <div class = "infor-worker">
              <h1>THÔNG TIN NHÂN VIÊN</h1><br>
                <div class = "image"> 
                  <th><strong>Ảnh đại diện<br></strong> </th><br>     
                  <img src="./view/asset/img/avatar/unkown.jpg" width ="15%">
                </div>
                <div class = "detail-infor">
                <div class = "infor-1" style ="background-color: rgb(228, 227, 227)">        
                  <th><strong>Họ và Tên: <br></strong> Huỳnh Đạt</th><br>
                </div>
                <div class = "infor-2">
                  <th><strong>Trạng thái tài khoản: <br></strong> Hoạt động</th><br>
                </div> 
                <div class = "infor-1" style ="background-color: rgb(228, 227, 227)">
                  <th><strong>Tài khoản bị khóa: <br></strong>Không</th><br>
                </div>
                <div class = "infor-2">
                  <th><strong>Số sản phẩm bán được<br></strong> 200</th><br>
                </div>
                </div>
              </div>
                <button style ="background-color:#294031" type = "submit" class="">
                 <a style = "text-decoration:none; color : #fff" href="index.php?action=resend-mail">
                 Gửi lại email
                 </a></button>
            <button style ="background-color:#294031" class="close">
            <a style = "text-decoration:none; color : #fff" href = "index.php?pg=employee-manager">
              Trở lại 
            </a>
          </button>
          </div>
          </div>
        </div> -->
      </div>