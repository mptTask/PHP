<?php 
// Проверка на вход в учетную запись 


session_start();

if (!isset($_SESSION['username'])) {die("Вышел вон");} 

include_once('../config/db.php');




?>