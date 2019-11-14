<?php
include 'config/db_connect.php';

$php_errors = array(1 => 'Превышен мах. размер файла, указанный в php.ini',
    2 => 'Превышенм мах. размер файла, указанный в форме html',
    3 => 'Была отправлена только часть файла',
    4 => 'Файл для отправки не был выбран');


function page_update($location){
    header($location);
}

function send_edited_good($good_id, $link){

    $upload_dir = "upload/";
    $image_fildname = "user_pic";
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    if($_FILES[$image_fildname]['name']) {
        $_FILES[$image_fildname]['error'] == 0
        or handle_error("Серверу не удается получить Ваше изображение<br>", $php_errors[$_FILES[$image_fildname]['error']]);
        @getimagesize($_FILES[$image_fildname]['tmp_name'])
        or handle_error("<p> Вы выбрали файл, который не является изображением<br>", $_FILES[$image_fildname]['tmp_name'] . " не является изображением");
        $now = time();
        while(file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fildname]['name'])){
            $now++;
        }
        $image_name = $upload_filename;
        @move_uploaded_file($_FILES[$image_fildname]['tmp_name'], $upload_filename) or handle_error("Возникла ошибка при сохранении файла", $php_errormsg);
    }else{
        $image_name = $_POST['old-image'];
    }
    mysqli_query($link, "UPDATE goods SET name='$name',description='$description',image='$image_name',price='$price' WHERE good_id='$good_id'") or die("Проблема загрузки в базу");
    //page_update("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
}

function handle_error($user_error_message, $system_error_message)
{
    die ($user_error_message . " " . $system_error_message);
}




if($_POST['send-edit-good']){
    $good_id = $_POST['good_id'];
    send_edited_good($good_id, $link);
}