<?php
include 'config/db_connect.php';
include 'funcs/calcFuncs.php';
$pages=[
  'calc1'=>'pages/calc1.php',
  'calc2'=> 'pages/calc2.php',
  'catalog'=>'pages/catalog.php',
  'good'=>'pages/good.php',
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
</header>
<nav class="main-nav">
    <ul>
        <?php foreach ($pages as $page => $value): ?>
        <li><a href="?page=<?=$page?>"><?=$page?></a></li>
        <?php endforeach; ?>
        <?php
        //var_dump($_GET);
        ?>
    </ul>
</nav>

<main>
    <?php if($_GET['page']){
       $cur_page = $_GET['page'];
        include $pages[$cur_page];
    }
     ?>
</main>

</body>
</html>


