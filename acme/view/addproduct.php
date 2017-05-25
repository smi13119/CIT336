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
                
                <?php echo $navList; ?>
                       
             </nav>   
            </div>
       
        <main id="page-main">
            <div>
                <h1>Add Product</h1>
                <h2>Add a new product below</h2>
                <h3> New Product</h3>
                <p><strong> <?php echo $message; ?></strong></p>
                <form class="newproductform" action="/acme/products/index.php?action=addNewProduct" method="post">
                   <label>Category</label>
                    <?php echo $catList; ?>
                    <label>Product Name</label>
                    <input type="text" name="invname" />
                    <label>Product Description</label>
                    <textarea rows="5" name="invdescription"></textarea>
                    <label>Product Image (path to image)</label>
                    <input type= "text" name="invimage" value="/acme/images/no-image.png" />
                    <label>Product Thumbnail (path to thumbnail)</label>
                    <input type="text" name="invthumbnail" />
                    <label>Product Price</label>
                    <input type="text" name="invprice" />
                    <label>Product Stock</label>
                    <input type="text" name="invstock" />
                    <label>Product Size</label>
                    <input type="text" name="invsize" />
                    <label>Product Weight</label>
                    <input type="text" name="invweight" />
                    <label>Product Location</label>
                    <input type="text" name="invlocation" />
                    <label>Product Vendor</label>
                    <input type="text" name="invvendor" />
                    <label>Product Style</label>
                    <input type="text" name="invstyle" />
                    <br>
                    <button type="submit"> Add New Product</button>
                                   
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
