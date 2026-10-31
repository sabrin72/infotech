<?php

include('../model/database.php');
include('../model/products.php');


$id_product  =$_POST['id_product'];
$product_name  =$_POST['name'];
$product_price  = $_POST['price'];
$product_details  = $_POST['details'];
$product_qte  = $_POST['qte'];
$id_category = $_POST['category'];


$db = db_connect();

product_update($db,$id_product,$product_name,
$product_price,$product_details,$product_qte,$id_category);


$requete = product_get_one($db,$id_product);

$row =  $requete -> fetch(PDO::FETCH_ASSOC);

// ajout de la fonction de l'ajout du produit


$target_dir = "../uploads/".$row['id_product']."/";  //chemin cible // uploads/25
$target_pic1 = $target_dir . basename('pic1.png');
$target_pic2 = $target_dir . basename('pic2.png');
$target_pic3 = $target_dir . basename('pic3.png');
$uploadOk = 1;

$pic1img = $_FILES["pic1img"]["tmp_name"];
$pic2img = $_FILES["pic2img"]["tmp_name"];
$pic3img = $_FILES["pic3img"]["tmp_name"];
//move_uploaded_file($_FILES["mainimg"]["tmp_name"], $target_file);
rmdir($target_dir);
mkdir($target_dir);
move_uploaded_file($pic1img, $target_pic1);
move_uploaded_file($pic2img, $target_pic2);
move_uploaded_file($pic3img, $target_pic3);

header('location:products.php');

?>
