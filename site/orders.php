
<?php
include 'layout/header.php'; 


include ('model/checkout.php');


$user_username = $_SESSION['username']; 


$requete = select_order($db,$user_username);

$orders = $requete-> fetchAll();

?>

<head><title>orders</title></head>


<section class="orders">

    <h1 class="heading">placed orders</h1>
 
    <div class="box-container">
    <?php foreach ($orders as $order){ ?>
 
 
    <div class="box">
       <p>placed on : <span style="color:blue;"><?php echo $order['order_date'];?></span></p>
       <p>name : <span style="color:black;"><?php echo $order['name'];?></span></p>
       <p >email : <span style="color:black;"><?php echo $order['email'];?></span></p>
       <p>number : <span style="color:black;"><?php echo $order['number'];?></span></p>
       <p>address : <span style="color:black;"><?php echo $order['address'];?></span></p>
       <p>payment method : <span style="color:green;"><?php echo $order['method'];?></span></p>
       <p>your orders : <span style="color:blue;"><?php echo $order['total_products'];?></span></p>
       <p>total price : <span><?php echo $order['total_price'];?> DA</span></p>
       <p > payment status : <span style="color:<?php if($order['payment_status'] == "pending"){ echo 'red'; }else{ echo 'green'; }; ?>"><?php echo $order['payment_status'] ;?></span> </p>
    </div>
    <?php }?>
 
    </div>
 
 </section>

 <?php
include 'layout/footer.php'; 
?>