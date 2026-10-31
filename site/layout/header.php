
<?php
    include('model/database.php');
    include('model/cart.php');

    $db = db_connect();
    session_start();





    if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    
</head>

<body >

  <header class="header">

<section class="flex">

   <a href="home.php" class="logo">InfoTech</a>


   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="orders.php">orders</a>
      <a href="shop.php">shop</a>
      <a href="#footer">contact</a>
   </nav>

   <div class="icons">
            <?php
                if(isset($_SESSION['username'])){
                  $user_username = $_SESSION['username'];
                  $requete = count_cart_items($db,$user_username);
                  $total_cart_items = $requete-> rowCount();
               }
            ?>

      <div id="menu-btn" class="fas fa-bars"></div>
      <a href="search_page.php"><i class="fas fa-search"></i></a>
      <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php if(isset($_SESSION['username'])){ echo $total_cart_items;}else{echo '0';}; ?>) </span></a>
      <div id="user-btn" class="fas fa-user"></div>
   </div>

   <div class="profile">
         <?php if (isset($_SESSION['username'])) {?>
         <p><?php echo $_SESSION['username'] ?></p>
         <a href="update_user.php?username_sent=<?php echo $_SESSION['username'];?>" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <a href="user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php } else {?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php } ?>
   
      
   </div>

</section>

</header>