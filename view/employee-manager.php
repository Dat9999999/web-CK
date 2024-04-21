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
    <link rel="stylesheet" href="./view/asset/css/home.css" />
    <link rel="stylesheet" href="./view/asset/css/Nhanvien.css" />
  </head>
  <body>
    <!-- Home -->
    <div class="Home">
      <div class="sidebar">
        <div class="logo">Quản Lý</div>
        <div class="menu">
          <div class="menu-item" id="home">
            <i class="fa-solid fa-house"></i>
            Tổng Quan
          </div>
          <div class="menu-item" id="sanpham">
            <i class="fas fa-cube"></i> Sản Phẩm
          </div>
          <div class="sub-menu-container" id="sanpham-submenu">
            <div class="sub-menu-item">
              <a href="./view/product.html">Danh sách sản phẩm</a>
            </div>
            <div class="sub-menu-item">Danh mục sản phẩm</div>
          </div>
          <div class="menu-item" id="khachhang">
            <i class="fa-solid fa-user"></i> Khách Hàng
          </div>
          <div class="menu-item" id="baocao">
            <i class="fa-regular fa-clipboard"></i> Báo Cáo
          </div>
          <div class="sub-menu-container" id="baocao-submenu">
            <div class="sub-menu-item">Tổng quan báo cáo</div>
            <div class="sub-menu-item">Danh Sách Báo Cáo</div>
          </div>
          <div class="menu-item" id="baocao">
            <i class="fa-solid fa-person-circle-check"></i> Quản Lý Nhân Viên
          </div>
        </div>
      </div>
      <div class="header">
        <div class="title">
          <h1>Quản Lý Nhân Viên</h1>
        </div>

        <div class="button">
          <button>Đăng Nhập</button>
        </div>
      </div>
      <!-- Nội dung trang chủ -->
    </div>

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

        <button class="staff-btnadd" onclick= addStaff()>Thêm Nhân Viên</button>

        <form action = "add-staff.php" method = "post" id="addstaffForm" class="add-staff-form">
          <label for="">Thêm Nhân Viên</label><br />
          <input type="file" id="imgUrl" />
          <input type="text" id="Name" placeholder="Name" />
          <input type="email" id="Email" placeholder="Email"/>
          
          <button type="submit">Thêm Nhân Viên</button>
        </form>

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
              <th>Email</th>
              <th>avtar</th>
            </tr>
          </thead>
          <tbody class="staff-list-body" id="staffListBody">
            <tr>
              <th>Huynh Dat</th>
              <th>123@gmail.com</th>
              <th><img src="./asset/img/avatar/unkown.jpg" width ="100%"></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript -->
    <script src="./view/asset/js/Home.js"></script>
    <script src="./view/asset/js/Nhanvien.js"></script>
  </body>
</html>
