<?php
session_start();
include_once("./model/add_order.php");
include_once("./model/add_account.php");

$phone = $_POST['customer_phone'];
$address = $_POST['address'];
$fullName = $_POST['full_name'];

$date = time();
$_SESSION['order-date'] = date("d-m-Y",time());

$_SESSION['show-cart-invoice'] = $_SESSION['cart'];
$_SESSION['show-phone-invoice'] = $_POST['customer_phone'];
$_SESSION['show-total-invoice'] =  $_POST['total_amount'];


//create new customer

if($_POST['type_of_customer'] === "new"){
    addCustomer($fullName,$phone,$address);
}


$totalAmount = $_POST['total_amount'];
$amountPaid = $_POST['amount_paid'];
unset($_POST['customer_phone'],$_POST['address'],$_POST['full_name'],$_POST['total_amount'],
$_POST['amount-paid'],$_POST['type_of_customer']);

if(addOrder($phone, $totalAmount, $amountPaid, $date)){
    //get id of new order
    include_once("./model/get_order.php");

    $orderId = getIdOfNewOrder(); 
    // insert data into order detail 
    if(isset($_SESSION['cart']) && $_SESSION['cart']){
        $cart = $_SESSION['cart'];
        foreach($cart as $item){
            extract($item);
            addOrderDetail($product_id, $quantity, $orderId);
        }
        unset($_SESSION['cart']);
    }
    // show invoice
    $_SESSION['$transaction_success'] = true;
}
else{
    $_SESSION['$transaction_success'] = false;
}

?>