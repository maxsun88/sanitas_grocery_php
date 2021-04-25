<?php

require_once '../xml_database/simplexml_orders.php';

$orderList = getOrders();

$order_id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

if($action=="delete"){
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
if($action=="insert"){
    //Obtaining a new id for this Order inserted
    $OrdersSameCat = getOrdersByCategory($_POST["category"]);
    if(count($ordersSameCat) > 0){
        $lastId = end($ordersSameCat)["@attributes"]["id"];
        $newId = $lastId[0] . strval(intval(substr($lastId, 1))+1);
    }else{//if this is the first Order of this category, create a brand new id
        $newId = $_POST["category"] . "1";
        switch ($_POST["category"]) {
            case "veg":
                $newId = "V1";
                break;
            case "dairy":
                $newId = "D1";
                break;
            case "meat":
                $newId = "M1";
                break;
            case "bakery":
                $newId = "B1";
                break;
            case "frozen":
                $newId = "F1";
                break;
        }
    }

    $newOrder = array();
    $newOrder["@attributes"]["category"] = $_POST["category"];
    $newOrder["@attributes"]["id"] = $newId;
    $newOrder["name"] = $_POST["name"];
    $newOrder["price"] = $_POST["price"];
    $newOrder["quantity"] = $_POST["quantity"];

    //append new Order to the OrderList in memory
    $orderList[] = $newOrder;

    writeOrders($orderList);
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
header("location: order-management.php");
