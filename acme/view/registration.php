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
                <form action='registration.php'>
                    First Name:<br>
                    <input type='text'  name='firstname' required>
                    <br>
                    Last Name:<br>
                    <input type ='text' name='lastname' required>
                    <br>
                    Email Address:<br>
                    <input type='text' name='emailaddress' required>
                    <br>
                    Password:<br>
                    <input type='text' name='password' required>
                    <br><br>
                    <input type='submit' value='Submit'>
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

