<?php

include('../model/database.php');
include('../model/categories.php');


$category_name  =$_POST['name'];


$db = db_connect();

category_add($db, $category_name);


$lastInsert = category_get_last($db);

$row =  $lastInsert -> fetch(PDO::FETCH_ASSOC);




$target_dir = "../uploads/cat/".$row['id_category'].'/';  
$target_pic1 = $target_dir . basename('pic1.png');
$uploadOk = 1;

$pic1img = $_FILES["pic1img"]["tmp_name"];


mkdir($target_dir);
move_uploaded_file($pic1img, $target_pic1);

header('location:add_category.php');

?>