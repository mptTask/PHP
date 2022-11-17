<?php 


include_once('config/db.php');
session_start();


if (!isset($_SESSION['username'])){

if(!empty($_POST)){
    if (strlen($_POST['password']) >= 6 && $_POST['text'] !== "" ){
        if (preg_match("%@%", $_POST['email'])){
            $login = $_POST['text'];
            $pass = md5($_POST['password']);
            $email = $_POST['email'];
        
			try{
				mysqli_query($link, "INSERT INTO `users` (`login`, `password`, `email`)
                VALUES('$login', '$pass', '$email')") or die(mysqli_error($link));
			}	catch (Exception $e) {
				
				echo 'Такой пользователь уже существует';
				die();
				
			}
            
        
            unset($_POST);
            echo 'Спасибо за регистрацию';
        } else {
            echo 'Ошибка регистрации';
        }
    } else {
        echo 'Ошибка регистрации';
    }
    //var_dump($_POST);
} 

} else {
	
	echo 'Вы не можете зарегистрироваться';
	
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <form  method="post">
        Логин: <input type="text" name="text" id="text"> </br>
        Пароль: <input type="password" name="password" id="password"> </br>
        Email: <input type="email" name="email" id="email">
        <button type="submit">Зарегистрироваться</button>
    </form>