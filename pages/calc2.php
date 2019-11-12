<?php
//var_dump($_GET);
//var_dump($_POST);
?>

    <form action="?page=calc2" method="post">
        <input name="first_num" type="number" value="0" placeholder="0">
        <button name="operation" value="plus">+</button>
        <button name="operation" value="menus">-</button>
        <button name="operation" value="multiply">*</button>
        <button name="operation" value="divide">/</button>
        <input name="second_num" type="number" value="0" placeholder="0">

    </form>
<?php if($_POST['operation']): ?>
    <div class="calc-result">
        <h2><?=calculate($_POST['first_num'],$_POST['second_num'], $_POST['operation']); ?></h2>
    </div>

<?php endif; ?>