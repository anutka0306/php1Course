<?php
function getPics()
{
    $i = new DirectoryIterator("./images");
    $thumbs = [];
    foreach ($i as $v) {
        if ($v == '.' || $v == '..' || is_dir('./images' . $v)) {
            continue;
        }
        $thumbs[] = $v->getFilename();
    }
    $gallery_items = '';
    for($item = 0; $item < count($thumbs); $item++){
        $gallery_items = $gallery_items . "<a target='_blank' href='images/{$thumbs[$item]}'> <img src='images/{$thumbs[$item]}' width='150' /></a>";
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
