<?php
require('./dbconnection.php');

function registerUser($uname, $fullname, $pw)
{

    //Password may be hashed into the database
    //$pw = password_hash($pw, PASSWORD_DEFAULT);

    //Lisätään käyttäjä kantaan

    $db = createDbConnection();

    $sql = "INSERT INTO user VALUES (?,?,?)";
    $statement = $db->prepare($sql);
    $statement->execute(array($uname, $fullname, $pw));
}

function getUserMessages($uname)
{
    $db = createDbConnection();
    $sql = "SELECT msg FROM message WHERE username=?";
    $statement = $db->prepare($sql);
    $statement->execute(array($uname));
    return json_encode($statement->fetchAll(PDO::FETCH_COLUMN));
}
