<?php 
/*

require('check_user.php');


$loginUser = $_SESSION['username'];
$result = mysqli_query($link, "SELECT * FROM `users` WHERE login='$loginUser'") or die(mysqli_error($link));


$res = mysqli_fetch_assoc($result);

if (isset($_POST)){

    if ($_POST['passwordEmailOld'] != ""){
        if (md5($_POST['passwordEmailOld']) == $result['password']){
            


        } else {
            
            die("Пароль такой же как и в бд");

        }
    }

    if ($_POST['emailPost'] != $result['password']){

        echo 'Изменение почты';



    }



}
*/

?>

<!--
<form action="" method="post">
    <label for="emailPost">Почта</label>
    <input type="email" name="emailPost" id="emailPost" value="<?php //echo $res['email']; ?>">
    <label for="passwordEmailOld">Старый пароль:</label>
    <input type="password" name="passwordEmailOld" id="passwordEmailOld">
    <label for="passwordEmailNew">Новый пароль:</label>
    <input type="password" name="passwordEmailNew" id="passwordEmailNew">
    <label for="passwordEmailNew2">Повторите пароль:</label>
    <input type="password" name="passwordEmailNew2" id="passwordEmailNew2">
    <button type="submit">Изменить данные</button>
</form>-->