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
    if(count($OrdersSameCat) > 0){
        $lastId = end($OrdersSameCat)["@attributes"]["id"];
        $newId = $lastId[0] . strval(intval(substr($lastId, 1))+1);
    }else{//if this is the first Order of this category, create a brand new id
        $newId = $_POST["category"] . "1";
        switch ($_POST["category"]) {
            case "vegetables":
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
//    var_dump($_POST);
    $newOrder["@attributes"]["category"] = $_POST["category"];
    $newOrder["@attributes"]["id"] = $newId;
    $newOrder["name"] = $_POST["name"];
    $newOrder["category"] = $_POST["category"];
    $newOrder["price"] = $_POST["price"];
    $newOrder["quantity"] = $_POST["quantity"];
    var_dump($newOrder);

    //append new Order to the OrderList in memory
    $orderList[] = $newOrder;
    var_dump($orderList);

    writeOrders($orderList);
}


header("location: order-management.php");
