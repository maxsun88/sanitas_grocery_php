<?php

require_once 'simplexml_P9.php';

$userList = getUsers();
$userList = json_decode(json_encode((array)$userList), TRUE)["users"];


$user_id = isset($_GET['id']) ? $_GET['id'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

if($action=="delete"){
    $index = 0;
    foreach($userList as $item) {
        if($item["@attributes"]["id"]==$user_id){
            array_splice($userList, $index, 1);
            break;
        }
        $index++;
    }
    writeUsers($userList);
}

header("location: Page9.php");
