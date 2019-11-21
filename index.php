<?php
include 'config/db_connect.php';
include 'funcs/calcFuncs.php';
include 'funcs/catalogFuncs.php';
$pages=[
  'calc1'=>['pages/calc1.php', 'invisible', 'Калькулятор 1'],
  'calc2'=> ['pages/calc2.php', 'invisible', 'Калькулятор 2'],
  'catalog'=>['pages/catalog.php', 'visible', 'Каталог'],
  'good'=>['pages/good.php', 'invisible', 'Товар'],
  'edit-good' =>['controller/editGood.php', 'invisible', ''],
    'auth' =>['pages/auth.php', 'visible', 'Вход/Регистрация'],
    'account' =>['pages/account.php', 'invisible', 'Аккаунт'],
];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>My Small App</title>
</head>
<body>
<header>
    <h1>My Small App</h1>

<nav class="main-nav">
    <ul>
        <?php foreach ($pages as $page => $value): ?>
        <li class="<?=$value[1]?>"><a href="?page=<?=$page?>"><?=$value[2]?></a></li>
        <?php endforeach; ?>
        <li class="visible"><a href="?page=auth&exit=true">Выход</a></li>

    </ul>
</nav>
</header>

<main>
    <?php if($_GET['page']){
       $cur_page = $_GET['page'];
        include $pages[$cur_page][0];
    }
     ?>
</main>

</body>
</html>


