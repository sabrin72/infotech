<?php
function add_to_cart ($db,$user_username,$id_product,$qte) {
    $sql = " insert into cart ( user_username,id_product,qte)
     values (:user_username,:id_product,:qte)" ;
$requete = $db-> prepare($sql);
$requete -> bindValue(':user_username',$user_username);
$requete -> bindValue(':id_product',$id_product);
$requete -> bindValue(':qte',$qte);
$requete->execute();

return $requete;

}


function products_cart ($db,$user_username) {
    $sql = "SELECT cart.id_product,user_username,product_name, product_price, qte 
    FROM products 
    INNER JOIN cart ON products.id_product = cart.id_product WHERE user_username = :user_username ;";

    $requete = $db-> prepare($sql);
    $requete -> bindValue(':user_username',$user_username);
    $requete->execute();

return $requete;
}    



function cart_update($db,$id_product,$qte,$user_username){

    $sql = " update cart set 
                    id_product = :id_product , 
                    qte = :qte 
                    where id_product = :id_product and user_username = :user_username";
    $requete = $db-> prepare($sql);
    $requete -> bindValue(':id_product',$id_product );
    $requete -> bindValue(':qte',$qte );
    $requete -> bindValue(':user_username',$user_username);

    $requete->execute();

    return $requete;
}



function cart_delete_one($db,$id_product) {

    $sql = 'delete from cart where id_product = :id_product';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id_product',$id_product);
    $requete->execute();

    return $requete;
}



function cart_delete($db) {

    $sql = 'delete from cart';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}




function count_cart_items($db,$user_username) {
    $sql = 'select * from cart where user_username = :user_username ;';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':user_username',$user_username);
    $requete->execute();

    return $requete;
}