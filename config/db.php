<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "shop";

$link = mysqli_connect($host, $user, $pass, $db_name) 
                                or die(mysqli_error($link));

?>