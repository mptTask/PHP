<?php 


session_start();

require_once('check_admin.php');

include_once('../config/db.php');

if($_POST){

    if ($_POST['name_tovar'] != ''){

        $nameTovare = $_POST['name_tovar'];
        $price = $_POST['price'];

        mysqli_query($link, "INSERT INTO `tovar` (`ID_tovar`, `NameTovar`, `ID_TypeTovar`, `price`) VALUES (NULL,'$nameTovare', '7', $price) ") or die(mysqli_error($link));
        die('Товар добавлен');
    }

}

?>

<form method="post">
    <label for="text">Название товара</label>
    <input type="text" name="name_tovar" >
    <label for="price">Цена</label>
    <input type="text" name="price" >
    <button type="submit">Добавить</button>
</form>