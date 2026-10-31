<?php

include('model/database.php');
include('model/products.php');

$db=db_connect();






     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
      

     product_search($db,$search_box);

    }

    header('location:search_page.php');  
     
   ?> 