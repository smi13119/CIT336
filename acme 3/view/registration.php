<!DOCTYPE html>
<!--
Registration 
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
                
                <?php echo $navList; ?>
                       
             </nav>   
            </div>
       
        <main id="page-main">
            <div>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                 
                <form method="post" action="/acme/accounts/index.php">
                    First Name:<br>
                    <input type='text'  name='firstname' id= 'firstname' required>
                    <br>
                    Last Name:<br>
                    <input type ='text' name='lastname' id= 'lastname' required>
                    <br>
                    Email Address:<br>
                    <input type='text' name='emailaddress' id= 'email' required>
                    <br>
                    Password:<br>
                    <input type='text' name='password' id='password' required>
                    <br><br>
                    <input type='submit' value='Submit'>
                    <!--Add the action name - value pair -->
                    <input type="hidden" name="action" value="register">
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

