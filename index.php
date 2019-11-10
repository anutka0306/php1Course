<?php

function getPics()
{
    $db_connect = mysqli_connect("localhost", "root", "root", "galleryL5") or die("Ошибка соединения с БД");
    $result = mysqli_query($db_connect, "SELECT * FROM images ORDER BY views DESC ");
    $gallery_items = '';
    while ($row = mysqli_fetch_assoc($result)){
        $gallery_items = $gallery_items . "<a href='fullsize.php?id={$row['id']}'> <img src='{$row['url']}' width='150' /><small style='display: block'>{$row['name']}</small></a>";
    }

    return $gallery_items;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Happy Gallery</title>
</head>
<body>
<header>My Happy Gallery</header>
<div class="gallery">
    <div class="gallery-wrapper">
        <div class="gallery-thumbs_wrapper">
            <div class="gallery-thumbs_item">
                <?=getPics();?>
            </div>
        </div>
    </div>
    <div class="gallery-form">
        <form action="sender.php" method="post" enctype="multipart/form-data">
            <fieldset class="fieldset">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <label for="user_pic">Отправка изображения:</label>
                <input type="file" name="user_pic" size="30">
            </fieldset>
            <fieldset class="fieldset">
                <input type="submit" value="Отправить изображение">
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
