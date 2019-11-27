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

