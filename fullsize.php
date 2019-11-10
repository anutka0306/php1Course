<?php
$db_connect = mysqli_connect("localhost", "root", "root", "galleryL5") or die("Ошибка соединения с БД");
$img_id = $_GET['id'];
$result_views = mysqli_query($db_connect, "SELECT views FROM images WHERE id={$img_id} ");
$row_views = mysqli_fetch_assoc($result_views);
$cur_views = (int)$row_views['views'] + 1;
mysqli_query($db_connect, "UPDATE images SET views='$cur_views' WHERE id='$img_id'");
$result = mysqli_query($db_connect, "SELECT url, name, views FROM images WHERE id={$img_id} ");
$row = mysqli_fetch_assoc($result);
if($row){
    echo "<div><img src='{$row["url"]}' /> <small style='display: block'>{$row["name"]}</small> <small style='display: block'>Просмотров: {$row["views"]}</small> </div>";
}
echo '<a href="index.php">ВЕРНУТЬСЯ В ГАЛЕРЕЮ</a>'



?>
