<?php

/* 
Reviews Controller
 */
session_start();

require_once '../library/connections.php';
require_once '../library/functions.php';
require_once '../model/acme-model.php';
require_once '../model/products-model.php';
require_once '../model/uploads-model.php';
require_once '../model/reviews-model.php';

/*collect the action
 */
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
/* call the buildNav function
 */
$navList = navigation();

//Get the array of categories
$categories = getCategories();

//check if the firstname exists and get it's value
if(isset($_COOKIE ['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'addnewReview':
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        
        if (empty($reviewText)) {
            $message = '<p><b>ERROR: Please provide information for all empty fields.</b></p>';
            include '../acme/view/product-detail.php';
            exit;
        }
        
       $addnewReview = newReview ($clientId, $invId, $reviewText);
       
       if($addnewReview==1) {
           $product= getProductInfo($invId);
           $reviews= getReviewsbyInv($invId);
           include'../view/product-detail.php';
       } else{
           $message= "<p> Sorry but your review has failed to be added. Please try again.</p>";
       }
       exit;
          
break;
    case 'editReview':
    
        
        break;
    
    case 'updateReview':
        $reviewId = filter_input(INPUT_PUT, 'id', FILTER_VALIDATE_INT);
        $review = updateReview($reviewId, $reviewText);
        $message = '<h1>Congrats! Your Review has been updated!</h1>';
        include '../view/admin.php';
        
break;
    case 'confirmdeleteReview':
        
        $reviewId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $review = getReviewbyId($reviewId);
        echo '<h1> Are you sure you want to delete?</h1>';
        echo "<a href='/acme/reviews?action=deleteReview&id=$reviewId' title='Click to Delete'>Delete</a>";
        
        break;
    
    case 'deleteReview':
        $reviewId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $review = deleteReview($reviewId);
        $message = '<h1>Review deleted!</h1>';
        include '../view/admin.php';
        
        
break;
        
  

default;
    if(!isset($_SESSION['clientData']) or($_SESSION['clientData']['clientId'] == NULL)){
        header('Location:/acme/index.php');
        die();
    }
    else {
    include'../view/admin.php';}
    exit;
}