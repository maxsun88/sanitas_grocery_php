<!-- //reference https://code.tutsplus.com/tutorials/parse-xml-to-an-array-in-php-with-simplexml--cms-35529 -->


<?php

function getOrders(){
    $xml=simplexml_load_file("../xml_database/orders.xml") or die("Error: Cannot create object");
    return $xml;
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
        $order->appendChild( $dom->createElement('name', $item["name"]) );
        $order->appendChild( $dom->createElement('category', $item["category"]) );
        $order->appendChild( $dom->createElement('price', $item["price"]) );
        $order->appendChild( $dom->createElement('quantity', $item["quantity"]) );
    }
    $dom->save('../xml_database/order_result.xml') or die('XML Create Error');
}
