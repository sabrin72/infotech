<?php
include 'layout/header.php'; 


include ('model/products.php');

$requete = product_get_all($db);

$products = $requete-> fetchAll();


?>
<head><title>Shop</title></head>

 

 <section class="products">
   <h1 class="heading"> products </h1>
      <div class="box-container"> 
    <?php foreach ($products as $product){ ?>

    <form action="cart_save.php" method="post" class="box">
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