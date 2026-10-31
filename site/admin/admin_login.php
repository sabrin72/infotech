
<?php
include '../layout/header_admin.php'; 
?>

<head><title>login</title></head>





<section class="form-container">

    <form action="admin_loginTR.php" method="post">
       <h3>login now</h3>
       <input type="text" name="username" required placeholder="enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
       <input type="password" name="password" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
       <input type="submit" value="login now" class="btn" name="submit">
    </form>

 </section>

 <script src="../public/js/admin_script.js"></script>

 </body>
 </html>