<?php 
// Подключение к БазеДанных

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "shop_dima";

$connect = mysqli_connect($host, $user, $pass, $dbname);

if (mysqli_connect_errno($connect)){
    echo "Ошибка: " . mysqli_connect_error();
}
