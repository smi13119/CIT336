<?php

/* 
 *  Database Connections
 * 
 */
function acmeConnect() {
$server = "localhost";
$database = "acme";
$user = "iClient";
$password = "SIbVaRrR1QFutGbw";
$dsn = "mysql:host=$server;dbname=$database";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $acmelink = new PDO($dsn, $user, $password, $options);
    return $acmelink;
} catch (PDOException $ex) {
   header('location: ../errordocs/500.php');

}
}
