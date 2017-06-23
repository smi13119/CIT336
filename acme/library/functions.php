<?php

/* 
 *Functions
 */

/* checkEmail($email)
 * 
 */
function checkEmail ($email){
    $sanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $vanEmail = filter_var($sanEmail, FILTER_VALIDATE_EMAIL);
    return $vanEmail;
    
}

/* checkPassword($pasword)
 * Check the password for a minimim of 8 characters, at least one 1 capital letter, at least 1 number and at least 1 specail character
 */

function checkPassword ($password){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $password);
}

function navigation(){
    $categories = getCategories();
    
$navList = '<ul>';
$navList .= '<li> <a class="navtabs" href="/acme/index.php" title="View the Acme home page">Home</a></li>';
foreach ($categories as $category) {
    
$navList .= '<li> <a class="navtabs" href="/acme/products/?action=category&type='.$category["categoryName"].'" title="View our '.$category["categoryName"].' product line">'.$category["categoryName"].'</a></li>';
}
$navList .= '</ul>';
return $navList;

}
//Build a display of products within an unordered list


function buildProductsDisplay($products){
 $pd = '<ul id="prod-display">';
 foreach ($products as $product) {
  $pd .= '<li>';
  $pd .= "<a href='/acme/products/index.php?action=details&id=$product[invId]'><img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
  $pd .= '<h2></h2>';
  $pd .= "<h2>$product[invName]</h2>";
  $pd .= "<span>$$product[invPrice]</span>";
  $pd .= '</li>';
 }
 $pd .= '</ul>';
 return $pd;
}

function buildProductsDetail($product) {
  $pd = '<ul id="prod-detail">';
    $pd .= '<li>';
    $pd .= "<h1>$product[invName]</h1>";
    $pd .= "<img src='$product[invImage]' alt='Image of $product[invName] on Acme.com'><br>";
    $pd .= "<hr>";
    $pd .= "$product[invDescription]<br>";
    $pd .= "Price: $product[invPrice]<br>";
    $pd .= "Size: $product[invSize]<br>";
    $pd .= "Weight: $product[invWeight]<br>";
    $pd .= "Quantity: $product[invStock]<br>";
    $pd .= "Location: $product[invLocation]<br>";
    $pd .= "Style: $product[invStyle]<br>";
    $pd .= "Vendor: $product[invVendor]";
    $pd .= '</li>';
    $pd .= '</ul>';
    return $pd;
}

    