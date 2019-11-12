<?php
//var_dump($_GET);
//var_dump($_POST);
?>

<form action="?page=calc1" method="post">
    <input name="first_num" type="number" value="0" placeholder="0">
    <select name="operation" id="">
        <option value="plus">+</option>
        <option value="menus">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input name="second_num" type="number" value="0" placeholder="0">
    <input name="get-calc-result" type="submit">
</form>
<?php if($_POST['get-calc-result']): ?>
<div class="calc-result">
    <h2><?=calculate($_POST['first_num'],$_POST['second_num'], $_POST['operation']); ?></h2>
</div>

<?php endif; ?>
