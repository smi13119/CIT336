<?php
if (session_id()== '') {
 header('location: /index.php');
 exit;
}
$clientData=$_SESSION['clientData'];
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
        <title> Account Update</title>
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
            
         
             <?php
                if  (isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset ($_SESSION['message']);
                }
                ?> 
            <h1>Modify your account information:</h1><br>
            <p> Please use the filed below to make any changes to your account info. </p>
                
            <form method="post" name='accountupdate' action="/acme/accounts/index.php?action=updateAccount">
                <fieldset>
                   
                    
                    <label>First Name</label><br>
                    <input type="text" name="upfirstName" id="upfirstName" required<?php if (isset($upfirstName)){echo "value='$upfirstName'";} elseif(isset($clientData['clientFirstname'])) {echo "value='$clientData[clientFirstname]'";}?>><br>
                    
                    
                    <label>Last Name</label><br>
                    <input type="text" name="uplastName" id="uplastName" required<?php if (isset($uplastname)){echo "value='$uplastname'";} elseif(isset($clientData['clientLastname'])) {echo "value='$clientData[clientLastname]'"; } ?>><br>
                    
                    
                    <label>Email Address</label>
                            <br>
                            <input type="text" name="upemail" id="upemail" required<?php if (isset($upemail)){echo "value='$upemail'";} elseif(isset($clientData['clientEmail'])) {echo "value='$clientData[clientEmail]'"; } ?>><br>
                            
                    <input type="hidden" name="updateId" value="<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                    <br>
                    <button type="submit" name="submit"> Update Data</button>
                    </fieldset>
            </form>
            <div>
                <form method ="post" action="/acme/accounts/index.php?action=updatePassword">
                    <fieldset>
                        <h1>Modify your Password:</h1>
                        <label for='uppassword'>Password</label><br>
                        
                        <span class="reduce">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                        
                        <input type="password" name="uppassword" id="uppassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.[a-z]).*$"<?php if (isset($uppassword)){echo "value='$updatepassword'";}
                    elseif(isset($clientData['clientPassword'])) {echo "value='$clientData[clientPassword]'"; }?>>><br><br>
                        <input type="submit" name="submit" value="Update Paswrod">
                   <input type="hidden" name="updateId" value="<?php if(isset($clientData['clientId'])){ echo $clientData['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">
                         
                    </fieldset>
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

