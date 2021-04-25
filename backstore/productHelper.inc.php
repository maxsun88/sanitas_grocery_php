<?php

require_once '../xml_database/simplexml.php';

$productList = getProducts();

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
if($action=="insert"){
    //Obtaining a new id for this product inserted
    $productsSameCat = getProductsByCategory($_POST["category"]);
    if(count($productsSameCat) > 0){
        $lastId = end($productsSameCat)["@attributes"]["id"];
        $newId = $lastId[0] . strval(intval(substr($lastId, 1))+1);
    }else{//if this is the first product of this category, create a brand new id
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

    $newProduct = array();
    $newProduct["@attributes"]["category"] = $_POST["category"];
    $newProduct["@attributes"]["id"] = $newId;
    $newProduct["name"] = $_POST["name"];
    $newProduct["price"] = $_POST["price"];
    $newProduct["unit"] = $_POST["unit"];
    $newProduct["description"] = $_POST["description"];
    $newProduct["types"] = $_POST["types"];
    $newProduct["img"] = $_POST["img"];
    $newProduct["stock"] = $_POST["stock"];

    //append new product to the productList in memory
    $productList[] = $newProduct;

    writeProducts($productList);
}

header("location: product-management.php");
