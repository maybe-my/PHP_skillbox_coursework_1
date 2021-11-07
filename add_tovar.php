<?php

var_dump($_POST);

$connect = new PDO('mysql:host=localhost;dbname=shop_dima', 'root', '');


$data = [
    "name" => $_POST["name"],
    "price" => $_POST["price"],
    "image" => $_POST["photo"],
];


$sql = 'INSERT INTO tovars (name, price, image) VALUES (:name, :price, :image)';
$statement = $connect->prepare($sql);
$result = $statement->execute($data);

var_dump($_FILES);