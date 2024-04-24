<?php
include_once("connect_db.php");
function getEmployees(){
    $conn = connect_db();
    $sql = "SELECT full_name,avatar,lock_,status,user_name,password FROM employee";
    $result = $conn->query($sql);

    $listEmployee = array();

    // Kiểm tra xem có dữ liệu trả về không
    if ($result->num_rows > 0) {
        // Khởi tạo mảng 2 chiều để lưu trữ thông tin
        
        // Lặp qua từng hàng dữ liệu
        while($row = $result->fetch_assoc()) {
            // Thêm thông tin vào mảng 2 chiều
            $listEmployee[] = array(
                'fullName' => $row['full_name'],
                'avatar' => $row['avatar'],
                'lock_' => $row['lock_'],
                'status' => $row['status'],
                'userName' => $row['user_name'],
                'password' => $row['password']
            );
        }
        $conn->close();
    } 
    return $listEmployee;
}
?>