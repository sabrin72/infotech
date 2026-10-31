<?php


include '../layout/header_admin.php'; 


include ('../model/products.php');




$requete = product_get_all($db);

$products = $requete-> fetchAll();


?>

<head><title>Add Products</title></head>

     
<section class="add-products">

    <h1 class="heading">Ajouter un Produit</h1>
 
    <form action="product_add_save.php" method="post" enctype="multipart/form-data">
       <div class="flex">
          <div class="inputBox">
             <span>product name (required):</span>
             <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
          </div>
          <div class="inputBox">
             <span>product price (required):</span>
             <input type="number" min="1" class="box" required max="9999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
          </div>
          <div class="inputBox">
             <span>product qte (required):</span>
             <input type="number" min="1" class="box" required max="1000" placeholder="enter product quantity" onkeypress="if(this.value.length == 10) return false;" name="qte">
          </div>
          <div class="inputBox">
             <span>product category (required):</span>
             <input type="number" min="1" class="box" required max="1000" placeholder="enter product category" onkeypress="if(this.value.length == 10) return false;" name="category">
          </div>
         <div class="inputBox">
             <span>image 01 (required):</span>
             <input type="file" name="pic1img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
         </div>
         <div class="inputBox">
             <span>image 02 (required):</span>
             <input type="file" name="pic2img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
         </div>
         <div class="inputBox">
             <span>image 03 (required):</span>
             <input type="file" name="pic3img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
         </div>
          <div class="inputBox">
             <span>product details (required):</span>
             <textarea name="details" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
          </div>
       </div>
       
       <input type="submit" value="add product" class="btn" name="add_product">
    </form>
 
 </section>
 
 <section class="show-products">
 
    <h1 class="heading">products added</h1>
 
    <div class="box-container">
 




    <?php foreach ($products as $product){ ?>

    <div class="box">
       <img src="../uploads/<?php echo $product['id_product'];?>/pic1.png" alt="">
       <div class="name"><?php echo $product['product_name'] ?></div>
       <div class="price"><span><?php echo $product['product_price'];?> DZD</span></div>
       <div class="price"> QTE : <span><?php echo $product['product_qte'];?></span></div>
       <div class="details"><span><?php echo $product['product_details'] ?></span></div>
       <div class="flex-btn">
          <a href="update_product.php?id_sent=<?php echo $product['id_product'];?>" class="option-btn">update</a>
          <a href="delete_product.php?id_sent=<?php echo $product['id_product'];?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
       </div>
    </div>
<?php }?>
    
    </div>
 
 </section>

 





 <script src="../public/js/admin_script.js"></script>
 
    </body>
    </html>