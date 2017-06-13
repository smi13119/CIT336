<?php

/* 
Product-model
 */



function getCategoriesAndIds(){
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


function newCategory( $categoryname){
    //Create a function to creating a new category to the categories table
    $db= acmeConnect();
    $sql = 'INSERT INTO categories  (categoryName)
        VALUES ( :categoryname )';
    $stmt= $db->prepare($sql);
   
    $stmt->bindValue(':categoryname', $categoryname, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged =$stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
    
    
}


function newProduct( $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle ){
   
    // Create a function to inserting a new product in the inventory table. 
$db = acmeConnect();
// The SQL statement to be used with the database
$sql = 'INSERT INTO inventory ( invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle)
        VALUES ( :invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)';
// The next line creates the prepared statement using the acme connection
$stmt = $db->prepare($sql);

$stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
$stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
$stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
$stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
$stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
$stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
$stmt->bindValue(':invSize', $invSize, PDO::PARAM_STR);
$stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_STR);
$stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
$stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
$stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
$stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);


// The next line runs the prepared statement
$stmt->execute();
$rowsChanged = $stmt->rowCount();
$stmt->closeCursor();
return $products; 
}   
