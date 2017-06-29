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

