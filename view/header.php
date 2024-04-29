<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <link
      rel="stylesheet"
      href="./view/asset/font/fontawesome-free-6.5.1-web/css/all.min.css"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./view/asset/css/" />
    <link rel="stylesheet" href="./view/asset/css/TongQuanBaoCao.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="Home">
        <div class="sidebar">
          <div class="logo">Quản Lý</div>
          <div class="menu">
            <div class="menu-item" id="home">
              <i class="fa-solid fa-house"></i>
              <a href="index.php?pg=home" class="">
                Tổng Quan 
              </a>
            </div>
            <div class="menu-item" id="sanpham">
              <i class="fas fa-cube"></i>
              <a href="index.php?pg=products">Danh sách sản phẩm</a>
            </div>
            <div class="menu-item" id="khachhang">
              <i class="fa-solid fa-money-check-dollar"></i>
              <a href="index.php?pg=customer">Thanh Toán</a>

            </div>
            <div class="menu-item" id="baocao">
              <i class="fa-regular fa-clipboard"></i>
              <a href="index.php?pg=report">Báo Cáo</a>
            </div>
            <div class="menu-item" id="baocao">
                      <i class="fa-solid fa-user"></i>
                      <a href="index.php?pg=info">Thông Tin Cá Nhân</a>
            </div>
            <?php
            if(isset($_SESSION['role']) && (strcmp($_SESSION['role'],"admin") == 0)){
              echo '<div class="menu-item" id="quanly">
              <i class="fa-solid fa-person-circle-check"></i>
              <a href="index.php?pg=employee-manager">Quản Lý Nhân Viên</a>
            </div>';
            }
            ?>
          </div>
        </div>
        <div class="header">
          <div class="title">
            <h1>Tổng Quan Báo Cáo</h1>
          </div>
          <div class="button">
            <button>
              <a href="index.php?pg=changePassword" class=""> Đổi mật khẩu</a>
            </button>
            <button>
              <a href="index.php?pg=logout" class=""> Đăng xuất</a>
            </button>
          </div>
        </div>
        <!-- Nội dung trang chủ -->
      </div>