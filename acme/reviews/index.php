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

/*collect the action
 */
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
/* call the buildNav function
 */
$navList = navigation();

//check if the firstname exists and get it's value
if(isset($_COOKIE ['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action) {
case 'review':
// Store the incoming Review
    $reviewId = filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT)
}