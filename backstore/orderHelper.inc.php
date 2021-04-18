<?php 

require_once '../xml_database/simplexml_orders.php';

$orderList = getOrders();
$orderList = json_decode(json_encode((array)$orderList), TRUE)["order"];

$order_id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

if ($action=="delete")
{
    $index = 0;
    foreach($orderList as $item) {
        if($item["@attributes"]["id"]==$order_id){
            array_splice($orderList, $index, 1);
            break;
        }
        $index++;
    }
    writeOrders($orderList);
}
