<?php
include_once("set_account.php");
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

function resendMail($email){
    
    // reset expiry time 
    if(setExpiryTime(time(),$email)){
        // new link 
        $token = generateToken();
        $loginUrl = "http:localhost:8080/web-CK/index.php?token=$token";
        
        //new email
        sendMail($email, $loginUrl);
    }
}
?>