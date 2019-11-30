<?php
//Exit
if($_GET['exit'] == true){
    session_destroy();
    header('Location:?page=catalog');
}
//Autorization
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
           $_SESSION['user']['id'] = $row['id'];
           $_SESSION['user']['name'] = $row['name'];
           $_SESSION['user']['role'] = $row['role'];
           header('Location:?page=account');
        }
    }

}
}

//Registration
if($_POST['regUserBtn']){
    if(empty($_POST['regLogin']) || empty($_POST['regPass'])|| empty($_POST['regName'])|| empty($_POST['regTel'])){
        $_SESSION['message'] = 'Все поля обязательны для заполнения';
    }else{
        $regName = clearString($_POST['regName']);
        $regTel = clearString($_POST['regTel']);
        $regLogin = clearString($_POST['regLogin']);
        $regPass = clearString($_POST['regPass']);
        $regPass = md5($regPass);
        $queryLogin = mysqli_query($link, "SELECT login FROM users WHERE login='$regLogin'") or die("Error of request");
            $num_rows = mysqli_num_rows($queryLogin);
            if($num_rows > 0){
                $_SESSION['message'] = 'Пользователь с таким логином уже существует.<br>Выберите другой логин!';
            }else{
                mysqli_query($link, "INSERT INTO users(name, tel, login, password) VALUES ('$regName','$regTel','$regLogin','$regPass')") or die ("ERROR");
                $_SESSION['message'] = 'Вы успешно зарегистрированы.<br> Войдите, введя логин и пароль!';
            }
    }
}
//var_dump($_SESSION);
?>
<div class="info-message"><?= $_SESSION['message']?></div>
<div class="auth_wrapper">
    <div class="auth_enter">
        <h3>Вход</h3>
        <form action="" method="post">
            Login: <input type="text" name="login" placeholder="login" value=""><br>
            Password: <input type="password" name="password" placeholder="password" value=""><br>
            <input type="submit"  value="Войти" name="authEnterBtn">
        </form>
    </div>
    <div class="auth_reg">
        <h3>Регистация</h3>
        <form action="" method="post">
            Name: <input type="text" name="regName" placeholder="Name"><br>
            Telephon: <input type="tel" name="regTel" placeholder="+7(000)-000-00-00"><br>
            Login: <input type="text" name="regLogin" placeholder="Login"><br>
            Password: <input type="password" name="regPass" placeholder="Password"><br>
            <input type="submit" value="Зарегистрировать" name="regUserBtn">
        </form>
    </div>
</div>
