<?php

/* 
Acme Controller
 */

// Get the database connection file
require_once 'library/connections.php';
// Get the acme model for use as needed
require_once 'model/acme-model.php';

// Get the array of categories
$categories = getCategories();

var_dump($categories);
exit;
// Build a navigation bar using the $categoreis array



$action =filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL){
        $action = 'home';
    }
}


switch ($action){
    case 'home':
        include 'view/home.php';
}

