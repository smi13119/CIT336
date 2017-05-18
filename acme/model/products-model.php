<?php

/* 
Product-model
 */



function getProducts(){
    // Create a connection object from the acme connection function 
$db = acmeConnect();
// The SQL statement to be used with the database
$sql = 'SELECT invId, invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle FROM inventory';
// The next line creates the prepared statement using the acme connection
$stmt = $db->prepare($sql);
// The next line runs the prepared statement
$stmt->execute();
//The next line gets the date from the dateabase and stores it as an array in the the $categories variable
$products = $stmt->fetchAll();
// The next line closes the interaction with the database
$stmt->closeCursor();

return $products; 
}   