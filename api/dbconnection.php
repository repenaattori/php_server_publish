<?php

/**
 * Luo tietokantayhteyden. Jos epäonnistuu, tapahtuu virhe,
 * jonka kutsuja pitää käsitellä (try-catch)
 */
function createDbConnection()
{
    $ini = parse_ini_file("myconf.ini");

    $host = $ini["host"];
    $db = $ini["db"];
    $username = $ini["username"];
    $pw = $ini["pw"];

    try {
        $dbcon = new PDO("mysql:host=$host;dbname=$db", $username, $pw);
        return $dbcon;
    } catch (PDOException $e) {
        //Tämä siirtää vastuun virheen käsittelystä tämän funktion kutsujalle
        throw $e;
    }
}
