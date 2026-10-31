<?php
include '../layout/header_admin.php'; 


include ('../model/products.php');


if(isset($_SESSION['admin_username'])){
   $user_username = $_SESSION['admin_username'];
}else{
   header('location:admin_login.php');
};






$id_product = $_GET['id_sent'];

$requete = product_get_one($db,$id_product);

$product = $requete -> fetch(PDO::FETCH_ASSOC);


?>


<head><title>update products</title></head>



<section class="update-product">

   <h1 class="heading">update product</h1>


   <form action="update_product_save.php" method="post" enctype="multipart/form-data">
   <div class="sub-image">
            <img src="../uploads/<?= $product['id_product']; ?>/pic1.png" alt="">
            <img src="../uploads/<?= $product['id_product']; ?>/pic2.png" alt="">
            <img src="../uploads/<?= $product['id_product']; ?>/pic3.png" alt="">
         </div>
      </div>
      <input class="col-8" type="text" name="id_product"  value="<?php echo $product['id_product']?>" hidden>


      <span>product name (required):</span>
      <input type="text" class="box" value="<?= $product['product_name']; ?>" required maxlength="100" placeholder="enter product name" name="name">

      <span>product price (required):</span>
      <input type="number" min="1" class="box" value="<?= $product['product_price']; ?>" required max="9999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
      
      <span>product qte (required):</span>
      <input type="number" min="1" class="box" value="<?= $product['product_qte']; ?>" required max="1000" placeholder="enter product quantity" onkeypress="if(this.value.length == 10) return false;" name="qte">
      
      <span>product category (required):</span>
      <input type="number" min="1" class="box" value="<?= $product['id_category']; ?>" required max="1000" placeholder="enter product category" onkeypress="if(this.value.length == 10) return false;" name="category">
      
      <span>update details</span>
      <textarea name="details" class="box" required cols="30" rows="10"><?= $product['product_details']; ?></textarea>
      
      <span>update image 01</span>
      <input type="file" name="pic1img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>update image 02</span> 
      <input type="file" name="pic2img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>update image 03</span> 
      <input type="file" name="pic3img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="update">
         <a href="products.php" class="option-btn">go back</a>
      </div>
   </form>
   

</section>











<script src="../public/js/admin_script.js"></script>



</body>
</html>