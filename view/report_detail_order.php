<?php 
include_once("./model/get_purchase_history.php");
$_SESSION['order-detail'] = getOrderDetailByOrderId($_SESSION['order-id']);
$renderDetailOrder = "";
foreach($_SESSION['order-detail'] as $item){
    extract($item);
    $renderDetailOrder .= '<tr>
                                <td>'.$product_name.'</td>
                                <td>'.$quantity.'</td>
                                <td>'.$price.'</td>
                            </tr>';
} 
?>

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

.content {
    margin-left: 166px;
    margin-top: 62px;
}

.back-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
    cursor: pointer;
}

.back-btn:hover {
    background-color: #45a049;
}
</style>


<div class="content">
    <h2>Chi tiết đơn hàng</h2>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá bán 1 sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            <?=$renderDetailOrder?>
        </tbody>
    </table>

    <a href="index.php?pg=report&select-time=" class="back-btn">Quay về</a>

</div>