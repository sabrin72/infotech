
<?php
include '../layout/header_admin.php';


include ('../model/user.php');


$username = $_GET['username_sent'];

$requete = user_get_admins($db,$username);

$user = $requete -> fetch(PDO::FETCH_ASSOC);
 
?>


<head><title>update profile</title></head>




<section class="form-container">

   <form action="admin_update_save.php" method="post">
      <h3>update now</h3>
      <input type="text" name="A_username" required maxlength="20"  class="box" value="<?php echo $user['user_username']?>">
      <input type="text" name="username" required placeholder="enter your new username" maxlength="20"  class="box" >
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?php echo $user['user_email']?>">
      <input type="password" name="password" placeholder="enter your new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" class="btn" name="submit">
   </form>

</section>






<script src="../public/js/admin_script.js"></script>
   
</body>
</html>