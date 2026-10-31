<?php


include('model/database.php');
include('model/checkout.php');

$db=db_connect();

session_start();




if(isset($_POST['order'])){

    $user_username = $_SESSION['username']; 
    $user_username = filter_var($user_username, FILTER_SANITIZE_STRING);
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $method = $_POST['method'];
    $method = filter_var($method, FILTER_SANITIZE_STRING);
    $address =   $_POST['address'] .', '. $_POST['city'] ;
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $total_products = $_POST['total_products'];
    $total_price = $_POST['total_price'];


    order_add($db,$user_username, $name, $number,$email,$address, $method, $total_price, $total_products);

    cart_truncat($db);
                
    header('location:home.php');


 
 }else{
    header('location:home.php');    
 }

