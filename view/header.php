<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <link
      rel="stylesheet"
      href="./asset/font/fontawesome-free-6.5.1-web/css/all.min.css"
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
            <div class="menu-item" id="quanly">
              <i class="fa-solid fa-person-circle-check"></i>
              <a href="index.php?pg=employee-manager">Quản Lý Nhân Viên</a>
            </div>
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