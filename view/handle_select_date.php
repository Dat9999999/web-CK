<?php
include_once("../model/get_order.php");
session_start();


$json_data = file_get_contents('php://input');
$data = json_decode($json_data);

$date =$data->date;

switch($date){
    case 'today':
        $currTime = time();
        // Lấy thời gian bắt đầu 
        $startTime = strtotime('today', $currTime);

        // Lấy thời gian kết thúc 
        $endTime = strtotime('tomorrow', $startTime) - 1;

        break;

    case 'yesterday':
        $currTime = time();
        // Lấy thời gian bắt đầu là 1 tháng trước
        $startTime = strtotime('-1 day', $currTime);
        $endTime = $currTime;
        // Lấy thời gian kết thúc 

        break;

    case 'last-7-days':
        $currTime = time();
        // Lấy thời gian bắt đầu 
        $startTime = strtotime('-7 days', $currTime);

        // Lấy thời gian kết thúc 
        $endTime = $currTime;
        break;

    case 'this-month':
        $currTime = time();
        // Lấy thời gian bắt đầu 
        $startTime = strtotime('-1 month', $currTime);

        // Lấy thời gian kết thúc 
        $endTime = $currTime;
        break;
    default:
        break;
        
    }


$reportOrder = getOrderByTime($startTime,$endTime);
$numberOfProducts = getQuantityProductInOrder($reportOrder);

$data = array(
    "reportOrder"=>$reportOrder,
    "numberOfproducts" => $numberOfProducts
);
$json_res = json_encode($data);
header('Content-Type: application/json');

echo $json_res;


?>