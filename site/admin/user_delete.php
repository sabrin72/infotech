<?php

include('../model/database.php');
include('../model/user.php');

$db = db_connect();

$id = $_GET['id_sent'];

$requete = user_delete_one($db,$id);

header('location:dashboard.php');