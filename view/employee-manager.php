<?php
session_start();
include_once("./model/get_List_employee.php");
$listEmployee = getEmployees();
$renderListEmployee = '';
foreach($listEmployee as $item){
  extract($item);
  $renderListEmployee .= '<tr>
                            <th style = "background-color:#e4e3e3; color : #000">'.$fullName.'</th>
                            <th style = "background-color:#e4e3e3; color : #000"><img src="./view/asset/img/avatar/'.$avatar.'" width ="15%"></th>
                            <th style = "background-color:#e4e3e3; color : #000">'.$status.'</th>
                            <th style = "background-color:#e4e3e3; color : #000">'.$lock_.'</th>
                          
                            <th style = "background-color:#e4e3e3; color : #000">
                              <button>
                                <a style = "background-color:#294031; text-decoration:none; color : #fff" href="index.php?pg=detail-employee&detail-employee='.$userName.'">chi tiết</a>
                              </button>
                            </th>
                          </tr>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      rel="stylesheet"
      href="./asset/font/fontawesome-free-6.5.1-web/css/all.min.css"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <!-- <link rel="stylesheet" href="./view/asset/css/home.css" /> -->
    <link rel="stylesheet" href="./view/asset/css/Nhanvien.css" />
  </head>
  <body>
    <!-- ------------->
    <div class="staff">
      <h2>Danh sách nhân viên</h2>

      <div class="staff-header">
        <!-- <label class="staff-item">Tìm Kiếm:</label>
        <input
          placeholder="Tìm Kiếm"
          type="text"
          name="text"
          class="input_search"
        />
        <button class="staff-button">Tìm Kiếm</button> -->

        <button class="staff-btnadd" style="margin-left: 80%" onclick= addStaff()>Thêm Nhân Viên</button>

        <form action = "index.php?pg=add-staff" method = "post" id="addstaffForm" class="add-staff-form">
          <label for="">Thêm Nhân Viên</label><br />
          <!-- <input type="file" id="imgUrl" /> -->
          <input required name = "staff-name" type="text" id="Name" placeholder="Name" />
          <input required name = "staff-email" type="email" id="Email" placeholder="Email"/>
          
          <input type="hidden" name = "btn-add-staff" value ="1">
          <button type="submit">Thêm Nhân Viên</button>
        </form>


        
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
        </div> -->




        <!-- <form id="editStaffForm" class="edit-staff-form">
          <label for="">Sửa nhân viên</label><br />
          <input type="file" id="imgUrl" />

          <input type="text" id="EditName" placeholder="Tên" />
          <input type="text" id="EditCountry" placeholder="Quê quán" />
          <input type="text" id="EditPosition" placeholder="Chức vụ" />
          <input type="text" id="EditAge" placeholder="Tuổi" />
          <button type="submit">Lưu</button>
        </form> -->

        <table class="staff-list">
          <thead>
            <tr>
              <th>Họ tên</th>
              <th>avtar</th>
              <th>Trạng thái</th>
              <th>Khóa</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody class="staff-list-body" id="staffListBody">
            <?=$renderListEmployee?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript -->
    <script src="./view/asset/js/Home.js"></script>
    <script src="./view/asset/js/Nhanvien.js"></script>
  </body>
</html>
