<?php
include 'layout/header.php'; 

?>


<head><title>home</title></head>

<head><title>login</title></head>

   <section class="form-container">

    <form action="user_loginTR.php" method="post">
       <h3>connexion</h3>
       <input type="text" name="username" required placeholder="enter your username" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
       <input type="password" name="password" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
       <input type="submit" value="connexion" class="btn" name="submit">
       <p>vous n'avez pas de compte ? </p>
       <a href="user_register.php" class="option-btn">inscription</a>
    </form>
 
 </section>


 <?php
include 'layout/footer.php'; 
?>