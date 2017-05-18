<?php

/* 
Navlist
 */

// Build a navigation bar using the $categories array
$navList = '<ul>';
$navList .= '<li> <a class="navtabs" href="/acme/index.php" title="View the Acme home page">Home</a></li>';
foreach ($categories as $category) {
    
$navList .= '<li> <a class="navtabs" href="/acme/index.php?action='.$category["categoryName"].'" title="View our '.$category["categoryName"].' product line">'.$category["categoryName"].'</a></li>';
}
$navList .= '</ul>';

//echo $navList;
//exit;