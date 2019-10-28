<?php

/**
 * DB_Anbindung short summary.
 *
 * DB_Anbindung description.
 *
 * Querys and any other
 *
 * @version 1.0
 * @author U1349
 */

error_reporting(E_ALL);

define('MYSQL_HOST', 'localhost');

define('MYSQL_BENUTZER', 'root');
define('MYSQL_KENNWORT', '');

// 2 parameter entspricht dem Tabellennamen
define('MYSQL_DATENBANK', 'user');

$db_link = mysqli_connect(
                MySQL_HOST,
                MYSQL_BENUTZER,
                MYSQL_KENNWORT,
                MYSQL_DATENBANK
          );

// check the DB connection
function checkConnection() {
    global $db_link;

    if($db_link) {
        echo 'Verindung erfolgreich';
    } else {
        die('Keine Verbindung möglich: ' . mysqli_error($db_link));
    }
}

// Insert
function insertInto() {
    global $db_link;

    $sql_insert = "INSERT INTO `TABELLE` (`SPALTE`) VALUES (`WERTE`)";

    return $resultInsert = $db_link->query($sql_insert)
        or die("Anfrage fehlgeschlagen: " . mysqli_error($db_link));
}

// Get ID from last insert
function getIdOfLastInsert() {
    global $db_link;

    $sql_select_last_insert_id = "SELECT ID FROM `TABELLE` ORDER BY DESC LIMIT 1";

    $resultLastInsertId = $db_link->query($sql_select_last_insert_id)
        or die("Anfrage fehlgeschlagen: "  . mysqli_error($db_link));

    $tempVar = $resultLastInsertId->fetch_object();
    return $lastId = $tempVar->ID;
}

function checkLogin($username, $password) {
    global $db_link;

    $sql_check_login = "SELECT `userID` FROM `user` WHERE `username` = " . $username . "and `password` = " . $password . "";

    $resultCheckLogin = $db_link->query($sql_check_login)
        or die('Anfrage fehlgeschlagen: ' . mysqli_error($db_link));

    $tempVar = $resultCheckLogin->fetch_object();
    if($tempVar != Undefined) {
        return true;
    } else {
        return false;
    }
}