
<div class="cart-wrapper">
<?php
for($i=0; $i < count($_SESSION['cart']['items']); $i++){
    $cur_id  = $_SESSION['cart']['items'][$i]['good_id'];
    $query = mysqli_query($link, "SELECT * FROM goods WHERE good_id='$cur_id'");
    while($row = mysqli_fetch_assoc($query)){
        ?>
     <div class="cart-good-row">
    <p><?=$row['name']?></p>
     <div class="cart-good-quantity">
         <p><?=$_SESSION['cart']['items'][$i]['quantity']?> шт.</p>
         <a href="?page=cart&action=add&id=<?=$cur_id?>">+</a>
         <a href="">-</a>
     </div>
         <p>Price: <?=$row['price']?> руб.</p>
         <p>Total: <?=$row['price'] * $_SESSION['cart']['items'][$i]['quantity']?> руб.</p>
     </div>
    <?php
    }
}

?>
</div>
