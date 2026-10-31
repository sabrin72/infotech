
<?php
include '../layout/header_admin.php'; 

include '../model/user.php';

$requete = user_get_admins($db);

$users = $requete-> fetchAll();


?>

<head><title>Admins accounts</title></head>



<section class="accounts">

   <h1 class="heading">admin accounts</h1>

   <div class="box-container">

   <div class="box">
      <p>add new admin</p>
      <a href="register_admin.php" class="option-btn">register admin</a>
   </div>
   <?php foreach ($users as $user){ ?>

      <div class="box">
         <p> admin id : <span><?php echo $user['id_user'];?></span> </p>
         <p> admin name : <span><?php echo $user['user_username'];?></span> </p>
         <div class="flex-btn">
            <a href="user_delete.php?id_sent=<?php echo $user['id_user'];?>" onclick="return confirm('delete this account?')" class="delete-btn">delete</a>

         </div>
      </div>

   <?php }?>




   </div>

</section>










<script src="../public/js/admin_script.js"></script>




</body>
</html>