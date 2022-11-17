<?php


/*
include_once("config/db.php");

//var_dump($link);

$result = mysqli_query($link, "SELECT * FROM users");*/

session_start();
$_SESSION['name'] = 'value';
$arr = array('fist', 'second', 'third');
$_SESSION['arr'] = $arr;

if (!isset($_SESSION['username'])){

    echo '<h2><a href="register.php">Регистрация</a></h2>
    <h2><a href="auth.php">Войти</a></h2>
    </div>';

}   else {

    echo 'Тут будет магазин. <a href="exit.php">Выйти из аккаунта </a>';

}


?>
