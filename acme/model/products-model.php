<?php
/* 
Product-model
 */
function getcategoriesAndIds(){
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
function newCategory($categoryname){
    //Create a function to creating a new category to the categories table
    $db= acmeConnect();
    $sql = 'INSERT INTO categories  (categoryName)
        VALUES ( :categoryName )';
    $stmt= $db->prepare($sql);
   
    $stmt->bindValue(':categoryName', $categoryname, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged =$stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
    
    
}

//Contain a function for inserting a new product to the inventory table.
function newProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle){
     $db = acmeConnect();
      $sql = 'INSERT INTO inventory (invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle)
           VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
   $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
   $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
   $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
   $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
   $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
   $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT);
   $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT);
   $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
   $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
   $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
   $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
}

//get Products pasic function
function getProductBasics() {
 $db = acmeConnect();
 $sql = 'SELECT invName, invId FROM inventory ORDER BY invName ASC';
 $stmt = $db->prepare($sql);
 $stmt->execute();
 $products = $stmt->fetchAll(PDO::FETCH_NAMED);
 $stmt->closeCursor();
 return $products;
}

function getProductInfo($prodId){
 $db = acmeConnect();
 $sql = 'SELECT * FROM inventory WHERE invId = :prodId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
 $stmt->execute();
 $prodInfo = $stmt->fetch(PDO::FETCH_NAMED);
 $stmt->closeCursor();
 return $prodInfo;
}

function updateProduct($prodName, $prodDescription, $prodImage, $prodThumbnail, $prodPrice, $prodStock, $prodSize, $prodWeight, $prodLocation, $categoryId, $prodVendor, $prodStyle, $prodId){
     $db = acmeConnect();
      $sql = $sql = 'UPDATE inventory SET invName = :prodName, invDescription = :prodDesc, invImage = :prodImg, invThumbnail = :prodThumb, invPrice = :prodPrice, invStock = :prodStock, invSize = :prodSize, invWeight = :prodWeight, invLocation = :prodLocation, categoryId = :catType, invVendor = :prodVendor, invStyle = :prodStyle WHERE invId = :prodId';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':prodName', $prodName, PDO::PARAM_STR);
   $stmt->bindValue(':prodDescription', $prodDescription, PDO::PARAM_STR);
   $stmt->bindValue(':prodImage', $prodImage, PDO::PARAM_STR);
   $stmt->bindValue(':prodThumbnail', $prodThumbnail, PDO::PARAM_STR);
   $stmt->bindValue(':prodPrice', $prodPrice, PDO::PARAM_STR);
   $stmt->bindValue(':prodStock', $prodStock, PDO::PARAM_INT);
   $stmt->bindValue(':prodSize', $prodSize, PDO::PARAM_INT);
   $stmt->bindValue(':prodWeight', $prodWeight, PDO::PARAM_INT);
   $stmt->bindValue(':prodLocation', $prodLocation, PDO::PARAM_STR);
   $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
   $stmt->bindValue(':prodVendor', $prodVendor, PDO::PARAM_STR);
   $stmt->bindValue(':prodStyle', $prodStyle, PDO::PARAM_STR);
   $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
   $stmt->execute();
   $rowsChanged = $stmt->rowCount();
   $stmt->closeCursor();
   return $rowsChanged;
}