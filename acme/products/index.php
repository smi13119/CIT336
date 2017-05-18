<?php

/* 
Products Controller
 * 
 */

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';

//Get the products model
require_once '../model/products-model.php';



// Get the array of categories
$categories = getCategories();

require_once '../view/navlist.php';
require_once '../view/catlist.php';
include "../view/new-prod.php";



//var_dump($categories);
//exit;



//Build a catagrory drop down using the $catList array
