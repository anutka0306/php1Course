<?php
$result = mysqli_query($link, "SELECT * FROM goods ORDER BY views_count DESC") or die("Error");
?>
<a href="?page=add-good" class="editBtn">Добавить новый товар</a>
<div class="catalog_wrapper">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="catalog_item">
        <img src="<?=$row['image']?>" alt="<?=$row['name'] ?>">
        <h4><?=$row['name'] ?></h4>
        <h5><?=$row['price'] ?></h5>
        <a href="?page=good&id=<?=$row['good_id'] ?>">More...</a>
    </div>
    <?php endwhile; ?>
</div>
