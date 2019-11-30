<div class="info-message"><?= $_SESSION['message']?></div>
<?php
$status_list =[];
$status_res = mysqli_query($link, "SELECT * FROM statuslist");
while($status_row = mysqli_fetch_assoc($status_res)){
    $status_list[] = [$status_row['status_id'] => $status_row['status_name']];
}

$result = mysqli_query($link, "SELECT orders.order_id, orders.status_id, statuslist.status_name, users.name FROM orders LEFT JOIN statuslist ON orders.status_id = statuslist.status_id LEFT JOIN users ON users.id = orders.user_id") or die("Ошибка выбора заказов из БД");
while($row = mysqli_fetch_assoc($result)){
    ?>
    <h3>Заказ номер: <?=$row['order_id']?></h3>
    <form action="" method="post">
       Имя клиента: <input type="text" disabled value="<?=$row['name']?>"><br>
        <input type="hidden" name="orderId" value="<?=$row['order_id']?>"><br>
        Статус заказа: <input type="text" disabled value="<?=$row['status_name']?>"><br>
       Изменить статус: <select name="orderStatus">
            <?php foreach($status_list as $key => $value):?>
                        <option value="<?=$key?>"><?=$value[$key]?></option>
            <?php endforeach; ?>
                      </select><br>
        <input type="submit" name="change_order_status" value="Сменить Статус заказа"></a>
    </form>
    <hr>
<?php
}
