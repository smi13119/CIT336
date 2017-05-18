<?php

/* 
 Catlist
 */


// Build a catlist   array
$catList = '<select name="categories">';
$catList .= '<option value ="">Please Choose</option>';
foreach ($categories as $category) {
    
$catList .= '<option value="'. $category["categoryId"].'">'.$category["categoryName"].'</option>';
}
$catList .= '</select>';

//echo $navList;
