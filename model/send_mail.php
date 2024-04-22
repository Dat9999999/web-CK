<?php
session_start();

// Hàm để tạo mã xác thực ngẫu nhiên
function generateToken() {
    return bin2hex(random_bytes(32)); // Mã xác thực có 32 ký tự
}

function sendMail($email, $loginUrl){
    $subject = "Link đăng nhập trong 1 phút";
    $message = "Nhấp vào đường link sau để đăng nhập trong vòng 1 phút:\n$loginUrl";
    $header = "From: admin";
    mail($email, $subject, $message,$header);
}
?>