<?php 

include 'db.php';


$result = mysqli_query($connect, "SELECT * FROM tovars");

while ($row = $result->fetch_assoc()) {
    $show_image = base64_encode($row['image']); ?>
    <img src="data:image/jpeg;base64, <?= $show_image ?>" alt="">
    <?php
}