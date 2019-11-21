<?php

if($_GET['exit'] == true){
    session_destroy();
}
if($_POST['authEnterBtn']){
if(empty($_POST['login']) || empty($_POST['password'])){
    $_SESSION['message'] = 'Все поля обязательны для заполнения';
}else{
    $login = clearString($_POST['login']);
    $password = clearString($_POST['password']);
    $password = md5($password);
    $query = mysqli_query($link, "SELECT * FROM users WHERE login='{$login}'") or die ("ERROR");
    $row = mysqli_fetch_assoc($query);
    if(($row['login'] != $login) || ($row['password'] != $password)){
        $_SESSION['message'] = 'Ошибка авторизации';
    }else{
        $_SESSION['message'] ='Добро пожаловать, '.$row['name'].'<br>';
        $is_auth = true;
        if($is_auth){
           $_SESSION['message'] = $_SESSION['message'] .'Права пользователя: '. $row['role'];
           $_SESSION['user']['name'] = $row['name'];
           $_SESSION['user']['role'] = $row['role'];
           $pages['account'][1] = 'visible';
           $pages['auth'][1] = 'invisible';
           header('Location:?page=account');
        }
    }

}
}
var_dump($_SESSION);
?>
<div class="info-message"><?= $_SESSION['message']?></div>
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
