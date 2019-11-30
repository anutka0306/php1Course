
    <form action="" method="post" enctype="multipart/form-data">
        Название: <input type="text" required name="name" value=""><br>
        Описание: <textarea name="description"></textarea><br>
        Цена: <input type="number" required name="price" value=""><br>
        <div style="display: flex">
            <fieldset class="fieldset">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input type="hidden" name="old-image" value="">
                <label for="user_pic">Загрузить изображение:</label>
                <input type="file" required name="user_pic" size="30">
            </fieldset>
        </div>
        <fieldset class="fieldset">
            <input type="submit" name="send-new-good" value="ЗАГРУЗИТЬ ТОВАР">
        </fieldset>
    </form>
