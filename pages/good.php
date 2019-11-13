<?php
if(isset($_GET['id'])){
    $good_id = trim($_GET['id']);
}
$result_views = mysqli_query($link, "SELECT views_count FROM goods WHERE good_id='$good_id'");
$row_views = mysqli_fetch_assoc($result_views);
$cur_views = $row_views['views_count'] + 1;
mysqli_query($link, "UPDATE goods SET views_count='$cur_views' WHERE good_id='$good_id'");

$result = mysqli_query($link, "SELECT name, description, category, image, price, views_count FROM goods WHERE good_id = '$good_id'") or die("SELECT Error!");

$reviews = mysqli_query($link, "SELECT id, author, text, date FROM reviews RIGHT JOIN goods USING(good_id) WHERE good_id='$good_id'") or die("SELECT Error!");

?>
<?php while ($row = mysqli_fetch_assoc($result)):?>
<div class="good-wrapper">
    <h1><?=$row['name']?></h1>
    <div class="good-pic">
        <img src="<?=$row['image']?>" alt="<?=$row['name']?>">
    </div>
    <div class="good-info">
        <div class="good-desription">
            <?=$row['description']?>
        </div>
        <div class="good-price">
            <p>Price: <?=$row['price']?> RUB.</p>
            <p>Views: <?=$row['views_count']?></p>
        </div>
    </div>
    <div class="reviews-wrapper">
        <h2>REVIEWS</h2>
       <?php while ($row_reviews = mysqli_fetch_assoc($reviews)): ?>
       <div class="reviews-item">
           <p class="author"><?=$row_reviews['author']?></p>
           <p class="date"><?=$row_reviews['date']?></p>
           <p class="review-text"><?=$row_reviews['text']?></p>
       </div>
       <hr>
       <?php endwhile;?>
        <h3>Write new review</h3>
        <form method="post">
            <input type="text" name="author"><br>
            <textarea name="review-text" cols="20" rows="5"> </textarea><br>
            <input type="hidden" value="<?=date("Y-m-d H:i:s")?>" name="date">
            <input type="submit" name="send-review">
        </form>
        <?php
        if(isset($_POST['send-review'])){
            $author = $_POST['author'];
            $text = $_POST['review-text'];
            $date = $_POST['date'];

            mysqli_query($link, "INSERT INTO reviews SET author='$author', text='$text', date='$date', good_id='$good_id'");
        }
        ?>
    </div>
</div>
<?php endwhile; ?>


