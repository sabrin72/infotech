
<?php
    include('../model/database.php');
    $db = db_connect();
    session_start();


   //  if(isset($_SESSION['admin_username'])){
   //    $user_username = $_SESSION['admin_username'];
   // }else{
   //    header('location:admin_login.php');
   // };




?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/admin_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
</head>
<body>


    <header class="header">

        <section class="flex">
     
           <a href="../admin/dashboard.php" class="logo">Admin<span>Panel</span></a>
     
           <nav class="navbar">
              <a href="../admin/dashboard.php">home</a>
              <a href="../admin/products.php">products</a>
              <a href="../admin/placed_orders.php">orders</a>
              <a href="../admin/admin_accounts.php">admins</a>
              <a href="../admin/users_accounts.php">users</a>
              <a href="../admin/add_category.php">categories</a>
           </nav>
     
           <div class="icons">
              <div id="menu-btn" class="fas fa-bars"></div>
              <div id="user-btn" class="fas fa-user"></div>
           </div>
     
           <div class="profile">
         <?php if (isset($_SESSION['admin_username'])) {?>
         <p><?php echo $_SESSION['admin_username'] ?></p>
         <a href="update_profile.php?username_sent=<?php echo $_SESSION['admin_username'] ?>" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="register_admin.php" class="option-btn">register</a>
            <a href="admin_login.php" class="option-btn">login</a>
         </div>
         <a href="../user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php } else {?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="register_admin.php" class="option-btn">register</a>
            <a href="admin_login.php" class="option-btn">login</a>
         </div>
         <?php } ?>
   
      
   </div>
     
        </section>
     
     </header>
