<!DOCTYPE html>
<!--
Product Detail
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $prodId; ?> Products | Acme, Inc.</title>
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
            <div>
                <h1> Detailed Information</h1>
               
                <?php if (isset($message)) { echo $message;}?>
                <?php if (isset($prodDetail)) { echo $prodDetail;}?>
                <?php if (isset($thumbnails)) { echo $thumbnails;}?>
            </div>
            
            <h3>Customer Reviews</h3>
            <?php if (isset($cookieFirstname)){?>
      
       
            <div>
                <form method="post" action="/acme/reviews/index.php?action=newReview">
                
                <p><strong>Review the <?php echo $product['invName'];?></strong></p>
            <?php if(isset($_GET['confirm']) && $_GET['confirm']=="true"){?>
                <p style="color:red; font-weight:bold">Thanks for the review, it is displayed below.</p>
                <?php }?>
                <p>Screen Name:</p>
                <input type="hidden" name="invId" value="<?php echo $product['invId'];?>"/>
                <input type="hidden" name="clientId" value="<?php echo $clientDate['clientId'];?>"/>
                <input type ="text" name = "user" disabled="disabled" value="<?php echo $cookieFirstname;?>"/>
                <p>Review?</p>
                <textarea style="display:block;height:75px" name="reviewText"></textarea>
                <button type="submit">Submit Review</button>
                </form>
            </div>
            <?php }
            else{ ?>
            <a href="/acme/admin.php">Login in to submit a review</a>
            <?php }?>
            
            <div>
                <?php foreach($reviews as $review){?>
                <div>
                    <p><?php echo $review['clientFirstname'];?> Wrote on <?php echo $review['reviewDate'];?></p>
                    <div>
                        <?php echo $reveiw['reviewText'];?>
                    </div>
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

