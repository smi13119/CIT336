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
require_once '../model/reviews-model.php';

//call the Navigation function
navigation();
// Get the array of categories
$categories = getCategories();

 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}
//check if the firstname exists and get it's value
if(isset($_COOKIE ['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
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
$clientData = getClient($email);

if($clientData["clientId"] == NULL) {
    
    include '../view/home.php';
    break;}
   
 


    $_SESSION['loggedin'] = TRUE;
//remove the password from the array_pop fuction removes the last element form an array
setcookie('firstname', $cookieFirstname=$clientData['clientFirstname'], strtotime('+1 year'), '/');
array_pop($clientData);
////Store the array into the session
$_SESSION['clientData'] = $clientData;




    case 'admin':
        if(!isset($_SESSION['clientData']) or($_SESSION['clientData']['clientId'] == NULL)) {
    
    include '../view/home.php';
    break;}
//Send them to the admin view
include '../view/admin.php';
        break;

    case 'updateAccount':
        $updateId = filter_input(INPUT_POST, 'updateId', FILTER_SANITIZE_NUMBER_INT);
        $upfirstName = filter_input(INPUT_POST, 'upfirstName', FILTER_SANITIZE_STRING);
        $uplastName = filter_input(INPUT_POST, 'uplastName', FILTER_SANITIZE_STRING);
        $upemail = filter_input(INPUT_POST, 'upemail', FILTER_SANITIZE_EMAIL);

if (empty($updateId) || empty($upfirstName) || empty ($uplastName) || empty ($upemail)){
    $message='<p>Please complete all the information</p>';
        }
         $updata = updateAccount($updateId, $upfirstName, $uplastName, $upemail);
      
          if ($updata) {
              $message = "<p>Congratulations, $upfirstName was sucessfully updated.</p>";
              $_SESSION['message'] = $message;
              header('location: /acme/accounts/index.php?action=client-update');
              exit;
          } else {
              $message = "<p>Error. $upfirstName was not updated.</p>";
              $_SESSION['message'] = $message;
              include '../view/client-update.php';
              exit;
          }
    break;
    
    case 'updatePassword':
        $updateId = filter_input(INPUT_POST, 'updateId', FILTER_SANITIZE_NUMBER_INT);
        $uppassword = filter_input(INPUT_POST, 'uppassword', FILTER_SANITIZE_STRING);
        
        if (empty($clientId) || empty($clientPassword)){
    $message='<p>Please complete all the information</p>';
        }
        $uppassword = password_hash($uppassword, PASSWORD_DEFAULT);
        
        $updata = updatePassword($updateId, $uppassword);
      
          if ($updata) {
              $message = "<p>Congratulations your password was sucessfully updated.</p>";
              $_SESSION['message'] = $message;
              include '../view/admin.php';
              exit;
          } else {
              $message = "<p>Error. Your password was not updated.</p>";
              $_SESSION['message'] = $message;
              include '../view/admin.php';
              exit;
          }
        
   
        break;

       
        
    
    
    
        
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

exit;
break;

   

    
      case 'client-update':
           
            include '../view/client-update.php';
        break;
    
    default:
      include'../view/login.php';
    break;
    case 'Logout':
        session_destroy();
        // Delete it
        setcookie('firstname', '', strtotime('-1 year'), '/');
        header('location:/acme');
        exit;
}