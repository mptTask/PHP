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


//var_dump($counts);

0 == $counts && die("Товар не найден");


mysqli_query($link, "DELETE FROM tovar WHERE `tovar`.`ID_tovar` = $tovar_id") or die(mysqli_error($link));

echo 'Товар удалена';

?>