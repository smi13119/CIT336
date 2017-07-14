<!DOCTYPE html>
<!--
review-update view
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
            <main>
            <h3><?php echo $product['invName'];?> Review </h3>
      <?php
                if (isset($message)){
                    echo $message;
                }
                ?>
            <p><?php echo strftime("%d %B, %Y ", strtotime ($review ['reviewDate']));?></p>
            <div>
                <form method="post" action="/acme/reviews/index.php?action=updateReview">
                
                <p>Review Text</p>
                <textarea class="reviewtext"  name="reviewText" required ><?php echo $review['reviewText']?></textarea>
                <br>
                <input type="hidden" name="action" value="updateReview">
                <input type="hidden" name="reviewId" value="<?php echo$reviewId?>">
                <button type="submit">Update Review</button>
                </form>
            </div>
            </main>
            <footer id="page-footer">
                <div>
                <?php include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/footer.php';
                        ?>
                </div>
            </footer>
    </body>
     
</html>
