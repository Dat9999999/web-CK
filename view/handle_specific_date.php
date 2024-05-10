<?php
include_once("../model/get_order.php");


$json_data = file_get_contents('php://input');
$data = json_decode($json_data);


$reportOrder = getOrderByTime(strtotime($data->startTime),strtotime($data->endTime));
$numberOfProducts = getQuantityProductInOrder($reportOrder);
$data = array(
    "reportOrder"=>$reportOrder,
    "numberOfproducts" =>$numberOfProducts 
);
$json_res = json_encode($data);
header('Content-Type: application/json');

echo $json_res;

?>