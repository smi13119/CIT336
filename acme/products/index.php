<?php

/* 
Products Controller
 * 
 */

// Get the database connection file
require_once '../library/connections.php';

// Get the products model
require_once '../model/products-model.php';
//Get the Functions
require_once '../library/functions.php';
//Get the Acme-model
require_once '../model/acme-model.php';



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
  case 'addNewCategory':
      //Filter to store the new data
    
    $categoryname = filter_input(INPUT_POST, 'categoryName');
    
    //Check for missing data
    if(empty($categoryname)){
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
    
      $invname = filter_input(INPUT_POST, 'invname');
      $invdescription = filter_input(INPUT_POST, 'invdescription');
      $invimage = filter_input(INPUT_POST, 'invimage');
      $invthumbnail = filter_input(INPUT_POST, 'invthumbnail');
      $invprice = filter_input(INPUT_POST, 'invprice');
      $invstock = filter_input(INPUT_POST, 'invstock');
      $invsize = filter_input(INPUT_POST, 'invsize');
      $invweight = filter_input(INPUT_POST, 'invweight');
      $invlocation = filter_input(INPUT_POST, 'invlocation');
      $categoryid = filter_input(INPUT_POST, 'categories');
      $invvendor = filter_input(INPUT_POST, 'invvendor');
      $invstyle = filter_input(INPUT_POST, 'invstyle');
      
      if( empty($invname) || empty($invdescription) || empty($invimage) || empty($invthumbnail)
              || empty($invprice) || empty($invstock) ||  empty($invsize) || empty($invweight)
              || empty($invlocation) || empty($categoryid) || empty($invvendor) || empty($invstyle)) {
        $message = '<p>Please provide information for all empty form fields.</p>';
       
        
    }
    $newproduct = newProduct($invname, $invdescription, $invimage, $invthumbnail, $invprice, $invstock, $invsize, $invweight, $invlocation, $categoryid, $invvendor, $invstyle);
    if($newproduct === 1) {
        $message = "<p>Thank you for adding the new product $invname to the inventory.</p>";
        
    } else {
        $message = "<p>Sorry but the new product $invname has failed to be added. Please try again.</p>";
        
    }
    include '../view/addproduct.php';
    break;
  default:
      include'../view/prod-mgmt.php';
    
}