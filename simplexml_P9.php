<!-- //reference https://code.tutsplus.com/tutorials/parse-xml-to-an-array-in-php-with-simplexml--cms-35529 -->


<?php

function getUsers(){
    $xml=simplexml_load_file("Page9.xml") or die("Error: Cannot create object");
    return $xml;
}

function writeUsers($userList){
    $dom = new DOMDocument('1.0','UTF-8');
    $dom->formatOutput = true;
    $root = $dom->createElement('users');
    $dom->appendChild($root);

    foreach($userList as $item) {
        $user = $dom->createElement('users');
        $root->appendChild($user);
        $user->setAttribute('category', $item["@attributes"]["category"]);
        $user->setAttribute('id', $item["@attributes"]["id"]);
        $user->appendChild( $dom->createElement('title', $item["title"]) );
        $user->appendChild( $dom->createElement('firstName', $item["firstName"]) );
        $user->appendChild( $dom->createElement('lastName', $item["lastName"]) );
        $user->appendChild( $dom->createElement('streetAddress', $item["streetAddress"]) );
        $user->appendChild( $dom->createElement('postalCode', $item["postalCode"]) );
    }
    $dom->save('Page9.xml') or die('XML Create Error');
}
