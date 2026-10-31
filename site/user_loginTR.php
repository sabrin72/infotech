<?php 

include('model/user.php');
include('model/database.php');

$db=db_connect();


$user_username =$_POST['username'];
$user_username = filter_var($user_username, FILTER_SANITIZE_STRING);
$user_password = sha1($_POST['password']);
$user_password = filter_var($user_password, FILTER_SANITIZE_STRING);





$user = user_check($db,$user_username,$user_password);
$user = $user -> fetch(pdo::FETCH_ASSOC);


if(isset($_POST['submit'])){
$_POST['username'];

    if ($user){
    echo 'vous etes connectés';
    header('location:home.php');

    session_start();

    $_SESSION['username']=$_POST['username'];
}
    else{
          header('location:user_login.php');
          $message[] = 'incorrect username or password!';
          
}}
else{
     header('location:pageError.php');
}


?>