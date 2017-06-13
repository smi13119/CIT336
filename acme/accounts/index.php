<?php
/* 
Accounts Controller
 */
// Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';
//Get the Functions Library
require_once '../library/functions.php';
//get products model
require_once '../model/products-model.php';

//call the Navigation function
navigation();
// Get the array of categories
$categories = getCategories();

 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}
switch ($action){
    case 'login':
     $email = filter_input(INPUT_POST, 'email');
     $email = checkEmail($email);
     $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
     $checkPassword = checkPassword($password);
      // Run basic checks, return if errors
     if (empty($emailaddress) || empty($passwordCheck)) {
     $message = '<p>Please provide a valid email address and password.</p>';
      include '../view/login.php';
        break;
         exit;
     }
         
     case 'home':
     include '../view/home.php';
     break;
 
 case 'registration':
     include '../view/registration.php';
     break;
 
     
    // echo 'You are in the register case statement.':
 
 case 'register':
  // Filter and store the data
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email');
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  $email = checkEmail($email);
  $checkPassword = checkPassword($password);
 
  //checking for existing email
  $existingEmail = checkExistingEmail($email);
  //check for exisint email address in the table 
  if ($existingEmail){
      $message = '<p class="notice"> That email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
  }
 
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
// Check and report the result
if ($regOutcome === 1) {
  setcookie('firstname', $firstname, strtotime('+1 year'), '/');
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
//A valid password exists, proceed with login process
//Query the client data base on the email address
$clientData = getClient($email);
//Compare the password just submitted against the hassed password for the matching client 
$hashCheck = password_verify($password, $clientData ['clientPassword']);
//If the hases don't match create an error and return to the login view
if (!$hashCheck) {
    $message = '<p>Please check your password and try again.</p>';
    include '../view/login.php';
    exit;
}
//a valid user exists, log them in
$_SESSION['loggedin'] = TRUE;
//remove the password from the array_pop fuction removes the last element form an array
array_pop($clientData);
////Store the array into the session
$_SESSION['clientData'] = $clientData;
//Send them to the admin view
include '../view/admin.php';
exit;
break;


default:
      include'../view/login.php';
    exit;
      
    case 'Logout':
        session_destroy();
        header('location:/acme');
        exit;
}