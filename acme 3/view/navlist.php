<ul>
<li> <a class="navtabs" href="/acme/index.php" title="View the Acme home page">Home</a></li>
<?php foreach ($categoriesAndIds as $categoryAndId){ ?>

<li><a class="navtabs" href="/acme/index.php?action='<?php echo $categoryAndId["categoryName"]; ?>" title="View our <?php echo $categoryAndId["categoryName"]; ?> product line"><?php echo $categoryAndId["categoryName"]; ?></a></li>
<?php } ?>
</ul>
