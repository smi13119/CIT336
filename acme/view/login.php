<!DOCTYPE html>
<!--
Login
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
            <h1> Login</h1>
            <div>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <form action="/acme/accounts/index.php?action=login" method="post">
                    <fieldset>
                        <label for="email">Email address:</label>
                        <br>
                    <input type='email' name="email" id="email"<?php if (isset($email)){echo "value='email'";} ?> required>
                    <br>
                    <label for="password">Password:</label>
                    <br>
                    <span class="reduce">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                    <br>
                    <input type='password' name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <br><br>
                    <input type='hidden' name="action" value='Login'>
                    <input type='submit' value='Login'>
                   
                    </fieldset>
                </form>
                
            </div>
            <h2>Not a Member?</h2>
                <form method="post" action="../accounts/index.php?action=registration">
                    <fieldset>
                        <button type="submit">Register Here</button>
                    </fieldset>
                </form>
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

