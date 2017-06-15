<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /index.php');
 exit;
}
?>
<!DOCTYPE html>
<!--
Product Delete
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Lisa Smith">
        
        <link href="/acme/css/stylesheet.css" type="text/css" rel="stylesheet"/>
        
        <meta name="viewport" content="width=device-width, initial-scael 1.0">
        <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?> | Acme, Inc.</title>
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
            <div>
              <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>  
              <form method="post" action="/products/">
                    <fieldset>
                        
                        <label>Product Name</label><br>
                        <input type="text" readonly name="prodName" id="prodName"
                            <?php if(isset($prodName)){ echo "value='$prodName'"; } 
                        elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>><br>
                        
                        <label>Description</label><br>
                        <textarea name="prodDescription" readonly id="prodDescription">
                            <?php if(isset($prodDesccription)){ echo $prodDescription; }
                        elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?>
                        </textarea>
                        
                        <label>&nbsp;</label>
                        <input type="submit" name="submit" value="Delete Product">
                        
                        <input type="hidden" name="action" value="deleteProd">
                        <input type="hidden" name="prodId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
                        <p>Confirm Product Deletion. The delete is permanent.</p>
                        
                    </fieldset>
                </form>                
                
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
