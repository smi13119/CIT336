<?php

/* 
Accounts Controller
 */

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';
//Get the Functions Library
require_once '../library/functions.php';


// Get the array of categories
$categories = getCategories();

//call the Navigation function
$navlist = navigation();
//var_dump($categories);
//exit;

 //Build a navigation bar using the $categories array
//$navList = '<ul>';
//$navList .= '<li> <a class="navtabs" href="/acme/index.php" title="View the Acme home page">Home</a></li>';
//foreach ($categories as $category) {
    
//$navList .= '<li> <a class="navtabs" href="/acme/index.php?action='.$category["categoryName"].'" title="View our '.$category["categoryName"].' product line">'.$category["categoryName"].'</a></li>';
//}
//$navList .= '</ul>';

//echo $navList;
//exit;


 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
 case 'login':
     include'../view/login.php';
    break;



 case 'registration':
     
    // echo 'You are in the register case statement.':
    
  // Filter and store the data
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email');
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $email = checkEmail($email);
  $checkPassword = checkPassword($password);
 
 
// Check for missing data
if(empty($firstname) || empty($lastname) || empty($email) || empty($checkPassword)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include '../view/registration.php';
  exit;
}
//Hash the checked password
$password = password_hash($password, PASSWORD_DEFAULT);

// Send the data to the model
$regOutcome = regVisitor($firstname, $lastname, $email, $password);

// Check and report the result
if($regOutcome === 1){
  $message = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
  include '../view/login.php';
  exit;
} else {
  $message = "<p>Sorry $firstname, but the registration failed. Please try again.</p>";
  include '../view/registration.php';
  exit;
}
break;

 case 'Login':
     $email = filter_input(INPUT_POST, 'email');
     $password = filter_input (INPUT_POST, 'password', FILTER_SANITIZE_STRING);
     $email = checkEmail($email);
     $checkPassword = checkPassword($password);
     //check for missing data
     if(empty($email) || empty($checkPassword)){
         $message = '<p> Please provide information for all empty form fields.</p>';
         include '../view/login.php';
         exit;
     }
     break;
}



