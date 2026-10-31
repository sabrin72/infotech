<?php
include '../layout/header_admin.php'; 

include ('../model/categories.php');

$requete = category_get_all($db);

$categories = $requete-> fetchAll();



?>

<head><title>Add category</title></head>

     
<section class="add-products">

    <h1 class="heading">Ajouter une categorie</h1>
 
    <form action="add_category_save.php" method="post" enctype="multipart/form-data">
       <div class="flex">
          <div class="inputBox">
             <span>category name (required)</span>
             <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
          </div>
         <div class="inputBox">
             <span>image (required)</span>
             <input type="file" name="pic1img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
       
       <input type="submit" value="add category" class="btn" name="add_product">
    </form>
 
 </section>
 
 <section class="show-products">
 
    <h1 class="heading">categories ajoutées </h1> 
 
    <div class="box-container">
 
 <?php foreach ($categories as $category){ ?>

    <div class="box">
       <img src="../uploads/cat/<?php echo $category['id_category'];?>/pic1.png" alt="">
       <div class="name"><?php echo $category['category_name'];?></div>
       <div class="flex-btn">
          <a href="update_category.php?id_sent=<?php echo $category['id_category'];?>" class="option-btn">update</a>
          <a href="delete_category.php?id_sent=<?php echo $category['id_category'];?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
       </div>
    </div>

<?php }?>    
    </div>
 
 </section>


 <a href="" class="swiper-slide slide">
     <img src="" alt="">
     <h3></h3>
  </a>







 <script src="../public/js/admin_script.js"></script>
 
    </body>
    </html>