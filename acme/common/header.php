
<!--
Header
-->



        

      <figure class="header-left">
        <img class="img50p"  src='/acme/images/site/logo.gif' alt='Logo'/>
        </figure>

       
            <?php if(isset($cookieFirstname)){
            echo "<span>Welcome $cookieFirstname</span>";
        }?> 
<figure class="header-right">
        <img class="img50p" src='/acme/images/site/account.gif' alt='account'/>
    </figure>   
        <div class="logout"> 
     <?php
     
     
        if(isset($_SESSION['loggedin'])){
            echo '<div><a href="/acme/accounts/index.php?action=Logout">Logout</a></div>';
            } else {
            echo '<a href="/acme/accounts/index.php?action=login" title="Login or Register">My Account</a>';
            }
            ?>
    </div>
   
    

   