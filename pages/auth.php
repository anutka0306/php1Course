<?php
$is_auth = false;
//var_dump($_POST);
if($_POST['authEnterBtn']){
if(empty($_POST['login']) || empty($_POST['password'])){
    echo 'Все поля обязательны для заполнения';
}else{
    $login = clearString($_POST['login']);
    $password = clearString($_POST['password']);
    $password = md5($password);
    $query = mysqli_query($link, "SELECT * FROM users WHERE login='{$login}'") or die ("ERROR");
    $row = mysqli_fetch_assoc($query);
    if(($row['login'] != $login) || ($row['password'] != $password)){
        echo 'Ошибка авторизации';
    }else{
        echo 'Добро пожаловать, '.$row['name'];
        $is_auth = true;
        if($is_auth){
            echo 'Права пользователя: '. $row['role'];
        }
    }

}
}
?>
<div class="auth_wrapper">
    <div class="auth_enter">
        <h3>Вход</h3>
        <form action="" method="post">
            Login: <input type="text" name="login" placeholder="login" value=""><br>
            Password: <input type="password" name="password" placeholder="password" value=""><br>
            <input type="submit" value="Войти" name="authEnterBtn">
        </form>
    <div class="auth_reg">

    </div>
</div>
