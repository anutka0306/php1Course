
<div class="cart-wrapper">
    <h2>Ваша Корзина</h2>
<?php
if(count($_SESSION['cart']['items']) == 0) {
    $_SESSION['message'] = 'Your cart is empty!';
}
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
<div class="info-message"><?=$_SESSION['message']?></div>
<?php if(!isset($_SESSION['user'])): ?>
<p>Для продолжения нужно Авторизоваться или Зарегистироваться и Войти</p>
<?php else: ?>
<?php if(count($_SESSION['cart']['items']) != 0 && $_SESSION['cart']['items'] != null): ?>
<a href="?page=cart&action=makeOrder">Оформить заказ</a>
<?php endif; ?>
<?php endif; ?>
