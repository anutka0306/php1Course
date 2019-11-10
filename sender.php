<?php
$db_connect = mysqli_connect("localhost", "root", "root", "galleryL5") or die("Ошибка соединения с БД");
function handle_error($user_error_message, $system_error_message)
{
    die ($user_error_message . " " . $system_error_message);
}

$upload_dir = "images/";
$image_fildname = "user_pic";

$php_errors = array(1 => 'Превышен мах. размер файла, указанный в php.ini',
    2 => 'Превышенм мах. размер файла, указанный в форме html',
    3 => 'Была отправлена только часть файла',
    4 => 'Файл для отправки не был выбран');

$_FILES[$image_fildname]['error'] == 0
or handle_error("Серверу не удается получить Ваше изображение<br>", $php_errors[$_FILES[$image_fildname]['error']]);

@getimagesize($_FILES[$image_fildname]['tmp_name'])
or handle_error("<p> Вы выбрали файл, который не является изображением<br>", $_FILES[$image_fildname]['tmp_name'] . " не является изображением");
$now = time();
while(file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fildname]['name'])){
    $now++;
}
echo $upload_filename;
$image_name = $_FILES[$image_fildname]['name'];
$image_size = $_FILES[$image_fildname]['size'];
@move_uploaded_file($_FILES[$image_fildname]['tmp_name'], $upload_filename) or handle_error("Возникла ошибка при сохранении файла", $php_errormsg);
mysqli_query($db_connect, "INSERT INTO images SET url='$upload_filename', size='$image_size',
name='$image_name'") or die("Проблема загрузки в базу");
echo '<p><a href="index.php">Вернуться в галерею</a></p>';

?>
