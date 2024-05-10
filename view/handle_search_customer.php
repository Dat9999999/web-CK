<?php
include_once("../model/get_info_customer.php");
$json_data = file_get_contents('php://input');
$data = json_decode($json_data);

$customer = getCustomer($data->phone);
$json_res = json_encode($customer);
header('Content-Type: application/json');

echo $json_res;

?>