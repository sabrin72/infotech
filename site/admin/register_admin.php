<?php
include '../layout/header_admin.php'; 
?>


<head><title>register admin</title></head>


     
<section class="form-container">

    <form action="register_adminTR.php" method="post">
      <h3>inscription</h3>
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="username" required placeholder="enter your username" maxlength="20"  class="box">
      <input type="password" name="password" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <!-- <input type="password" name="confirm_password" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"> -->
      <input type="submit" value="inscription" class="btn" name="submit">
      <p>vous avez deja un compte?</p>
      <a href="admin_login.php" class="option-btn">connexion</a>
   </form>
 
 </section>




 <script src="../public/js/admin_script.js"></script>
 
</body>
</html>