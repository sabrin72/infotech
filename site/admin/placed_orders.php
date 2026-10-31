
<?php
include '../layout/header_admin.php'; 


include '../model/checkout.php';


$user_username = $_SESSION['username'];


$requete = select_order($db,$user_username);

$orders = $requete-> fetchAll();




?>

<head>
   <title>Placed Order</title>
</head>



<section class="orders">

<h1 class="heading">placed orders</h1>

<div class="box-container">

<?php foreach ($orders as $order){ ?>

   <div class="box">
       <p>placed on : <span style="color:blue;"><?php echo $order['order_date'];?></span></p>
       <p>name : <span style="color:black;"><?php echo $order['name'];?></span></p>
       <p>email : <span style="color:black;"><?php echo $order['email'];?></span></p>
       <p>number : <span style="color:black;"><?php echo $order['number'];?></span></p>
       <p>address : <span style="color:black;"><?php echo $order['address'];?></span></p>
       <p>payment method : <span style="color:green;"><?php echo $order['method'];?></span></p>
       <p>orders : <span style="color:blue;"><?php echo $order['total_products'];?></span></p>
       <p>total price : <span><?php echo $order['total_price'];?> DA</span></p>
       <p>payment method : <span style="color:green;"><?php echo $order['method'];?></span></p>
      <form action="placed_order_save.php" method="post">
         <input type="hidden" name="order_id" value="<?php echo $order['id_order'];?>">
         <select name="payment_status" class="select">
            <option selected disabled ><?php echo $order['payment_status'];?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
         </select>
        <div class="flex-btn">
         <input type="submit" value="update" class="option-btn" name="update_payment">
         <a href="placed_orders.php?id_sent=<?php echo $order['id_order'];?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
        </div>
      </form>
   </div>
   <?php }?>

</div>

</section>

</section>












<script src="../public/js/admin_script.js"></script>
   
</body>
</html>