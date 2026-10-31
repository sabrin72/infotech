<?php


include('model/database.php');
include('model/cart.php');

$db=db_connect();

session_start();


$user_username = $_SESSION['username'];
$id_product = $_POST['id_product'];
$qte = $_POST['qte'];


add_to_cart ($db,$user_username,$id_product,$qte );


header('location:cart.php');