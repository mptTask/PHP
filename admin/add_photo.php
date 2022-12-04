<?php 


session_start();

require_once('check_admin.php');

include_once('../config/db.php');
require('../config/ENV.php');

if ( ! isset($_GET['id']) and  ! is_numeric($_GET['id'])) {
    die("Ошибка получения товара");
}

$tovar_id = $_GET['id'];
    

$result = mysqli_query($link, "SELECT * FROM `tovar` WHERE ID_tovar='$tovar_id'") or die(mysqli_error($link));

$counts = mysqli_num_rows($result);
$res = mysqli_fetch_assoc($result);


0 == $counts && die("Товар не найден");

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    if (!in_array($_FILES["pictures"]['type'], $TYPES_IMG))
        die("Не верный тип файла");


    if ($_FILES["pictures"]['size'] > MAX_SIZE_IMG) 
        die("Я не съем столько данных");


    $new_file_name = uniqid().'_'.$_FILES["pictures"]['name'];

    

    if (copy($_FILES["pictures"]['tmp_name'], '../'.IMG_FiLE.$new_file_name)){
        $uid = $_SESSION['user_id'];
        $result = mysqli_query($link, 
        "INSERT INTO `shop_img` (`id`, `id_tovar`, `img`) VALUES (NULL, '$tovar_id', '$new_file_name');") 
            or die(mysqli_error($link));
    }   else {
        echo 'Ошибка загрузки';
    }

}


?>

<form enctype="multipart/form-data" method="post">
    <input type="file" name="pictures">
    <input type="submit" value="Загрузить">
</form>