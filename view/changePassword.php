<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="./asset/css/Register.css" />
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
      <div class="header">
        <h1><i class="fa-brands fa-phoenix-squadron"></i> Đổi mật khẩu</h1>
      </div>
      <div class="container">
        <div class="heading">Đổi mật khẩu</div>
        <form action="changePassword.php" method = "post" class="form">
          <input
          required=""
          class="input"
          type="text"
          name="name"
          id="text"
          value="<?php echo $_SESSION['name']?>"
          />
          <input
          required=""
          class="input"
          type="password"
          name="newPassword"
          id="password"
          placeholder="Mật khẩu mới"
          />
          <input
          required=""
          class="input"
          type="password"
          name="re-password"
          id="re-password"
          placeholder="Xác nhận lại mật khẩu"
          />
          <input class="login-button" name = "submit" type="submit" value="Thay đổi" />
        </form>
        <?php
            include_once("../model/update_password.php");
            if(isset($_POST['submit']) && $_POST['submit']){
              if(strcmp($_SESSION['name'],"admin") == 0){
                    if(update_passwordAdmin($_SESSION['name'],$_POST['newPassword'])){
                      // change pass successfully
                        $_SESSION['change-password']= true;
                      }
                      else{
                        echo '<p>change pass failure</p>';
                      }
                    }else{
                      if(update_passwordEmployee($_SESSION['name'],$_POST['newPassword'])){
                    // change pass successfully
                    $_SESSION['change-password']= true;
                  }
                  else{
                    echo '<p>change pass failure</p>';
                  }
                }
                if(isset($_SESSION['change-password']) && $_SESSION['change-password']){
                  if($_SESSION['employee-inactive']){
                    include_once("../model/set_account.php");
                    set_status($_SESSION['name']);
                  }
                  header("location: ../index.php");
                }
              }
            ?>
      </div>
    </div>
  </body>
  </html>
  