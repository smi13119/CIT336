<?php

/* 
Products Controller
 * 
 */
// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';

// Get the products model
require_once '../model/products-model.php';
//Get the Functions
require_once '../library/functions.php';
//Get the Acme-model
require_once '../model/acme-model.php';


//call the Navigation function
 navigation();

// Get the array of categories
$categoriesAndIds = getCategoriesAndIds();

ob_start();
include '../view/navlist.php';
$navList = ob_get_contents();
ob_end_clean();



//Create a $catList variable to build a dynamic drop-down select list
// Build a catlist   array
//$catList = '<select name="categories">';
//$catList .= '<option value ="">Please Choose</option>';
//foreach ($categoriesAndIds as $catAndId) {
//    
//$catList .= '<option value="'.$catAndId["categoryId"].'">'.$catAndId["categoryName"].'</option>';
//}
//$catList .= '</select>';



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    
      case 'createCategory':
      $message='';
      include '../view/addcategory.php';
      break;
    
  case 'addNewCategory':
      //Filter to store the new data
    
    $categoryname = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
    
    //Check for missing data
    if(empty($categoryname)) {
        $message = '<p>Please provide information for all empty form fields.</p>';
        
        
    } else{
    
    $newCategory = newCategory($categoryname);
    if($newCategory === 1) {
        $message = "<p>Thank you for adding the new Category $categoryname.</p>";
        
    $categoriesAndIds = getCategoriesAndIds();
        
      ob_start();
      include '../view/navlist.php';
      $navList = ob_get_contents();
      ob_end_clean();

    } else {
        $message = "<p>Sorry but the new Category $categoryname has failed to be added. Please try again.</p>";
        
       
    }}
    include '../view/addcategory.php';
    break;
    
    
  case 'createProduct':
      $message='';
      include '../view/addproduct.php';
      break;
  
  case 'addNewProduct':
    
      $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
      $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
      $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
      $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
      $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT);
      $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
      $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
      $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT);
      $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
      $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_STRING);
      $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
      $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
      
      if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail)
              || empty($invPrice) || empty($invStock) ||  empty($invSize) || empty($invWeight)
              || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle)) {
        $message = '<p>Please provide information for all empty form fields.</p>';
       
        
    } else{
    
    
    $newProduct = newProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);
    
    if($newProduct === 1) {
        $message = "<p>Thank you for adding the new product $invName to the inventory.</p>";
        
    } else {
        $message = "<p>Sorry but the new product $invName has failed to be added. Please try again.</p>";
        
    }}
    include '../view/addproduct.php';
    break;
  default:
      include'../view/prod-mgmt.php';
      exit;
    
}