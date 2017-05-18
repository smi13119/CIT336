<!DOCTYPE html>
<!--
New Product
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
                <h1> Add Product</h1>
                <p>Add a new product below. All fields are required!</p>
                <form action="/acme/products/index.php">
                    <h2>Category</h2>
                    <?php echo $catList; ?>
                    <h2>Product Name</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Description</h2>
                    <textarea name="message" rows="5" cols="30"></textarea>
                    <h2>Product Image (path to image)</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Thumbnail (path to thumbnail)</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Price</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Stock</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Size</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Weight</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Location</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product ID</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Vendor</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <h2>Product Style</h2>
                    <textarea name="message" rows="1" cols="30"></textarea>
                    <br>
                    <input type="submit">
                                   
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
