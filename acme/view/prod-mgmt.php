<?php if (session_id()== ''|| $_SESSION['clientData']['clientLevel']<=2){
header('location:/acme/index.php');

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
}
   }?>
<!DOCTYPE html>
<!--
Product Management 
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
                <h1> Product Management</h1>
                <p> Welcome to the product management page. Please choose an option below:</p>
                <ul>
                    <li><a href="/acme/products/index.php?action=createCategory" title="Add Category">Add a New Category</a></li>
                    <li><a href="/acme/products/index.php?action=createProduct" title="Add a New Product">Add a New Product</a> </li>
                 </ul>
                        <?php
            if (isset($message)) {
            echo $message;
            } if (isset($prodList)) {
            echo $prodList;
}
?>
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
<?php unset($_SESSION['message']);?>