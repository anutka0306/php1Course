<?php
if(isset($_GET['id'])){
    $good_id = $_GET['id'];
}
$result = mysqli_query($link, "SELECT * FROM goods WHERE good_id='$good_id'");

while ($row = mysqli_fetch_assoc($result)): ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="good_id" value="<?=$good_id?>"><br>
        Название: <input type="text" name="name" value="<?=$row['name']?>"><br>
       Описание: <textarea name="description"><?=$row['description']?></textarea><br>
       Цена: <input type="number" name="price" value="<?=$row['price']?>"><br>
        <div style="display: flex">
        <img src="<?=$row['image']?>" style="width: 100px;">
        <fieldset class="fieldset">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input type="hidden" name="old-image" value="<?=$row['image']?>">
            <label for="user_pic">Поменять изображение:</label>
            <input type="file" name="user_pic" size="30">
        </fieldset>
        </div>
        <fieldset class="fieldset">
            <input type="submit" name="send-edit-good" value="ВНЕСТИ ИЗМЕНЕНИЯ">
        </fieldset>

    </form>
<?php endwhile; ?>
