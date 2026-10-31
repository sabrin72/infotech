<?php

include('../model/database.php');
include('../model/products.php');

$db = db_connect();

$id = $_GET['id_sent'];

$requete = product_delete_one($db,$id);

header('location:dashboard.php');