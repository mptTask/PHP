<?php 

require('check_user.php');
require('../config/ENV.php');

$loginUser = $_SESSION['username'];


if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    if (!in_array($_FILES["pictures"]['type'], $TYPES_IMG))
        die("Не верный тип файла");


    if ($_FILES["pictures"]['size'] > MAX_SIZE_IMG) 
        die("Я не съем столько данных");


    $new_file_name = uniqid().'_'.$_FILES["pictures"]['name'];

    if (copy($_FILES["pictures"]['tmp_name'], '../'.IMG_FiLE.$new_file_name)){
        $uid = $_SESSION['user_id'];
        $result = mysqli_query($link, "UPDATE `users` SET `ava` = '$new_file_name' WHERE `users`.`id` = $uid;") or die(mysqli_error($link));
    }   else {
        echo 'Ошибка загрузки';
    }
}



$result = mysqli_query($link, "SELECT * FROM `users` WHERE login='$loginUser'") or die(mysqli_error($link));
$res = mysqli_fetch_assoc($result);

if ($res['ava'] == ''){
    echo '<p>Тут могла быть красивая ава. Вот тебе формочка для загрузки<p>
    <form enctype="multipart/form-data" method="post">
    <input type="file" name="pictures">
    <input type="submit" value="Загрузить">
    </form>';
}   else {
    $file_path_img = '..'.IMG_FiLE.$res['ava'];

    echo "<img src='$file_path_img' alt='Ава пользователя'>
    
    <form enctype='multipart/form-data' method='post'>
    <p>У тебя красивая ава. Ты всегда можешь поставить котика, который захватит мир</p>
    <input type='file' name='pictures'>
    <input type='submit' value='Загрузить'>
    </form>";
}



?>