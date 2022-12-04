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

if (isset($_POST['name_tovar']) and isset($_POST['price'])){

    $names = $_POST['name_tovar'];
    $prices = $_POST['price'];

    $result_tovat1 = mysqli_query($link, "UPDATE `tovar` SET `NameTovar` = '$names', `price` = '$prices' WHERE `tovar`.`ID_tovar` = $tovar_id") or die(mysqli_error($link));
    echo 'Изменение текста';

    echo "<meta http-equiv='refresh' content='0'>";

}



//var_dump($res);

// Фотографии 
$resultIMG = mysqli_query($link, "SELECT * FROM `shop_img` WHERE `id_tovar` ='$tovar_id'") or die(mysqli_error($link));

$countsIMG = mysqli_num_rows($resultIMG);
$resIMG = mysqli_fetch_assoc($resultIMG);

?>

<form method="post">
    <label for="text">Название товара</label>
    <input type="text" name="name_tovar" value="<?php echo $res['NameTovar'] ?>">
    <label for="price">Цена </label>
    <input type="text" name="price" value="<?php echo $res['price'] ?>" >
    <button type="submit">Изменить</button>
    <a href="delete_tovar.php?id=<?php echo $res['ID_tovar'] ?>">Удалить товар</a>
</form>

<table>
<thead>
    <tr>
        <th colspan="2">Фотографии <a href="add_photo.php?id=<?php echo $tovar_id; ?>">Добавить фотографию</a></th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <?php 
        
            if ($countsIMG == 0 ){

                echo '        
                    <tr>
                        <td colspan="2" >Фотографий нет. Загрузи их, не бойся)</td>
                    </tr>';
            }
            else {
                foreach ($resultIMG as $resultIMG){
                    $id_IMG = $resultIMG['id'];
                    $tovar_url = $resultIMG['img'];
                    echo "
                    <tr><td >
                    <img src='../".IMG_FiLE.$tovar_url."' alt='' height='250'>
                </td>
                <td><a href='delete_photo.php?id=$id_IMG'>Удалить</a></td></tr>";
                }
            }

            ?>
        </tr>
    </tbody>
</table>