<?php
use App\models\Good;

/** @var string $title */
/** @var Good[] $goods */


echo "<h1>$title</h1>";

foreach ($goods as $good) {
    echo "
    <a href='?c=good&a=one&id={$good->id}'>{$good->item_name}</a>
    [<a href='?c=good&id={$good->id}&update=true'>обновить данные о товаре</a>]<hr>
";
    if($good->id == $_GET['id'] && $_GET['update'] == true) {
    echo "
    <h3>Изменить данные о товаре</h3>
    <form method='post' action='?c=good&a=update&id=$good->id'>
        <input name='file_name' value='{$good->file_name}'><br><br>
        <textarea rows='4' cols='50' name='description'>{$good->description}</textarea><br>
        <input name='item_name' value='{$good->item_name}'><br><br>
        <input name='price' value='{$good->price}'><br><br>
        <input type='submit'>
    </form>


";
    }
}

if (!$_GET['update']) {
echo <<<php
    <h3>Добавить товар</h3>
    <form method="post" action="?c=good&a=add">
        <input name="file_name" placeholder="Имя файла"><br><br>
        <textarea rows="4" cols="50" name="description" placeholder="Описание товара"></textarea><br>
        <input name="item_name" placeholder="Имя товара"><br><br>
        <input name="price" placeholder="Цена товара"><br><br>
        <input type="submit">
    </form>

php;
}