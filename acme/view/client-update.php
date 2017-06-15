<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /index.php');
 exit;
}
?>
<?php
if (isset ($message)) {
    echo $message;
} if (isset($clientList)) {
    echo $clientList;
}
?>
<!DOCTYPE html>
<!--
template 
-->
<html>
    <head>
        <meta charset="UTF-8">
        
        <meta name="author" content="Lisa Smith">
        
        <link href="/acme/css/stylesheet.css" type="text/css" rel="stylesheet"/>
        
        <meta name="viewport" content="width=device-width, initial-scael 1.0">
        <title><?php if (isset?></title>
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
            <h1><?php if(isset?></h1>
            
            <form method="post" action="/acme/accounts/index.php?action=updateAccount">
                <fieldset>
                    <p>Modify your account information:</p>
                    <?php
                    if(isset($message)){
                        echo $message;
                    }
                    ?>
                    <lable>First Name</lable>
                    <input type="text" name="firstName" id="firstName" required
                    <?php if
                        ?>><br>
                    
                    <lable>Last Name</lable>
                    <input type="text" name="lastName" id="lastName" required
                    <?php if
                        ?>><br>
                    
                    <lable>Email Address<label>
                    <input type="text" name="email" id="email" required
                    <?php if
                        ?>><br>
                    </fieldset>
            </form>
            <div>
                <form method ="post" action="/acme/accounts/index.php?action=updatePassword">
                    <fieldset>
                        <p>Modify your Email:</p>
                        <lable>Email</lable>
                        <input type="text" name="email" id="email" required
                        <?php if
                            ?>><br>
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

