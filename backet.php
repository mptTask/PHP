<?php 
/*
Корзина пользователя
*/

session_start();
require_once('config/db.php');


$result_tovat = mysqli_query($link, "SELECT * FROM `tovar` ") or die(mysqli_error($link));

//$num_rows = mysql_num_rows($result);

if (mysqli_num_rows($result_tovat) == 0){
    // Я просто хочу спать. Да и вообще, надо было использовать фреймворк. Там хоть MVP. Мне не нравиться писать сборную солянку
    die("Заказов нет");
}


echo '<table>
<tr>
    <th>ID</th>
    <th>Название</th>
    <th>Цена</th>
    <th>Количество</th>
</tr>';

foreach ($result_tovat as $result_tovat) {
    
    echo '<tr>
            <td>'.$result_tovat['ID_tovar'].'</td>
            <td>'.$result_tovat['NameTovar'].'</td>
            <td>'.$result_tovat['price'].'</td>';
                $user_id = $_SESSION['user_id'];
                $goosds = $result_tovat['ID_tovar'];
                $backetTovat = mysqli_query($link, "SELECT * FROM `backet` where `user_id` = $user_id and `goods_id` = $goosds order by id DESC" ) or die(mysqli_error($link));
                    if (mysqli_num_rows($backetTovat) == 0){
                        echo '<td><a href="edit_backet.php?id='.$result_tovat['ID_tovar'].'" >0 товаров в корзине</a></td>';   
                    }
                    else {
                        $totw = mysqli_fetch_assoc($backetTovat);
                        $pree = $totw['count'] * $result_tovat['price'];
                        echo '<td><a href="edit_backet.php?id='.$result_tovat['ID_tovar'].'" >'. $totw['count'] . ' товара в корзине, на стоиомость: '. $pree .'</a></td>';
                    }
        echo '</tr>';
}

echo '</table>';






?>