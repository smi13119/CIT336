<?php

/* 
 Accounts Model for Site Visitors
 */




 function regVisitor($firstname, $lastname, $email, $password){
 //Create a connection object using the acme connection function 
     $db = acmeConnect();
 //The SQL statement
     $sql = 'INSERT INTO clients (clientFirstname, clientLastname, clientEmail,clientPassword)'
             . 'Values (:firstname, :lastname, :email, :password)';
 //Create the prepared statement using the acme connection
     $stmt = $db->prepare($sql);
 //The next four lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is
   $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
   $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
   $stmt->bindValue(':email', $email, PDO::PARAM_STR);
   $stmt->bindValue(':password', $password, PDO::PARAM_STR);
// Insert the data
   $stmt->execute();
// Ask how many rows changed as a result of our insert
   $rowsChanged = $stmt->rowCount();
// Close the database interaction
   $stmt->closeCursor();
// Return the indication of success (rows changed)
   return $rowsChanged; 
 }
 
 //check for an existing email address
 function checkExistingEmail($email){
 $db = acmeConnect();
 $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':email', $email, PDO::PARAM_STR);
 $stmt->execute ();
 $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
 $stmt->closeCursor();
 if (empty($matchEmail)){
     return 0;
 } else {
     return 1;
 }
 }
 // Get client data based on an email address
 function getClient($email){
     $db = acmeConnect();
     $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail= :email';
     $stmt = $db->prepare($sql);
     $stmt->bindValue(':email', $email, PDO::PARAM_STR);
     $stmt->execute();
     $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
     $stmt->closeCursor();
     return $clientData;
 }
// //Get client data based on email and password
// function getClientlogin($email,$password){
//     $db = acmeConnect();
//     $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail= :email and passord= :password';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':email, $email, PDO::PARAM_STR');
//     $stmt->bindValue(':password, $password, PDO::PARAM_STR');
//     $stmt->execute();
//     $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
//     $stmt->closeCursor();
//     return $clientData;
// }
 
// if (empty($matchEmail)){
//    //return 0;
//  echo 'Nothing found';
//  exit;
//} else {
//  //return 1;
//  echo 'Match found';
//  exit;
// }
// }
 