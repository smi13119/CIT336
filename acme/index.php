<?php

/* 
Acme Controller
 */

//Create or access a Session
session_start();


// Get the database connection file
require_once 'library/connections.php';
// Get the acme model for use as needed
require_once 'model/acme-model.php';
//Get the Functions
require_once 'library/functions.php';
require_once 'model/products-model.php';


// Get the array of categories
$categories = getCategories();

//call the Navigation function
navigation();

//var_dump($categories);
//exit;

// Build a navigation bar using the $categories array
//$navList = '<ul>';
//$navList .= '<li> <a class="navtabs" href="/acme/index.php" title="View the Acme home page">Home</a></li>';
//foreach ($categories as $category) {
//
//$navList .= '<li> <a class="navtabs" href="/acme/index.php?action='.$category["categoryName"].'" title="View our '.$category["categoryName"].' product line">'.$category["categoryName"].'</a></li>';
//}
//$navList .= '</ul>';

//echo $navList;
//exit;


 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
if($action == NULL){
 $action = 'home';
}
}
//check if the firstname exists and get it's value
if(isset($_COOKIE ['firstname'])){
    $cookieFirstname = filter_input(INPUT_cookie, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action){
 case 'home':
  include 'view/home.php';

     break;
}

