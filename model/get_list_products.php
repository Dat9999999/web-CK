<?php
include_once("connect_db.php");
function getListProducts(){
    $conn = connect_db();
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    $listPro = array();

    // Kiểm tra xem có dữ liệu trả về không
    if ($result->num_rows > 0) {
        // Khởi tạo mảng 2 chiều để lưu trữ thông tin
        
        // Lặp qua từng hàng dữ liệu
        while($row = $result->fetch_assoc()) {
            // Thêm thông tin vào mảng 2 chiều
            $listPro[] = array(
                'productName' => $row['product_name'],
                'barcode' => $row['barcode'],
                'id' =>$row['id'],
                'originalPrice' => $row['original_price'],
                'price' => $row['price'],
                'catalog' => $row['catalog'],
                'creationalDate' => $row['creational_date']
            );
        }
        $conn->close();
    } 
    return $listPro;
}

?>