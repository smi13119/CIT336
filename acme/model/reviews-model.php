<?php

/* 
Reviews Model
 */

function review ($clientId, $invId, $reviewId) {
    //Create a connection using the acme connection function
    $db = acmeConnect();
    $sql = 'INSERT INTO reviews (reviewText, reviewData, invId, clientId)'
            . 'Values (:review, :reviewdata, :invId, :clientId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':review', $review, PDO::PARMA_STR);
    $stmt->bindValue(':reviewdata', $reviewdata, PDO::PARMA_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARMA_STR);
    $stmt->bindValue(':clientId',$clientId, PDO::PARMA_STR);
    $stmt->execute();
    $rowsChanged=$stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
