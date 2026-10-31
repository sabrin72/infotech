<?php


function user_get_one ($db,$id){
    $sql = 'select * from users where id_user = :id';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id',$id);
    $requete->execute();

    return $requete;
}


function user_check ($db,$user_username,$user_password){
    $sql = 'select * from users where id_role = 2 and user_username = :user_username and user_password = :user_password' ;

    $requete = $db-> prepare($sql);
    $requete -> bindValue(':user_password',$user_password);
    $requete -> bindValue(':user_username',$user_username);
    $requete->execute();

    return $requete;
}


function admin_check ($db,$user_username,$user_password){
    $sql = 'select * from users where id_role = 1 and user_username = :user_username and user_password = :user_password' ;

    $requete = $db-> prepare($sql);
    $requete -> bindValue(':user_password',$user_password);
    $requete -> bindValue(':user_username',$user_username);
    $requete->execute();

    return $requete;
}




function user_add($db,$user_email,$user_username,$user_password,$id_role){
    $sql = " insert into users (user_email,user_username,user_password,id_role)
    values(:user_email,:user_username,:user_password, :id_role);";
$requete = $db-> prepare($sql);
$requete -> bindValue(':user_email',$user_email);
$requete -> bindValue(':user_username',$user_username);
$requete -> bindValue(':user_password',$user_password);
$requete -> bindValue(':id_role',$id_role);
$requete->execute();

return $requete;

}

function user_update($db, $user_email,$user_username, $user_password,$username){

    $sql = " update users set 
                    user_email = :user_email,
                    user_username = :user_username,
                    user_password = :user_password
                    where user_username = :username " ;
    $requete = $db-> prepare($sql);
    $requete -> bindValue(':user_email',$user_email);
    $requete -> bindValue(':user_username',$user_username);
    $requete -> bindValue(':user_password',$user_password);
    $requete -> bindValue(':username',$username);
    $requete->execute();

    return $requete;
}


function user_get($db) {

    $sql = 'select * from users ';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}

function user_get_users($db) {

    $sql = 'select * from users where id_role = 2 ';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}

function user_get_admins($db) {

    $sql = 'select * from users where id_role = 1 ';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}



function user_get_name($db,$user_username) {

    $sql = 'select * from users where user_username = :user_username';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':user_username',$user_username);
    $requete->execute();

    return $requete;
}

function user_delete_one($db,$id) {

    $sql = 'delete from users where id_user = :id';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id',$id);
    $requete->execute();

    return $requete;
}

