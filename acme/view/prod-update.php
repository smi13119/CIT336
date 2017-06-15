<?php
if ($_SESSION['clientData']['clientLevel']< 2){
header('location:/acme/index.php');
exit;
}
?>
<?php
$catList = "<select name='catType' id=catType>";
$catList .= '<option value ="">Please Choose</option>';
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'";
    if(isset($catType)){
    
    if($catAndId['categoryId'] === $catType){
      $catList .= ' selected ';
  }
  
} elseif (isset($prodInfo['categoryId'])) {
  if($catAndId['categoryId'] === $prodInfo['categoryId']){
   $catList .= ' selected ';
  } 
}
    $catList .= ">$catAndId[categoryName]</option>";
}
$catList .= "</select>";


?>
<!DOCTYPE html>
<!--
Add Category View
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?>| Acme,Inc</title>
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
            <div>
                <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($prodName)) { echo $prodName; }?></h1>
                <p><b>Modify Product</b></p>
                <?php
                if (isset($message)){
                    echo $message;
                }
                ?>
               
                
               <form class="modifyproductform" action="/acme/products/index.php?action=updateProd" method="post">
                    <fieldset>
                        <label>Category</label><br>
                    <?php echo $catList; ?><br>
                    
                    <label>Product Name</label>
                    <input type='text' name='prodName' id="prodName" required
                        <?php if(isset($prodName)){echo "value='$prodName'";}
                        elseif(isset($prodInfo['invName'])){echo "value='$prodInfo[invName]'"; }?>><br>
                    
                        <label>Description</label><br>
                        <textarea rows="5" id="prodDescription" name="prodDescription" required>  
                            <?php if(isset($prodDescription)){echo $prodDescription; }
                        elseif(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; }?></textarea><br>
                        
                        <label>Product Image</label><br>
                        <input id="prodImage" type="text" name="prodImage"  required 
                            <?php if(isset($prodImage)){echo "value='$prodImage'";}
                            elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; }?>><br>
                        
                        <label>Product Thumbnail</label><br>
                        <input type="text" id="prodThumbnail" name="prodThumbnail" required
                            <?php if(isset($prodThumbnail)){echo "value='$prodThumbnail'";}
                            elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }?>><br>
                        
                        <label>Product Price</label><br>
                        <input type="text" id="prodPrice" name="prodPrice" <?php if(isset($prodPrice))
                        {echo "value='$prodPrice'";}elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; } ?> required ><br>
                        <label>Product Stock</label><br>
                        <input type="text" id="prodStock" name="prodStock"  <?php if(isset($prodStock))
                        {echo "value='$prodStock'";}elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; } ?> required >  <br>
                        <label>Product Size</label><br>
                        <input type="text" id="prodSize" name="prodSize" <?php if(isset($prodSize))
                        {echo "value='$prodSize'";}elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; } ?> required ><br>
                        <label>Product Weight</label><br>
                        <input type="text" id="prodWeight" name="prodWeight" <?php if(isset($prodWeight))
                        {echo "value='$prodWeight'";}elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; } ?> required ><br>
                        <label> Product Location</label><br>
                        <input type="text" id="prodLocation" name="prodLocation"  <?php if(isset($prodLocation))
                        {echo "value='$prodLocation'";}elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; } ?> required ><br>
                        <label>Product Vendor</label><br>
                        <input type="text" id="prodVendor" name="prodVendor" <?php if(isset($prodVendor))
                        {echo "value='$prodVendor'";}elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; } ?> required ><br>
                        <label>Product Style</label><br>
                        <input type="text" id="prodStyle" name="prodStyle"  <?php if(isset($prodStyle))
                        {echo "value='$prodStyle'";}elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; } ?> required ><br><br>
    
                    <input type="hidden" name="action" value="updateProd">
                    <input type="hidden" name="prodId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($prodId)){ echo $prodId; } ?>">

                    
                    <button type="submit" name="submit"> Modify Product</button>
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

