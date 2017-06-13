<?php

/* 
 *Functions
 */

/* checkEmail($email)
 * 
 */
function checkEmail ($email){
    $sanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $vanEmail = filter_var($sanEmail, FILTER_VALIDATE_EMAIL);
    return $vanEmail;
    
}

/* checkPassword($pasword)
 * Check the password for a minimim of 8 characters, at least one 1 capital letter, at least 1 number and at least 1 specail character
 */

function checkPassword ($password){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $password);
}

function navigation(){
    $categories = getCategories();
    
$navList = '<ul>';
$navList .= '<li> <a class="navtabs" href="/acme/index.php" title="View the Acme home page">Home</a></li>';
foreach ($categories as $category) {
    
$navList .= '<li> <a class="navtabs" href="/acme/index.php?action='.$category["categoryName"].'" title="View our '.$category["categoryName"].' product line">'.$category["categoryName"].'</a></li>';
}
$navList .= '</ul>';
return $navList;

}