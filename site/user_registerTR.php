<?php

include('model/database.php');
include('model/user.php');

$db=db_connect();



$user_username = $_POST['username'];
$user_username = filter_var($user_username, FILTER_SANITIZE_STRING);
$user_email = $_POST['email'];
$user_email = filter_var($user_email, FILTER_SANITIZE_STRING);
$user_password = sha1($_POST['password']);
$user_password = filter_var($user_password, FILTER_SANITIZE_STRING);



$requete = user_get_name($db,$user_username);
$username = $requete -> fetch(pdo::FETCH_ASSOC);



    if ($username){
        header('location:user_register.php');

    }else{
    
        session_start();

        $_SESSION['username']=$_POST['username'];
        user_add($db,$user_email,$user_username,$user_password,2);
          header('location:user_login.php');
          
          
}





 