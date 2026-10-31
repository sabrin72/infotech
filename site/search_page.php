
<?php
include 'layout/header.php'; 


include 'model/products.php'; 



// $requete = product_search($db,$search_box);

// $products = $requete-> fetchAll();


?>

<head><title>search page</title></head>




<section class="search-form">
   <form action="search_page_save.php" method="post">
      <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<section class="products" style="padding-top: 0; min-height:100vh;">

   <div class="box-container">

    <?php foreach ($products as $product){ ?>

    <form action="" method="post" class="box">
    <input class="col-8" type="text" name="id_product"  value="<?php echo $product['id_product']?>" hidden>
    <a href="quick_view.php?id_sent=<?php echo $product['id_product'];?>" class="fas fa-eye"></a>
    <img src="uploads/<?php echo $product['id_product'];?>/pic1.png" alt="">
    <div class="name"><?php echo $product['product_name'] ?></div>
    <div class="flex">
        <div class="price"><span><?php echo $product['product_price'];?>DZD</span></div>
        <input type="number" name="qte" class="qty" min="1" max="10" onkeypress="if(this.value.length == 2) return false;" value="1">
    </div>
    <input type="submit" value="add to cart" class="btn" name="add_to_cart">
    </form>

    <?php }?>


   </div>

</section>



 <?php
include 'layout/footer.php'; 
?>
