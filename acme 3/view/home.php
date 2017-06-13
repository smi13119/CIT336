<!DOCTYPE html>
<!--
Home Page
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page - Structure</title>
        
        <link href="/acme/css/stylesheet.css" type="text/css" rel="stylesheet"/>
        
        <meta name="author" content="Lisa Smith">
        <meta name="viewport" content="width=device-width, initial-scale 1.0">
    </head>
    <body>
        <div id="page-container">
            <header id="page-header">
               
        <?php include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/header.php'
     
        ?>
              
            </header>
            <div class="navdiv">
           <nav  class="navtabs">
  <!--    include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/navigation.php'
                
        -->
            <?php echo $navList; ?>
        
             </nav>   
            </div>
            
        <main  id="page-main">
            
            <h1>Welcome to Acme </h1>
            <div class="banner-home">
                
            
            <div class="banner-home-text">
            
                <ul class="banner-home-ul"> 
                    <li><h2 class="no-bottom-margin">Acme Rocket</h2></li>
                    <li>Quick lighting fuse</li>
                    <li>NHTSA approved seat belts</li>
                    <li>Mobile launch stand included</li>
                    <li> <button type="button" onclick="alert('Hello World')" class="home-banner-button">I Want It Now!
                </button></li>
                </ul>
               
            </div>
            
           
              
               </div>
            
            <div class="block-left flexcontainer">
            <h3>Featured Recipes</h3>
            <figure class="feature-recipe flexitem">
                <img src='/acme/images/recipes/bbqsand.jpg' alt='bbqsand'/>
        
                <figcaption>Pulled Road Runner BBQ</figcaption>
            </figure>
            
            <figure class="feature-recipe flexitem">
                <img  src='/acme/images/recipes/potpie.jpg' alt='potpie'/>
                
                <figcaption>Roadrunner Pot Pie</figcaption>
            </figure>
            
            <figure class="feature-recipe flexitem">
                <img src='/acme/images/recipes/soup.jpg' alt='soup'/>
                
                <figcaption>Roadrunner Soup</figcaption>
            </figure>
            
            <figure class="feature-recipe flexitem">
                <img  src='/acme/images/recipes/taco.jpg' alt='tacos'/>
                <figcaption>Roadrunner Tacos</figcaption>
            </figure>
            
            </div>
            
            <div class="block-right">
            <h3>Get Dinner Rocket Reviews</h3>
            <ul>
                <li><q>I don't know how I ever caught roadrunners before this.</q>(4/5)</li>
                <li><q>That thing was fast!</q>(4/5)</li>
                <li><q>Talk about fast delivery.</q>(5/5)</li>
                <li><q>I didn't even have to pull the meat apart</q>(4.5/5)</li>
                <li><q>I'm on my thirtieth one. I love these things!</q>(5/5)</li>
            </ul>
            </div>
            
           

        </main>
            
       
                
         
           
            <footer  id="page-footer">
                <div>
                <?php include $_SERVER ['DOCUMENT_ROOT']. '/acme/common/footer.php'
                        ?>
                </div>
            </footer>
        </div> 
    </body>
</html>
