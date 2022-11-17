<?php 

require('check_user.php');


$loginUser = $_SESSION['username'];
$result = mysqli_query($link, "SELECT * FROM `users` WHERE login='$loginUser'") or die(mysqli_error($link));


$res = mysqli_fetch_assoc($result);

echo 'Ваша почта: '.$res['email'];

if ($res['admin'] == 1) {
    echo ". У вас есть права администратора";
}  else {
    {
        echo ". Вы клиент.";
    }
}


?>

