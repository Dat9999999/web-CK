<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoa don</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Hoa Don</h2>
    <h3>So dien thoai khach hang: <?=$_SESSION['show-phone-invoice']?></h3>
    <h4>Ngay giao dich <?=$_SESSION['order-date']?></h4>
    <table>
        <thead>
            <tr>
                <th>san pham</th>
                <th>Gia</th>
                <th>So Luong</th>
                <th>Tong</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($_SESSION['show-cart-invoice'] as $item){
                extract($item);
                echo '<tr>
                        <td>'.$product_name.'</td>
                        <td>'.$price.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.$total.'</td>
                    </tr>';
            }
            
            
            ?>
            <tr>
                <td colspan="3">Tong Cong</td>
                <td><?=$_SESSION['show-total-invoice']?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
