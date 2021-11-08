<?php
include 'db.php';
if (isset($_GET['category'])) {
    $sql = "SELECT * FROM tovars WHERE category='" . $_GET['category'] . "'";
} else {
    $sql = "SELECT * FROM tovars";
}


if($result = $connect->query($sql)){
    foreach($result as $row){
        echo '<article class="shop__item product" tabindex="0">';
        echo '<div class="product__image">';
        echo '<img src="tovarsImages/' . $row["image"]  .'">';
        echo '</div>';
        echo '<p class="product__name">' . $row["name"] . '</p>';
        echo '<span class="product__price">' . $row["price"] . ' руб.</span>';
        echo '</article>';
    }
}
?>





