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

 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
if($action == NULL){
 $action = 'home';
}
}
//check if the firstname exists and get it's value
if(isset($_COOKIE ['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action){
 case 'home':
  include 'view/home.php';
     break;
 
}


