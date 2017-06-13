<?php

/* 
 Acme Model
 */

function getCategories(){
    // Create a connection object from the acme connection function 
$db = acmeConnect();
// The SQL statement to be used with the database
$sql = 'SELECT categoryId, categoryName FROM categories ORDER BY categoryName ASC';
// The next line creates the prepared statement using the acme connection
$stmt = $db->prepare($sql);
// The next line runs the prepared statement
$stmt->execute();
//The next line gets the date from the dateabase and stores it as an array in the the $categories variable
$categories = $stmt->fetchAll();
// The next line closes the interaction with the database
$stmt->closeCursor();

return $categories; 
}       
