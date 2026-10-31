<?php
include 'layout/header.php'; 


$id = $_GET['id_sent'];

include ('model/products.php');

$requete = product_get_one($db,$id);

$product = $requete-> fetch(PDO::FETCH_ASSOC);



?>

<head><title>quick view</title></head>


 <section class="quick-view">

    <h1 class="heading">details <?php echo $product['product_name'] ?></h1>

  
    <form action="cart_save.php" method="post" class="box" >
    <input class="col-8" type="text" name="id_product"  value="<?php echo $product['id_product']?>" hidden>
       <div class="row">
          <div class="image-container">
             <div class="main-image">
                <img src="uploads/<?php echo $product['id_product'];?>/pic1.png" alt="">
             </div>
             <div class="sub-image">
                <img src="uploads/<?php echo $product['id_product'];?>/pic2.png" alt="">
                <img src="uploads/<?php echo $product['id_product'];?>/pic3.png" alt="">
             </div>
          </div>
          <div class="content">
             <div class="name"><?php echo $product['product_name'] ?></div>
             <div class="flex">
                <div class="price"><span><?php echo $product['product_price'];?></span>DZD<span></span></div>
                <input type="number" name="qte" class="qty" min="1" max="10" onkeypress="if(this.value.length == 2) return false;" value="1">
             </div>
             <div class="details"><?php echo $product['product_details'];?></div>
             <div class="flex-btn">
                <input type="submit" value="add to cart" class="btn" name="add_to_cart">
             </div>
          </div>
       </div>
    </form>
 
 </section>


 <?php
include 'layout/footer.php'; 
?>