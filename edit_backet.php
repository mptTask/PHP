<?php 
/**
 * Изменение количетсва товаров в корзине.
 */

 
session_start();
require_once('config/db.php');

 if ( ! isset($_GET['id']) and  ! is_numeric($_GET['id'])) {
    die("Ошибка получения товара");
}

$tovar_id = $_GET['id'];
    

$result = mysqli_query($link, "SELECT * FROM `tovar` WHERE ID_tovar='$tovar_id'") or die(mysqli_error($link));

$counts = mysqli_num_rows($result);
$res = mysqli_fetch_assoc($result);


//var_dump($counts);

0 == $counts && die("Товар не найден");



if ($_POST){
    !is_numeric($_POST['count']) && die("Передано не число");

    $usere = $_SESSION['user_id'];
    $towwe = $_GET['id'];
    $ocin = $_POST['count'];

    mysqli_query($link, "INSERT INTO `backet` (`id`, `user_id`, `goods_id`, `count`) 
            VALUES (NULL, $usere, $towwe, '$ocin');") or die(mysqli_error($link));

    echo 'Товар добавлен в корзину';
}


?>

<form method="post">
    
    <label for="count"></label><input type="text" name="count" value="">
    <button type="submit">Обновить количетсво</button>

</form>