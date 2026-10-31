<?php

include('../model/database.php');
include('../model/user.php');

$db=db_connect();


$user_email=$_POST['email'];
$user_username=$_POST['username'];
$user_password= sha1($_POST['password']);
$username = $_POST['A_username'];

user_update($db,$user_email,$user_username,$user_password,$username);

session_start();

$_SESSION['admin_username']=$_POST['username'];
header('location:dashboard.php');