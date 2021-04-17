<!-- //reference https://code.tutsplus.com/tutorials/parse-xml-to-an-array-in-php-with-simplexml--cms-35529 -->


<?php

function getProducts(){
    $xml=simplexml_load_file("../xml_database/products.xml") or die("Error: Cannot create object");
    return $xml;
}

function writeProducts($productList){
    $dom = new DOMDocument('1.0','UTF-8');
    $dom->formatOutput = true;
    $root = $dom->createElement('products');
    $dom->appendChild($root);

    foreach($productList as $item) {
        $product = $dom->createElement('product');
        $root->appendChild($product);
        $product->setAttribute('category', $item["@attributes"]["category"]);
        $product->setAttribute('id', $item["@attributes"]["id"]);
        $product->appendChild( $dom->createElement('name', $item["name"]) );
        $product->appendChild( $dom->createElement('price', $item["price"]) );
        $product->appendChild( $dom->createElement('unit', $item["unit"]) );
        $product->appendChild( $dom->createElement('description', $item["description"]) );
        $product->appendChild( $dom->createElement('types', $item["types"]) );
        $product->appendChild( $dom->createElement('img', $item["img"]) );
        $product->appendChild( $dom->createElement('stock', $item["stock"]) );
    }
    $dom->save('../xml_database/product_result.xml') or die('XML Create Error');
}
