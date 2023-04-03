<?php
require('./headers.php');
require('./db_user_controller.php');

//Käyttäjä saadaan JSON-bodynä
$body = file_get_contents("php://input");
$user = json_decode($body);

//Tarkastetaan onko käyttäjänimi ja salasana JSONissa
//Tämä palauttaa myös virhekoodin, jos ei ole.
if(!isset($user->uname) || !isset($user->pw) || !isset($user->fullname)){
    http_response_code(400);
    echo "User not defined. Give valid username, password and full name";
    exit;
}

try{
    registerUser($user->uname, $user->fullname, $user->pw);
}catch(Exception $e){
    http_response_code(500);
    echo $e->getMessage();
    exit;
}

//Palautetaan tieto, että käyttäjä reksiteröity.
http_response_code(200);
echo "User ".$user->uname." registered";