<?php 

session_start();

require_once('check_admin.php');

include_once('../config/db.php');
require('../config/ENV.php');

if ( ! isset($_GET['id']) and  ! is_numeric($_GET['id'])) {
    die("Ошибка получения фотографии");
}

$isd = $_GET['id'];


mysqli_query($link, "DELETE FROM shop_img WHERE `shop_img`.`id` = '$isd'") or die(mysqli_error($link));

echo 'Фотография удалена';

?>