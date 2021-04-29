<!-- //reference https://code.tutsplus.com/tutorials/parse-xml-to-an-array-in-php-with-simplexml--cms-35529 -->


<?php

function getOrders(){
    $xml=simplexml_load_file("../xml_database/order_result.xml") or die("Error: Cannot create object");
    return json_decode(json_encode((array)$xml), TRUE)["order"];
}

function getOrdersXML()
{
    $xml=simplexml_load_file("../xml_database/orders.xml") or die("Error: Cannot create object");
    return $xml;
}

function getOrdersByCategory($category){
    $orderList = getOrders();
    $OrdersSameCat = array(); //orders of the same category
    foreach($orderList as $item) {
        if($item["@attributes"]["category"] == $category){
            $OrdersSameCat[] = $item;
        }
    }
    return $OrdersSameCat;
}

function getOrderById($id){
    $orderList = getOrders();
    foreach($orderList as $item) {
        if($item["@attributes"]["id"] == $id){
            return $item;
        }
    }
}

function overWriteXML($id, $newid, $name, $category, $price, $quantity)
{
    $orderList = getOrders();
    foreach ($orderList as $item)
    {
        if ($item["@attributes"]["id"]==$id)
        {
            $item["id"] = $newid;
            $item["name"] = $name;
            $item["category"] = $category;
            $item["price"] = $price;
            $item["quantity"] = $quantity;
        }
    }
    writeOrders($orderList);
    
}

function writeOrders($orderList){
    $dom = new DOMDocument('1.0','UTF-8');
    $dom->formatOutput = true;
    $root = $dom->createElement('orders');
    $dom->appendChild($root);

    foreach($orderList as $item) {
        $order = $dom->createElement('order');
        $root->appendChild($order);
        $order->setAttribute('id', $item["@attributes"]["id"]);
        $order->setAttribute('category', $item["@attributes"]["category"]);
        $order->appendChild( $dom->createElement('name', $item["name"]));
        $order->appendChild( $dom->createElement('category', $item["category"]) );
        $order->appendChild( $dom->createElement('price', $item["price"]) );
        $order->appendChild( $dom->createElement('quantity', $item["quantity"]) );
    }
    $dom->save('../xml_database/order_result.xml') or die('XML Create Error');
}
