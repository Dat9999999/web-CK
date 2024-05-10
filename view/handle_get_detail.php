<?php
include_once("../model/get_purchase_history.php");


$json_data = file_get_contents('php://input');
$data = json_decode($json_data);


$res = getOrderDetailByOrderId($data->id);


$json_res = json_encode($res);
header('Content-Type: application/json');

echo $json_res;

?>