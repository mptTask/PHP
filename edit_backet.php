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

    $ocin < 0 && die("Число не может быть отрицательным");

    /*mysqli_query($link, "INSERT INTO `backet` (`id`, `user_id`, `goods_id`, `count`) 
            VALUES (NULL, $usere, $towwe, '$ocin');") or die(mysqli_error($link));

    echo 'Товар добавлен в корзину';*/

    $tovar_in_backet = mysqli_query($link, "SELECT * FROM `backet` WHERE `user_id` = $usere and `goods_id` = $towwe") or die(mysqli_error($link));
                    
    $counts = mysqli_num_rows($tovar_in_backet);
    $res = mysqli_fetch_assoc($tovar_in_backet);

    if ($counts == 0){
        // Создаем запись с количетсвом
        // INSERT INTO `backet` (`id`, `user_id`, `goods_id`, `count`) VALUES (NULL, '1', '1', '10');
        //mysqli_query($link, "SELECT * FROM `backet` WHERE `user_id` = $usere and `goods_id` = $towwe") or die(mysqli_error($link));
        mysqli_query($link, "INSERT INTO `backet` (`id`, `user_id`, `goods_id`, `count`) VALUES (NULL, '$usere', '$towwe', '$ocin');") or die(mysqli_error($link));
        echo 'Товар добавлен в корзину';
    }   else {
        //var_dump($res);
            $idBacket = $res['id'];
        if ($ocin == 0) {

            mysqli_query($link, "DELETE FROM backet WHERE `backet`.`id` = $idBacket") or die(mysqli_error($link));
            echo 'Товар удален из корзины';

        }   else {
            // UPDATE `backet` SET `user_id` = '13' WHERE `backet`.`id` = 10; 
            mysqli_query($link, "UPDATE `backet` SET `count` = '$ocin' WHERE `backet`.`id` = $idBacket;") or die(mysqli_error($link));
            
        }

    }  
}


?>

<form method="post">
    
    <label for="count"></label><input type="text" name="count" value="">
    <button type="submit">Обновить количетсво</button>
    <a href="backet_delete.php">Удалить товар</a>

</form>