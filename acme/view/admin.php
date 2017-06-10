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
                         <li>Emai: $email</li>
                         <li>Level: $level</li>
                 </ul>";
                 
                 if ($level ==3){
                 echo '<a href="/acme/products/index.php?action=prod-mgmt">Products</a><br>';
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

