<?php
$catList = "<select name='categoryId' id=categoryId>";
$catList .= '<option value ="">Please Choose</option>';
foreach ($categoriesAndIds as $catAndId) {
    $catList .= "<option value='$catAndId[categoryId]'";
    if(isset($categoryId)){
    
    if($catAndId['categoryId'] === $categoryId){
      $catList .= ' selected ';
  }
}   
    $catList .= ">$catAndId[categoryName]</option>";
}
$catList .= "</select>";

if ($_SESSION['clientData']['clientLevel']< 2){
header('location:/acme/index.php');
exit;
}
?>
<!DOCTYPE html>
<!--
Add Category View
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
            <div>
               
                <h1>Add Product</h1>
               
                <p><strong> <?php echo $message; ?></strong></p>
                <form class="newproductform" action="/acme/products/index.php?action=addNewProduct" method="post">
                    <fieldset>
                   <label>Category</label>
                    <?php echo $catList; ?>
                    <label>Product Name</label>
                    <input type="text" name="invName"<?php if(isset($invName)){echo "value='$invName'";} ?> required><br>
                    <label>Product Description</label>
                    <textarea rows="5" name="invDescription" requied><?php if(isset($invDescription)){echo "value='$invDescription'";} ?></textarea>
                    <label>Product Image (path to image)</label>
                    <input type= "text" name="invImage" value="/acme/images/no-image.png"<?php if(isset($invImage)){echo "value='$invImage'";} ?> required><br>
                    <label>Product Thumbnail (path to thumbnail)</label>
                    <input type="text" name="invThumbnail"value="/acme/images/no-image.png"<?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required><br>
                    <label>Product Price</label>
                    <input type="number" name="invPrice"<?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required><br>
                    <label>Product Stock</label>
                    <input type="number" name="invStock"<?php if(isset($invStock)){echo "value='$invStock'";} ?> required><br>
                    <label>Product Size</label>
                    <input type="number" name="invSize" <?php if(isset($invSize)){echo "value='$invSize'";} ?> required><br>
                    <label>Product Weight</label>
                    <input type="number" name="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";} ?> required><br>
                    <label>Product Location</label>
                    <input type="text" name="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";} ?>  required><br>
                    <label>Product Vendor</label>
                    <input type="text" name="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";} ?> required><br>
                    <label>Product Style</label>
                    <input type="text" name="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";} ?> required>
                    <br>
                    <button type="submit"> Add New Product</button>
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
