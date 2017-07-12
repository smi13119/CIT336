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
//Get uploads-model
require_once '../model/uploads-model.php';
require_once '../model/reviews-model.php';
    
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

//check if the firstname exists and get it's value
if(isset($_COOKIE ['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
 if ($action == NULL) {
     $action = 'prod-mgmt';
 }
}
switch ($action) {
case 'prod-mgmt':
    $products = getProductBasics();
 if(count($products) > 0){
  $prodList = '<table>';
  $prodList .= '<thead>';
  $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
  $prodList .= '</thead>';
  $prodList .= '<tbody>';
  foreach ($products as $product) {
   $prodList .= "<tr><td>$product[invName]</td>";
   $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
   $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
  }
   $prodList .= '</tbody></table>';
  } else {
   $message = '<p class="notify">Sorry, no products were returned.</p>';
}
include '../view/prod-mgmt.php';
          break;
    
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
    
case 'category';
    $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
    $products = getProductsByCategory($type);
    if(!count($products)){
    $message = "<p class='notice'>Sorry, no $type products could be found.</p>";
    } else {
     $prodDisplay = buildProductsDisplay($products);
 }
    include '../view/category.php';
    break;

case 'details':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $product = getProductInfo($prodId);
        $reviews= getReviewsbyInv($prodId);
        
        //call getThumbnails function
        $prodThumbnails = getThumbnails($prodId);
        
        if(!count($product)){
        $message = "<p class='notice'>Sorry, no $prodId  could be found.</p>";
        } else {
        $prodDetail = buildProductsDetail($product);
        $thumbnails =buildProdThumbnails($prodThumbnails);
        }
        include '../view/product-detail.php';
        break;
    
    
    
    
     case 'mod':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInfo = getProductInfo($prodId);
    if(count($prodInfo)<1){
  $message = 'Sorry, no product information could be found.';
 }
 include '../view/prod-update.php';
 exit;
break;
          
case 'updateProd':
   
    $catType = filter_input(INPUT_POST, 'catType', FILTER_SANITIZE_NUMBER_INT);
    $prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_STRING);
    $prodDescription = filter_input(INPUT_POST, 'prodDescription', FILTER_SANITIZE_STRING);
    $prodImage = filter_input(INPUT_POST, 'prodImage', FILTER_SANITIZE_STRING);
    $prodThumbnail = filter_input(INPUT_POST, 'prodThumbnail', FILTER_SANITIZE_STRING);
    $prodPrice = filter_input(INPUT_POST, 'prodPrice', FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $prodStock = filter_input(INPUT_POST, 'prodStock', FILTER_SANITIZE_NUMBER_INT);
    $prodSize = filter_input(INPUT_POST, 'prodSize', FILTER_SANITIZE_NUMBER_INT);
    $prodWeight = filter_input(INPUT_POST, 'prodWeight', FILTER_SANITIZE_NUMBER_INT);
    $prodLocation = filter_input(INPUT_POST, 'prodLocation', FILTER_SANITIZE_STRING);
    $prodVendor = filter_input(INPUT_POST, 'prodVendor', FILTER_SANITIZE_STRING);
    $prodStyle = filter_input(INPUT_POST, 'prodStyle', FILTER_SANITIZE_STRING);
    $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT);
          
          if (empty($catType) || empty($prodName) || empty($prodDescription) || empty($prodImage) || empty($prodThumbnail) || empty($prodPrice) || empty($prodStock) || empty($prodSize)  || empty($prodWeight)  || empty($prodLocation) || empty ($prodVendor) || empty($prodStyle)){
              
        $message ='<p>Please complete all information of the item! Double check the category of the item.</p>';
              include '../view/prod-update.php';
              exit;
          }
          
          $updateResult = updateProduct($catType, $prodName, $prodDescription, $prodImage, $prodThumbnail, $prodPrice, $prodStock, $prodSize, $prodWeight, $prodLocation, $prodVendor, $prodStyle, $prodId);
          
          if ($updateResult) {
              $message = "<p>Congratulations, $prodName was sucessfully updated.</p>";
              $_SESSION['message'] = $message;
              header('location: /acme/products/');
              exit;
          } else {
              $message = "<p>Error. $prodName was not updated.</p>";
              include '../view/prod-update.php';
              exit;
          }
    break;
    
    case 'del':
        $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($prodId);
        if (count($prodInfo) < 1) {
         $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-delete.php';
        exit;
    break;
    
    case 'deleteProd':
        $prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_STRING);
        $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT);
        
        $deleteResult = deleteProduct($prodId);
        if ($deleteResult) {
         $message = "<p>Congratulations, $prodName was successfully deleted.</p>";
         $_SESSION['message'] = $message;
         header('location:/acme/products/');
         exit;
        } else {
         $message = "<p>Error: $prodName was not deleted.</p>";
         $_SESSION['message'] = $message;
         header('location:/acme/products/');
         exit;
        }

     


      default;
      include'../view/prod-mgmt.php';
      exit;
     
    
}