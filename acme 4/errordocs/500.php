<!DOCTYPE html>
<!--
This page is to display when there is an error in the database
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
       
            <nav id="page-nav">
               
                <?php include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/navigation.php'
                        ?>
              
            </nav>
       
        <main id="page-main">
            <div>
                <h1> Server Error</h1>
                <p> Sorry, the server experienced </p>
                
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


