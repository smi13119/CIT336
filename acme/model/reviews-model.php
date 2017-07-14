<?php

/* 
Reviews Model
 */

function newReview ($clientId, $invId, $reviewText) {
    //Create a connection using the acme connection function
    $db = acmeConnect();
    $sql = 'INSERT INTO reviews (reviewText, invId, clientId)'
            . 'Values (:reviewText, :invId, :clientId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId',$clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged=$stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getReviewsbyInv ($invId){
    $db = acmeConnect();
    $sql = 'SELECT clientFirstname,clientLastname, reviewText, reviewDate FROM reviews,clients WHERE reviews.clientId = clients.clientId AND invId= :invId ORDER BY reviewDate DESC ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $reviews;  
}

function getReviewbyId ($reviewId){
    $db = acmeConnect();
    $sql = 'SELECT clientFirstname,clientLastname, reviewText, reviewDate, invId FROM reviews,clients  WHERE reviews.clientId = clients.clientId AND reviewId= :reviewId ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
return $reviews [0];  
}
function getReviewbyClient ($clientId){
    $db =acmeConnect();
    $sql= 'SELECT invName, reviewDate, reviewId FROM reviews, inventory  WHERE inventory.invId=reviews.invId AND clientId =:clientId ORDER by reviewDate DESC ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $clientReview = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $clientReview;
    
}

function updateReview ($reviewId, $reviewText) {
    $db = acmeConnect();
    $sql ='UPDATE reviews SET reviewText=:reviewText WHERE reviewId=:reviewId';
    $stmt =$db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged =$stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
    
}

function deleteReview ($reviewId) {
    $db = acmeConnect();
    $sql = 'DELETE FROM reviews WHERE reviewID=:reviewID';
    $stmt= $db->prepare($sql);
    $stmt->bindValue(':reviewID', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return$rowsChanged;
    
}
