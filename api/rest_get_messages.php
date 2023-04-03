<?php
require('./headers.php');
require('./db_user_controller.php');

if(!isset($_GET["uname"])){
    http_response_code(400);
    echo "User not defined. Give valid username";
    exit;
}

try{
    $messages = getUserMessages($_GET["uname"]);
    http_response_code(200);
    header("Content-type: application/json");
    echo $messages;
}catch(Exception $e){
    http_response_code(500);
    echo $e->getMessage();
    exit;
}



