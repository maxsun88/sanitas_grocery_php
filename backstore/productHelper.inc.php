<?php

require_once '../xml_database/simplexml.php';

$productList = getProducts();
$productList = json_decode(json_encode((array)$productList), TRUE)["product"];


$product_id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

if($action=="delete"){
    $index = 0;
    foreach($productList as $item) {
        if($item["@attributes"]["id"]==$product_id){
            array_splice($productList, $index, 1);
            break;
        }
        $index++;
    }
    writeProducts($productList);
}

header("location: product-management.php");
