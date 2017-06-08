
<!--
Header
-->



        <?php if(isset($cookieFirstname)){
            echo "<span>Welcome $cookieFirstname</span>";
        }?>

      <figure class="header-left">
        <img class="img50p"  src='/acme/images/site/logo.gif' alt='Logo'/>
        
    </figure>
    
    <figure class="header-right">
        <img class="img50p" src='/acme/images/site/account.gif' alt='account'/>
        <figcaption class="inlinecaption"><a href = '/acme/accounts/index.php?action=login'>My Account</a></figcaption>
    </figure> 
    

   