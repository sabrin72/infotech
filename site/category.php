
<?php
include 'layout/header.php'; 


$id = $_GET['id_sent'];


include ('model/categories.php');

$requete = category_get_products($db,$id);

$products = $requete-> fetchAll();

?>
<head><title>category page</title></head>



 <section class="products">
   
   <h1 class="heading"> category products</h1>
   
   <div class="box-container"> 

      
    <?php foreach ($products as $product){ ?>

    <form action="" method="post" class="box">
       <a href="quick_view.php?id_sent=<?php echo $product['id_product'];?>" class="fas fa-eye"></a>
       <img src="uploads/<?php echo $product['id_product'];?>/pic1.png" alt="product_image1">
       <div class="name"><?php echo $product['product_name'] ?></div>
       <div class="flex">
          <div class="price"><span><?php echo $product['product_price'];?>DZD</span></div>
          <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
       </div>
       <input type="submit" value="add to cart" class="btn" name="add_to_cart">

    </form>

    <?php }?>

    </div>
 
 </section>
 <?php
include 'layout/footer.php'; 
?>