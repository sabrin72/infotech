

<?php
include 'layout/header.php'; 


if(isset($_SESSION['username'])){

   $user_username = $_SESSION['username']; 
   $requete = products_cart ($db,$user_username);
   $products = $requete-> fetchAll();
}else{
   header('location:user_login.php');
};





?>

<head><title>checkout</title></head>



<section class="checkout-orders">

   <form action="checkout_save.php" method="POST">

   <h3>your orders</h3>


      <div class="display-orders">
      <?php
       $grand_total = 0;
       $cart_items[] = '';
        foreach ($products as $product){ 
               $cart_items[] = $product['product_name'].' ('.$product['product_price'].' x '. $product['qte'].') - ';
               $total_products = implode($cart_items);
      ?>
      <p><?php echo $product['product_name'] ?> <span>(<?php echo $product['product_price']  .'DA / x '. $product['qte']; ?>)</span> </p>
      <?php  $grand_total += ($product['product_price'] * $product['qte']);
       }
       
       ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" >
         <div class="grand-total">grand total : <span> <?php echo $grand_total ?> DA</span> </div>
      </div>



      <h3>place your orders</h3>

      <div class="flex">
         <div class="inputBox">
            <span>your fullname :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">cash en livraison</option>
               <option value="credit card">chèque</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address :</span>
            <input type="text" name="address" placeholder="ex Alger 54 rue 4 kouba" class="box" maxlength="255" required>
         </div>

         <div class="inputBox">
            <span>Ville :</span>
            <input type="text" name="city" placeholder="e.g. Alger" class="box" maxlength="50" required>
         </div>

      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">

   </form>

</section>

<?php
include 'layout/footer.php'; 
?>