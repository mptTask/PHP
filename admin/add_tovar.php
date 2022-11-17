<?php 


session_start();

require_once('check_admin.php');

include_once('../config/db.php');

if($_POST){

    if ($_POST['name_tovar'] != ''){

        $nameTovare = $_POST['name_tovar'];

        mysqli_query($link, "INSERT INTO `tovar` (`ID_tovar`, `NameTovar`, `ID_TypeTovar`) VALUES (NULL,'$nameTovare', '7') ") or die(mysqli_error($link));
        die('Товар добавлен');
    }

}

?>

<form method="post">
    <label for="text">Название товара</label>
    <input type="text" name="name_tovar" >
    <button type="submit">Добавить</button>
</form>