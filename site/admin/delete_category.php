<?php

include('../model/database.php');
include('../model/categories.php');

$db = db_connect();

$id = $_GET['id_sent'];

$requete = category_delete_one($db,$id);

header('location:add_category.php');