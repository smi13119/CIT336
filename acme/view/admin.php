<!DOCTYPE html>
<!--
Admin View
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template - Structure</title>
        <meta name="author" content="Lisa Smith">
        
        <link href="/acme/css/stylesheet.css" type="text/css" rel="stylesheet"/>
        
        <meta name="viewport" content="width=device-width, initial-scael 1.0">
    </head>
    <body>
        <div id="page-container">
            <header id="page-header">
                
        <?php include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/header.php'
     
        ?>
              
            </header>
       
            <div class="navdiv">
           <nav  class="navtabs">
               <!-- include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/navigation.php'
                
        -->
                
                <?php echo navigation(); ?>
                       
             </nav>   
            </div>
       
        <main id="page-main">
            <h1>You are Logged in:</h1>
            <div class="userdata">
                
                <?php
                $firstname = $_SESSION['clientData']['clientFirstname'];
                $lastname = $_SESSION['clientData']['clientLastname'];
                $email = $_SESSION['clientData']['clientEmail'];
                $level = $_SESSION['clientData']['clientLevel'];
                
                 echo "<h1>$firstname $lastname</h1>
                     
                 <ul>
                         <li>First name: $firstname</li>
                         <li>Last name: $lastname</li>
                         <li>Email: $email</li>
                         
                 </ul>";
                 echo '<a href="/acme/accounts/index.php?action=client-update">Update Account Information</a><br>';
                 ?>
                 </div>
            <div class="userdata">
                
               <?php
                 if ($level ==3){
                 echo '<h2>Administrative Functions</h2><a href="/acme/products/index.php?action=prod-mgmt">Products</a><br>';
                         }
                         ?>
                
            </div>
            
            <div>
                <h1>Manage Your Product Reviews</h1>
                <?php $reviews=getReviewbyClient ($_SESSION['clientData']['clientId'])?>
                <?php foreach($reviews as $review){?>
                <div>
                    <p><?php echo $review['invName'];
                echo " Reviewed on "; 
                echo strftime("%d %B, %Y ", strtotime ($review ['reviewDate']));
                      echo "<a href='/acme/reviews?action=editReview&id=$review[reviewId]' title='Click to Edit'>Edit</a> ";
                      echo "<a href='/acme/reviews?action=confirmdeleteReview&id=$review[reviewId]' title='Click to Delete'>Delete</a>";
                              
                        ?></p>
                   
                </div>
                <?php }?>
            </div>
        </main>
            <footer id="page-footer">
                <div>
                <?php include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/footer.php'
                        ?>
                </div>
            </footer>
        </div>
    </body>
</html>


