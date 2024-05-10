<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Giao Dịch Thành Công</title>
    <style>
        .container {
            text-align: center;
            margin-top: 100px;
        }
        .success-message {
            color: green;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            margin-right: 10px;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Kiểm tra xem có thông báo giao dịch thành công không
        $transaction_success = true; // Thay đổi thành true hoặc false tùy thuộc vào trạng thái của giao dịch
        if ($transaction_success) {
            echo '<div class="success-message">Giao dịch đã thành công!</div>
                <a onclick = showInvoice() class="btn">Xem Hóa Đơn</a>';
        } else {
            echo '<div class="error-message">Giao dịch không thành công. Vui lòng thử lại sau.</div>';
        }
        ?>
        <a href="../index.php?pg=payment" class="btn">Quay Trở Lại Trang Thanh Toán</a>
    </div>
</body>
<script>
    function showInvoice(){
        window.open("../index.php?pg=show-invoice");
    }
</script>
</html>
