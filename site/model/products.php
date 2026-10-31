<?php

function product_get_all($db) {

    $sql = 'select * from products ';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}

function product_get_one($db,$id_product) {

    $sql = 'select * from products where id_product = :id';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id',$id_product);
    $requete->execute();

    return $requete;
}


function product_get_last($db) {

    $sql = 'select * from products order by id_product desc limit 1';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}

function product_get_lastThree($db) {

    $sql = 'select * from products order by id_product desc limit 3';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}



function product_add($db,$product_name, $product_price, $product_details,$product_qte,$id_category){

    $sql = " insert into products ( product_name,
            product_price,product_details,
            product_qte,id_category)
             values (:product_name,:product_price,
             :product_details,:product_qte,:id_category)" ;
    $requete = $db-> prepare($sql);
    $requete -> bindValue(':product_name',$product_name);
    $requete -> bindValue(':product_price',$product_price);
    $requete -> bindValue(':product_details',$product_details);
    $requete -> bindValue(':product_qte',$product_qte);
    $requete -> bindValue(':id_category',$id_category);
    $requete->execute();

    return $requete;
}

function product_update($db,$product_id,$product_name,$product_price,$product_details,$product_qte,$id_category){

    $sql = " update products set 
                    id_product = :id_product, 
                    product_name = :product_name, 
                    product_price = :product_price, 
                    product_details = :product_details,
                    product_qte = :product_qte,
                    id_category = :id_category
                    where id_product = :id_product" ;
    $requete = $db-> prepare($sql);
    $requete -> bindValue(':id_product',     $product_id     );
    $requete -> bindValue(':product_name',   $product_name   );
    $requete -> bindValue(':product_price',  $product_price  );
    $requete -> bindValue(':product_details',$product_details);
    $requete -> bindValue(':product_qte',    $product_qte    );
    $requete -> bindValue(':id_category',    $id_category    );
    $requete->execute();

    return $requete;
}


function product_delete_one($db,$id) {

    $sql = 'delete from products where id_product = :id';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id',$id);
    $requete->execute();

    return $requete;
}




function product_search($db,$search_box) {

    $sql = " SELECT * FROM `products` WHERE name LIKE '% :search_box %' ";

    $requete = $db->prepare($sql);
    $requete -> bindValue(':search_box',$search_box);
    $requete->execute();

    return $requete;
}
