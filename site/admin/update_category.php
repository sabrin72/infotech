<?php
include '../layout/header_admin.php'; 

include ('../model/categories.php');


if(isset($_SESSION['admin_username'])){
   $user_username = $_SESSION['admin_username'];
}else{
   header('location:admin_login.php');
};




$id_category = $_GET['id_sent'];

$requete = category_get_one($db,$id_category);

$category = $requete -> fetch(PDO::FETCH_ASSOC);



?>


<head><title>register admin</title></head>



<section class="update-product">

   <h1 class="heading">update category</h1>


   <form action="update_category_save.php" method="post" enctype="multipart/form-data">

      <div class="image-container">
         <div class="main-image">
            <img src="../uploads/cat/<?php echo $category['id_category'];?>/pic1.png" alt="">
         </div>
      </div>
      <span>update name</span>
      <input class="col-8" type="text" name="id_category"  value="<?php echo $category['id_category']?>" hidden>
      <input type="text" name="name" required class="box" maxlength="100" placeholder="enter product name" value="<?php echo $category['category_name'];?>">
      <span>update image 01</span>
      <input type="file" name="pic1img" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="update">
         <a href="add_category.php" class="option-btn">go back</a>
      </div>
   </form>
   

</section>











<script src="../public/js/admin_script.js"></script>



</body>
</html>