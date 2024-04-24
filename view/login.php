<?php
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged']){
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="./asset/css/Login.css" />
    <link
    rel="stylesheet"
    href="./asset/font/fontawesome-free-6.5.1-web/css/all.min.css"
    />
    <script
    src="https://kit.fontawesome.com/a076d05399.js"
    crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="login">
      <!-- <div class="header">
        <h1><i class="fa-brands fa-phoenix-squadron"></i> Đăng Nhập</h1>
      </div> -->
      <div class="container">
        <div class="heading">Đăng Nhập</div>
        <form action="login.php" method = "post" class="form">
          <input
            class="input"
            type="text-user"
            name="name"
            id="text"
            placeholder="Tài Khoản"
            />
            <input
            class="input"
            type="password"
            name="password"
            id="password"
            placeholder="Mật khẩu"
            />
            <input class="login-button" name = "submit" type="submit" value="Đăng Nhập" />
            <?php
              include_once("../model/check_account.php");
              if(isset($_POST['submit']) && $_POST['submit']){

                if(checkAdmin($_POST['name'], $_POST['password'])){
                  $_SESSION['logged'] = true;

                  //xác định người dùng
                  $_SESSION['name'] = $_POST['name'];
                  
                  // Phân quyền truy cập
                  $_SESSION['role'] = "admin";

                  $_SESSION['password'] = $_POST['password'];
                }

                else{
                  $employee = checkEmployee($_POST['name'], $_POST['password']);
                  if($employee){
                    if(checkstatus($employee['status']) && unlock($employee['lock_'])){
                      $_SESSION['logged'] = true;
                      
                      //xác định người dùng
                      $_SESSION['name'] = $_POST['name'];

                      // Phân quyền truy cập 
                      $_SESSION['role'] = "employee";
                      
                      $_SESSION['password'] = $_POST['password'];
                    }
                    else {
                      echo '<h1 style = "color: red">Tài khoản của bạn chưa được kích hoạt hoặc đã bị khóa</h1>';
                    }
                  }
                }
              }

              if(isset($_SESSION['logged']) && $_SESSION['logged']){
                header('location: ../index.php');
              }
              ?>
          </form>
        </div>
        <div id="toast-container" class="toast-container"></div>
      </div>
      
      <!-- <script src="./asset/js/Login.js"></script> -->
      <script></script>
    </body>
</html>
