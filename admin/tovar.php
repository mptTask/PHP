<?php 


session_start();

require_once('check_admin.php');

include_once('../config/db.php');

$result_tovat = mysqli_query($link, "SELECT `ID_tovar`, `NameTovar` FROM `tovar`") or die(mysqli_error($link));

echo '<table>
<tr>
    <th>ID</th>
    <th>Название</th>
</tr>';

foreach ($result_tovat as $result_tovat) {
    
    echo '<tr>
            <td>'.$result_tovat['ID_tovar'].'</td>
            <td>'.$result_tovat['NameTovar'].'</td>
        </tr>';
}

echo '</table>';


echo '<p align="center"><a href="add_tovar.php">Добавить новый</a></p>';

?>

