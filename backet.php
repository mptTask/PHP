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

/*
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







*/


$result_tovat = mysqli_query($link, "SELECT `ID_tovar`, `NameTovar`, `price` FROM `tovar`") or die(mysqli_error($link));

echo '<table>
<tr>
    <th>ID</th>
    <th>Название</th>
    <th>Цена</th>
    <th>Количетство в корзине</th>
</tr>';


$user_id = $_SESSION['user_id'];

 $result_tovat = mysqli_query($link, "SELECT * FROM `backet` 
 JOIN tovar 
 ON backet.goods_id = tovar.ID_tovar
 WHERE user_id =  $user_id") or die(mysqli_error($link));

    $summa_backet = 0;
 
 foreach ($result_tovat as $result_tovat) {

    
    //var_dump($result_tovat);


     echo '<tr>
             <td><a href="tovar_edit.php?id='.$result_tovat['ID_tovar'].'">'.$result_tovat['ID_tovar'].'</td>
             <td><a href="tovar_edit.php?id='.$result_tovat['ID_tovar'].'">'.$result_tovat['NameTovar'].'</a></td>
             <td><a href="tovar_edit.php?id='.$result_tovat['ID_tovar'].'">'.$result_tovat['price'].'</a></td>
             <td>';
                    $userids = $_SESSION['user_id'];
                    $ids_tovar = $result_tovat['ID_tovar'];

                    $tovar_in_backet = mysqli_query($link, "SELECT * FROM `backet` WHERE `user_id` = $userids and `goods_id` = $ids_tovar") or die(mysqli_error($link));
                    
                    $counts = mysqli_num_rows($tovar_in_backet);
                    $res = mysqli_fetch_assoc($tovar_in_backet);

                   
                   if ($counts == null){
                        echo '<a href="edit_backet.php?id='.$result_tovat['ID_tovar'].'">0 товаров'."</a>";
                   }    else {
                        $summa_backet += $res['count'] * $result_tovat['price'];
                        echo '<a href="edit_backet.php?id='.$result_tovat['ID_tovar'].'">'.$res['count'] . ' товаров на сумму: ' . ($res['count'] * $result_tovat['price']) ."</a>";
                   }



             echo '</td>
         </tr>';
 }
 
 echo '</table>';

 echo "Сумма: " . $summa_backet;