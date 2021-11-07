<?php
// "INSERT INTO users (`name`) VALUES ('" . mysqli_real_escape_string($connect, $_POST['username']) . "')"
include_once 'db.php';
echo "<pre>";
var_dump($_POST);
echo "</pre>";
if (isset($_POST['thirdName'])) {
    $result = mysqli_query($connect, 
    "INSERT INTO orders(`first_name`, `last_name`, `number`, `email`)
    VALUES('" . mysqli_real_escape_string($connect, $_POST['name']) . "', 
    '" . mysqli_real_escape_string($connect, $_POST['surname']) . "', 
    '" . mysqli_real_escape_string($connect, $_POST['phone']) . "',
    '" . mysqli_real_escape_string($connect, $_POST['thirdName']) . "');");


}

mysqli_close($connect);