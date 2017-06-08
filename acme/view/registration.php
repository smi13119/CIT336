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
                
                <?php echo navigation();?>
                       
             </nav>   
            </div>
       
        <main id="page-main">
            <div>
                <h1>Acme Registration</h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                 
                <form method="post" action="/acme/accounts/index.php">
                  
                    <label for="firstname">First Name:</label>
                    <br>
                    <input type='firstname' name='firstname' id='firstname'<?php if (isset($firstname)){echo "value='$firstname'";} ?> required>
                    <br>
                    <label for="lastname">Last Name:</label>
                        <br>
                    <input type ='text' name='lastname' id='lastname'<?php if (isset($lastname)){echo "value='$lastname'";} ?> required>
                    <br>
                    <label for="email">Email Address:</label>
                    <br>
                    <input type='email' name='email' id='email'<?php if (isset($email)){echo "value='$email'";} ?> required>
                    <br>
                    <label for="password">Password:</label>
                    <br>
                    <span class="reduce">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                    <br>
                    <input type='password' name='password' id='password' required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.[a-z]).*$">
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

