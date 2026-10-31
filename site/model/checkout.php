<?php 

function order_add($db,$user_username, $name, $number,
$email,$address, $method, $total_price, $total_products) {
    
    $sql = " INSERT INTO  orders (user_username, name, number,
     email,address, method, total_price, total_products)
      VALUES (:user_username, :name, :number,:email,:address,:method,:total_price,:total_products ) " ;

    $requete = $db-> prepare($sql);

    $requete -> bindValue(':user_username',$user_username);
    $requete -> bindValue(':name',$name);
    $requete -> bindValue(':number',$number);
    $requete -> bindValue(':email',$email);
    $requete -> bindValue(':address',$address);
    $requete -> bindValue(':method',$method);
    $requete -> bindValue(':total_price',$total_price);
    $requete -> bindValue(':total_products',$total_products);

    $requete->execute();
    
    return $requete;
}





function cart_truncat($db) {

    $sql = 'delete from cart';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}


function select_order($db,$user_username) {
    $sql = " SELECT * from orders WHERE user_username = :user_username ; ";

    $requete = $db-> prepare($sql);
    $requete -> bindValue(':user_username',$user_username);
    $requete->execute();

return $requete;
}  


function delete_order() {
    $sql = 'delete from order where id_order = :id_order';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id_order',$id_order);
    $requete->execute(); 

    return $requete;
}



function update_payment($db,$id_order,$payment_status,$user_username){

    $sql = " update orders set 
                    payment_status = :payment_status 
                    where id_order = :id_order and user_username = :user_username;";
    $requete = $db-> prepare($sql);
    $requete -> bindValue(':id_order',$id_order );
    $requete -> bindValue(':payment_status',$payment_status );
    $requete -> bindValue(':user_username',$user_username);

    $requete->execute();

    return $requete;
}