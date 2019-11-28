<?php
if($_SESSION['user']['role'] == null){
    echo 'Вы не авторизованы';
}else{
    ?>
    <script>
    visibility = 'visible';
    </script>
<?php
    echo 'Привет, '.$_SESSION['user']['name']. '<br>';
    $_SESSION['user']['role'] == '1'? $cur_role = 'Пользователь' : $cur_role = 'Администратор';
    echo 'Ваша роль: '. $cur_role;
}
?>
<h3>Ваши заказы</h3>
<?php
$userId = $_SESSION["user"]["id"];
$result  = mysqli_query($link, "SELECT order_id FROM orders WHERE user_id='$userId'");
$orders_count = mysqli_num_rows($result);
if($orders_count == 0){
    echo 'У вас еще нет ни одного заказа';
}else{
    while ($row = mysqli_fetch_assoc($result)){
        echo '<strong>Заказ номер '. $row['order_id'] . '</strong><br>';
        $curOrder = $row['order_id'];
        $orderQuery = mysqli_query($link, "SELECT goods.good_id, goods.name, goods.price, orderlist.quantity, orderlist.order_id, orders.status_id FROM goods LEFT JOIN orderlist ON goods.good_id=orderlist.good_id LEFT JOIN orders ON orders.order_id=orderlist.order_id WHERE orderlist.order_id = '$curOrder'") or die('error1');
        while ($orderRow = mysqli_fetch_assoc($orderQuery)){
          ?>
            <div class="row">
                <p><?=$orderRow["name"]?></p>
                <p><?=$orderRow["quantity"]?>шт.</p>
                <p><?=$orderRow["price"]?>руб.</p>
                <p>Итог:<?=$orderRow["price"] * $orderRow["quantity"]?></p>
                <p> Статус: <?=$orderRow["status_id"]?></p>

            </div>
<?php
        }
        echo '<hr>';
    }
}
?>

