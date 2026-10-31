<?php



include 'layout/header.php'; 


include 'model/categories.php';
include 'model/products.php';
// include 'model/user.php';


$requete = category_get_all($db);

$categories = $requete-> fetchAll();


$requete1 = product_get_lastThree($db);

$products = $requete1-> fetchAll();

?>


<head><title>home</title></head>

 
<div class="home-bg">

  <section class="home">
  
     <div class="swiper home-slider">
     
     <div class="swiper-wrapper">
  
        <div class="swiper-slide slide">
           <div class="image">
              <img src="public/img/XIAOMI.png" alt="">
           </div>
           <div class="content">
              <span>upto 50% off</span>
              <h3>latest smartphones</h3>
              <a href="shop.html" class="btn">shop now</a>
           </div>
        </div>
  
        <div class="swiper-slide slide">
           <div class="image">
              <img src="public/img/iphone_13_PNG6.png" alt="">
           </div>
           <div class="content">
              <span>upto 50% off</span>
              <h3>Best smartphones</h3>
              <a href="shop.html" class="btn">shop now</a>
           </div>
        </div>
  
        <div class="swiper-slide slide">
           <div class="image">
              <img src="public/img/nova5t-purple.png" alt="">
           </div>
           <div class="content">
              <span>upto 50% off</span>
              <h3>latest laptops</h3>
              <a href="shop.php" class="btn">shop now</a>
           </div>
        </div>
  
     </div>
  
        <div class="swiper-pagination"></div>
  
     </div>
  
  </section>
  
  </div>


  

  
<section class="category">

  <h1 class="heading">Categories</h1>

  <div class="swiper category-slider">

  <div class="swiper-wrapper">

  <?php foreach ($categories as $category){ ?>

  <a href="category.php?id_sent=<?php echo $category['id_category'];?>" class="swiper-slide slide">
     <img src="uploads/cat/<?php echo $category['id_category'];?>/pic1.png" alt="">
     <h3><?php echo $category['category_name'];?></h3>
  </a>

  <?php }?>

  </div>

  <div class="swiper-pagination"></div>

  </div>

</section>


<section class="products">

   <h1 class="heading"> lastest products </h1>
   
   <div class="box-container"> 


      
    <?php foreach ($products as $product){ ?>

    <form action="cart_save.php" method="post" class="box">
    <input class="col-8" type="text" name="id_product"  value="<?php echo $product['id_product']?>" hidden>
       <a href="quick_view.php?id_sent=<?php echo $product['id_product'];?>" class="fas fa-eye"></a>
       <img src="uploads/<?php echo $product['id_product'];?>/pic1.png" alt="product_image1">
       <div class="name"><?php echo $product['product_name'] ?></div>
       <div class="flex">
          <div class="price"><span><?php echo $product['product_price'];?>DZD</span></div>
          <input type="number" name="qte" class="qty" min="1" max="10" onkeypress="if(this.value.length == 2) return false;" value="1">
       </div>
       <input type="submit" value="add to cart" class="btn" name="add_to_cart">

    </form>

    <?php }?>
 
    </div>
 
 </section>


<?php
include 'layout/footer.php'; 
?>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

