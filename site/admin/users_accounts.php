
<?php
include '../layout/header_admin.php'; 

include '../model/user.php';

if(isset($_SESSION['admin_username'])){
   $user_username = $_SESSION['admin_username'];
}else{
   header('location:admin_login.php');
};




$requete = user_get_users($db);

$users = $requete-> fetchAll();

?>


<head><title>users list</title></head>



<section class="accounts">

   <h1 class="heading">user accounts</h1>

   <div class="box-container">

 <?php foreach ($users as $user){ ?>

   <div class="box">
      <p> user id : <span><?php echo $user['id_user'];?></span> </p>
      <p> username : <span><?php echo $user['user_username'];?></span> </p>
      <p> email : <span><?php echo $user['user_email'];?></span> </p>
      <a href="users_accounts.php?id_sent=<?php echo $user['id_user'];?>" onclick="return confirm('delete this account? the user related information will also be delete!')" class="delete-btn">delete</a>
   </div>

<?php }?>



   </div>

</section>












<script src="../public/js/admin_script.js"></script>
   
</body>
</html>