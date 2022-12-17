<?php 
/**
 * вывод
 */


 session_start();
 require_once('config/db.php');

 
 $result_tovat = mysqli_query($link, "SELECT `ID_tovar`, `NameTovar`, `price` FROM `tovar`") or die(mysqli_error($link));

    

 echo '<table>
 <tr>
     <th>ID</th>
     <th>Название</th>
     <th>Цена</th>
     <th>Количетство в корзине</th>
 </tr>';
 
 foreach ($result_tovat as $result_tovat) {
     
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
                        echo '<a href="edit_backet.php?id='.$result_tovat['ID_tovar'].'">'.$res['count'] . ' товаров на сумму: ' . ($res['count'] * $result_tovat['price']) ."</a>";
                   }



             echo '</td>
         </tr>';
 }
 
 echo '</table>';



?>