<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /index.php');
 exit;
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
        <title></title>
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
                         
                 </ul>";
                 ?>
                 </div>
             <?php
                if (isset($message)){
                    echo $message;
                }
                ?>
            <form method="post" name='accountupdate' action="/acme/accounts/index.php?action=updateAccount">
                <fieldset>
                    <h1>Modify your account information:</h1>
                    
                    <label>First Name</label><br>
                    <input type="text" name="upfirstName" id="upfirstName" required<?php if (isset($upfirstName)){echo "value='$upfirstName'";} ?>><br>
                    
                    
                    <label>Last Name</label><br>
                    <input type="text" name="uplastName" id="uplastName" required<?php if (isset($uplastname)){echo "value='$uplastname'";} ?>><br>
                    
                    
                    <label>Email Address<label><br>
                            <input type="text" name="upemail" id="upemail" required<?php if (isset($upemail)){echo "value='$upemail'";} ?>><br>
                            
                    <input type="hidden" name="updateId" value="<?php if(isset($clientinfo['clientId'])){ echo $clientinfo['clientId'];} elseif(isset($clientId)){ echo $updateId; } ?>">
                    <button type="submit" name="submit"> Update Data</button>
                    </fieldset>
            </form>
            <div>
                <form method ="post" action="/acme/accounts/index.php?action=updatePassword">
                    <fieldset>
                        <h1>Modify your Password:</h1>
                        <label>Password</lable><br>
                        <input type="text" name="uppassword" id="uppassword" required
                   
                         <button type="submit" name="submit"> Update Data</button>      
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

