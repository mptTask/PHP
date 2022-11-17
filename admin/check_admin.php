<?php 



if (!isset($_SESSION['admin'])) {die("Вышел вон");} 
if ($_SESSION['admin'] == 0) {die("Вход только для админов");} 




?>