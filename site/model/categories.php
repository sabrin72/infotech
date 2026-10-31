
<?php


function category_get_all($db) {

$sql = 'select * from categories ';

$requete = $db->prepare($sql);
$requete->execute();

return $requete;
}


// function category_get_products($db,$id) {

//     $sql = ' SELECT *
//     FROM products  LEFT JOIN categories ON products.id_category = categories.id_category ';

//     $requete = $db->prepare($sql);
//     $requete -> bindValue(':id',$id);
//     $requete->execute();

//     return $requete;
// }

function category_get_products($db,$id) {

    $sql = ' SELECT *
    FROM products  where id_category = :id ';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id',$id);
    $requete->execute();

    return $requete;
}




function category_get_one($db,$id_category) {

    $sql = 'select * from categories where id_category = :id_category';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id_category',$id_category);
    $requete->execute();

    return $requete;
}



function category_get_last($db) {

    $sql = 'select * from categories order by id_category desc limit 1';

    $requete = $db->prepare($sql);
    $requete->execute();

    return $requete;
}



function category_add($db,$category_name){

    $sql = " insert into categories ( category_name)
             values (:category_name)" ;
    $requete = $db-> prepare($sql);
    $requete -> bindValue(':category_name',$category_name);
    $requete->execute();

    return $requete;
}





function category_delete_one($db,$id) {

    $sql = 'delete from categories where id_category = :id';

    $requete = $db->prepare($sql);
    $requete -> bindValue(':id',$id);
    $requete->execute();

    return $requete;
}




function category_update($db,$category_id,$category_name){

    $sql = " update categories set 
                    id_category = :id_category, 
                    category_name = :category_name
                    where id_category = :id_category ";
    $requete = $db-> prepare($sql);
    $requete -> bindValue(':id_category',$category_id );
    $requete -> bindValue(':category_name',$category_name );

    $requete->execute();

    return $requete;
}