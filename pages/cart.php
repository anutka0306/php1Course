
<div class="cart-wrapper">
    <h2>Ваша Корзина</h2>
    <div class="info-message"><?= $_SESSION['message']?></div>
<?php
var_dump($_SESSION['cart']['items']);
echo count($_SESSION['cart']['items']);
for($i=0; $i < count($_SESSION['cart']['items']); $i++){
    $cur_id  = $_SESSION['cart']['items'][$i]['good_id'];
    $query = mysqli_query($link, "SELECT * FROM goods WHERE good_id='$cur_id'");
    while($row = mysqli_fetch_assoc($query)){
        ?>
     <div class="cart-good-row">
    <p><?=$row['name']?></p>
     <div class="cart-good-quantity">
         <p><?=$_SESSION['cart']['items'][$i]['quantity']?> шт.</p>
         <div>
         <a href="?page=cart&action=add&id=<?=$cur_id?>">+</a>
         <a href="?page=cart&action=remove&id=<?=$cur_id?>">-</a>
         </div>
     </div>
         <p>Price: <?=$row['price']?> руб.</p>
         <p>Total: <?=$row['price'] * $_SESSION['cart']['items'][$i]['quantity']?> руб.</p>
     </div>
    <?php
    }
}

?>
</div>
<a href="">Оформить заказ</a>
