<?php 


session_start();

require_once('check_admin.php');

include_once('../config/db.php');

$result_tovat = mysqli_query($link, "SELECT `ID_tovar`, `NameTovar`, `price` FROM `tovar`") or die(mysqli_error($link));

echo '<table>
<tr>
    <th>ID</th>
    <th>Название</th>
    <th>Цена</th>
</tr>';

foreach ($result_tovat as $result_tovat) {
    
    echo '<tr>
            <td><a href="tovar_edit.php?id='.$result_tovat['ID_tovar'].'">'.$result_tovat['ID_tovar'].'</td>
            <td><a href="tovar_edit.php?id='.$result_tovat['ID_tovar'].'">'.$result_tovat['NameTovar'].'</a></td>
            <td><a href="tovar_edit.php?id='.$result_tovat['ID_tovar'].'">'.$result_tovat['price'].'</a></td>
        </tr>';
}

echo '</table>';


echo '<p align="center"><a href="add_tovar.php">Добавить новый</a></p>';

?>

