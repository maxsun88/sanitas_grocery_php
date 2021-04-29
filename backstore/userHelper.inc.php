<?php

require_once '../xml_database/simplexml_P9.php';

$userList = getUsers();
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
if($action=="insert"){
    //Obtaining a new id for this user inserted
    $usersSameCat = getUsersByCategory($_POST["category"]);
    if(count($usersSameCat) > 0){
        $lastId = end($usersSameCat)["@attributes"]["id"];
        $newId = $lastId[0] . strval(intval(substr($lastId, 1))+1);
    }else{//if this is the first user of this category, create a brand new id
        $newId = $_POST["category"] . "1";
        switch ($_POST["category"]) {
            case "customer":
                $newId = "C1";
                break;
            case "admin":
                $newId = "A1";
                break;
        }
    }

    $newUser = array();
    $newUser["@attributes"]["category"] = $_POST["category"];
    $newUser["@attributes"]["id"] = $newId;
    $newUser["title"] = $_POST["title"];
    $newUser["firstName"] = $_POST["firstName"];
    $newUser["lastName"] = $_POST["lastName"];
    $newUser["streetAddress"] = $_POST["streetAddress"];
    $newUser["city"] = $_POST["city"];
    $newUser["postalCode"] = $_POST["postalCode"];

    //append new user to the userList in memory
    $userList[] = $newUser;

    writeUsers($userList);
}

header("location: Page9.php");