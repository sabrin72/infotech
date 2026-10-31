
<?php
include 'layout/header.php'; 


   
   if(isset($_SESSION['username'])){
      $user_username = $_SESSION['username'];
   }else{
      header('location:user_login.php');
   };


   if(isset($_GET['delete_all'])){

      cart_delete($db);

      header('location:cart.php');
         
}



   if(isset($_POST['delete'])){

      $id_product  =$_POST['id_product'];

      cart_delete_one($db,$id_product);
      header('location:cart.php');
         
}


   if(isset($_POST['update_qty'])){

      $qte = $_POST['qte'];
      $id_product  =$_POST['id_product'];
      $user_username = $_SESSION['username'];
      
      cart_update($db,$id_product,$qte,$user_username);

      header('location:cart.php');
      
   }

   $requete = products_cart ($db,$user_username) ;

   $products = $requete-> fetchAll();

?>

<head><title>Panier</title></head>



 <section class="products shopping-cart">

    <h3 class="heading">votre Panier</h3>
 
    <div class="box-container">

    <?php $grand_total = 0; foreach ($products as $product){    ?>

    <form action="" method="post" class="box">
    <input class="col-8" type="text" name="id_product"  value="<?php echo $product['id_product']?>" hidden>
       <a href="quick_view.php?id_sent=<?php echo $product['id_product'];?>" class="fas fa-eye"></a>
       <img src="uploads/<?php echo $product['id_product'];?>/pic1.png" alt="">
       <div class="name"><?php echo $product['product_name'] ?></div>
       <div class="flex">
          <div class="price"><?php echo $product['product_price'] ?> DA</div>
          <input type="number" name="qte" class="qty" min="1" max="10" onkeypress="if(this.value.length == 2) return false;" value="<?php echo $product['qte'] ?>">
          <button type="submit" class="fas fa-edit" name="update_qty"></button>
       </div>
       <div class="sub-total"> sub total : <span> <?php echo $sub_total =  ( $product['product_price'] * $product['qte'] ) ?> DA</span>  </div>
       <input type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="delete-btn" name="delete">
    </form>

    <?php $grand_total += $sub_total; 
    } ?>

    </div>

    <div class="cart-total">
       <p> grand total : <span><?php echo $grand_total; ?> DA</span> </p>
       <a href="shop.php" class="option-btn">continue shopping</a>
       <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a>
       <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
    </div>
 
 </section>



 <?php
include 'layout/footer.php'; 
?>
