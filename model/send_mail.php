<?php
session_start();

// Hàm để tạo mã xác thực ngẫu nhiên
function generateToken() {
    return bin2hex(random_bytes(32)); // Mã xác thực có 32 ký tự
}

// Hàm để tạo liên kết đăng nhập với mã xác thực có hiệu lực trong 1 phút
function generateLoginLink($email) {
    // Tạo mã xác thực mới
    $token = generateToken();

    // Thời gian hiện tại
    $currentTime = time();

    // Thời gian hết hạn (1 phút sau thời điểm hiện tại)
    $expiryTime = $currentTime + 60;

    // Lưu thông tin mã xác thực và thời gian hết hạn vào cơ sở dữ liệu hoặc tạm thời

    // Tạo URL đăng nhập với mã xác thực
    $loginUrl = "http:localhost/web-CK/view/login.php?token=$token";

    // Gửi email thông báo với liên kết đến email của người dùng
    $subject = "Link đăng nhập trong 1 phút";
    $message = "Nhấp vào đường link sau để đăng nhập trong vòng 1 phút:\n$loginUrl";
    mail($email, $subject, $message);

    return $loginUrl;
}

function sendMail($email){
    return true;
}
?>