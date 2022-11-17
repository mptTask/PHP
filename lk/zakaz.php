<?php

require('check_user.php');
require('../config/ENV.php');

$loginUser = $_SESSION['username'];
$user_id = $_SESSION['user_id'];


$result_tovat = mysqli_query($link, "SELECT * 
FROM `sale` 
WHERE `user_id` = $user_id") or die(mysqli_error($link));

//$num_rows = mysql_num_rows($result);

if (mysqli_num_rows($result_tovat) == 0){
    // Я просто хочу спать. Да и вообще, надо было использовать фреймворк. Там хоть MVP. Мне не нравиться писать сборную солянку
    die("Заказов нет");
}


echo '<table>
<tr>
    <th>ID</th>
    <th>Количество</th>
</tr>';

foreach ($result_tovat as $result_tovat) {
    
    echo '<tr>
            <td>'.$result_tovat['ID_Sale'].'</td>
            <td>'.$result_tovat['kolvo'].'</td>
        </tr>';
}

echo '</table>';


?>