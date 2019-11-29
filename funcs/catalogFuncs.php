<?php
include 'config/db_connect.php';
session_start();
$_SESSION['message'] = '';
$is_auth = false;

if($_GET['action'] != null){
    switch ($_GET['action']){
        case 'add':
            add_to_cart($_GET['id']);
            break;
        case 'remove':
            remove_from_cart($_GET['id']);
            break;
        case 'makeOrder':
            make_order($_SESSION['user']['id'], $link);
            break;
        default:
            echo 'Что-то пошло не так!';
    }
}

$php_errors = array(1 => 'Превышен мах. размер файла, указанный в php.ini',
    2 => 'Превышенм мах. размер файла, указанный в форме html',
    3 => 'Была отправлена только часть файла',
    4 => 'Файл для отправки не был выбран');

function make_order($user_id, $link){
    mysqli_query($link, "INSERT INTO orders(user_id) VALUES ('$user_id')") or die("Error");
    $order_id = mysqli_insert_id($link);
    for($i = 0; $i < count($_SESSION['cart']['items']); $i++){
        $cur_goodId = $_SESSION['cart']['items'][$i]['good_id'];
        $cur_quantity = $_SESSION['cart']['items'][$i]['quantity'];
        mysqli_query($link, "INSERT INTO orderlist(order_id, good_id, quantity) VALUES ('$order_id','$cur_goodId','$cur_quantity')") or die("Error");
    }
    unset($_SESSION['cart']);
}

function add_to_cart($id){
    if($_SESSION['cart']['items'] != null) {
       for($i = 0; $i < count($_SESSION['cart']['items']); $i++){
           if($_SESSION['cart']['items'][$i]['good_id'] == $id){
               $_SESSION['cart']['items'][$i]['quantity'] += 1;
               return;
           }else{
               continue;
           }
       }
        $_SESSION['cart']['items'][] = ['good_id' => $id, 'quantity' => 1];
    }else{
        $_SESSION['cart']['items'][] = ['good_id' => $id, 'quantity' => 1];
    }

}

function remove_from_cart($id){
   if(count($_SESSION['cart']['items']) != 0){
       for($i = 0; $i < count($_SESSION['cart']['items']); $i++){
           if($_SESSION['cart']['items'][$i]['good_id'] == $id){
               if( $_SESSION['cart']['items'][$i]['quantity'] == 1){
                   array_splice($_SESSION['cart']['items'], $i, 1);
                   header('Location:?page=cart');
               }else{
                   $_SESSION['cart']['items'][$i]['quantity'] -= 1;
                   return;
               }
           }else{
               continue;
           }
       }
   }
}

function page_update($location){
    header($location);
}

function send_edited_good($good_id, $link,$php_errors){
    $upload_dir = "upload/";
    $image_fildname = "user_pic";
    $name = clearString($_POST['name']);
    $description = clearString($_POST['description']);
    $price = clearString($_POST['price']);
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

function send_new_good($link, $name, $description, $price, $php_errors){
    $upload_dir = "upload/";
    $image_fildname = "user_pic";
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
        $_SESSION['message'] = "Изображение обязательно!";
        page_update("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    mysqli_query($link, "INSERT INTO goods(name, description, price, image) VALUES('$name', '$description','$price','$image_name')") or die("Проблема загрузки в базу");
    //page_update("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
}

function handle_error($user_error_message, $system_error_message){
    die ($user_error_message . " " . $system_error_message);
}

if($_POST['send-edit-good']){
    $good_id = $_POST['good_id'];
    send_edited_good($good_id, $link,$php_errors);
}
if($_POST['send-new-good']){
    if(!isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['price'])){
        $_SESSION['message'] = 'Необходимо  заполнить все поля';
    }else{
        $name = clearString($_POST['name']);
        $description = clearString($_POST['description']);
        $price  = clearString($_POST['price']);
        send_new_good($link,$name,$description,$price,$php_errors);
    }

}

function clearString($str){
    $str = trim($str);
    $str = strip_tags($str);
    $str = htmlspecialchars($str);

    return $str;
}