<?php


include('../model/database.php');
include('../model/checkout.php');

$db=db_connect();

session_start();





if(isset($_POST['update_payment'])){
   $id_order = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $user_username = $_SESSION['username'];
   update_payment($db,$id_order,$payment_status,$user_username);
   $message[] = 'payment status updated!';

   header('location:placed_orders.php');


}