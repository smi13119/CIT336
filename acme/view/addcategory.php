<?php if ($_SESSION['clientData']['clientLevel']< 2){
header('location:/acme/index.php');
exit;
   }?>
<!DOCTYPE html>
<!--
Add Category View
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
            <div>
                 <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
               
                <h1>Add Category</h1>
                
                <form action= "/acme/products/index.php?action=addNewCategory" method="post">
                      <input type="text" name="categoryName" <?php if(isset($categoryname)){echo "value='$categoryname'";} ?> required />
                    <br>
                    <button type='submit' >Add Category</button>
                </form>
            </div>
            
        </main>
            <footer id="page-footer">
                <div>
                <?php include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/footer.php';
                        ?>
                </div>
            </footer>
        </div>
    </body>
</html>
