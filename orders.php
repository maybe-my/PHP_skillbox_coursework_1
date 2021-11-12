<?php
session_start();
require 'db.php';
$title = "Список заказов";
$sql = "SELECT * FROM orders ORDER BY order_status;";
require 'includes/header.php';


// Status order
if (isset($_POST['StatusID'])) {
  if ($_POST['StatusOrder'] == 1) {
    $query = "UPDATE orders SET order_status=0 WHERE orders.id=" . $_POST['StatusID'];
  } else {
    $query = "UPDATE orders SET order_status=1 WHERE orders.id=" . $_POST['StatusID'];
  }
  mysqli_query($connect, $query);
}

if (!$_SESSION['email']) {
    echo '<a class="page-products__button button" href="authorization.php">Авторизация</a>';
} else {

?>

<main class="page-order">
  <h1 class="h h--1">Список заказов</h1>
  <ul class="page-order__list">
    <?php 
    
      if($result = $connect->query($sql)) {
        foreach($result as $row){
    ?>
    <li class="order-item page-order__item">
      <div class="order-item__wrapper">
        <div class="order-item__group order-item__group--id">
          <span class="order-item__title">Номер заказа</span>
          <span class="order-item__info order-item__info--id"><?php echo $row['id'];?></span>
        </div>
        <div class="order-item__group">
          <span class="order-item__title">Сумма заказа</span>
          10 400 руб.
        </div>
        <button class="order-item__toggle"></button>
      </div>
      <div class="order-item__wrapper">
        <div class="order-item__group order-item__group--margin">
          <span class="order-item__title">Заказчик</span>
          <span class="order-item__info"><?php echo $row['last_name'] . ' ' . $row['first_name'];?></span>
        </div>
        <div class="order-item__group">
          <span class="order-item__title">Номер телефона</span>
          <span class="order-item__info"><?php echo $row['number'];?></span>
        </div>
        <div class="order-item__group">
          <span class="order-item__title">Способ доставки</span>
          <span class="order-item__info">Самовывоз</span>
        </div>
        <div class="order-item__group">
          <span class="order-item__title">Способ оплаты</span>
          <span class="order-item__info">Наличными</span>
        </div>
        <div class="order-item__group order-item__group--status">
          <span class="order-item__title">Статус заказа</span>
          <form action="" method="post">
            <?php if ($row['order_status'] == 0) {
              echo '<span class="order-item__info order-item__info--no">Не выполнено</span>';
            } else { 
              echo '<span class="order-item__info order-item__info--yes">Выполнено</span>';
            } ?>
            <input type="hidden" name="StatusID" id="inputStatusID" class="form-control" value="<?php echo $row['id'];?>">
            <input type="hidden" name="StatusOrder" id="StatusOrder" class="form-control" value="<?php echo $row['order_status'];?>">
            
            <button type="submit" class="order-item__btn">Изменить</button> <!-- class  -->
          </form>
        </div>
      </div>
      <div class="order-item__wrapper">
        <div class="order-item__group">
          <span class="order-item__title">Адрес доставки</span>
          <span class="order-item__info">г. Москва, ул. Пушкина, д.5, кв. 233</span>
        </div>
      </div>
      <div class="order-item__wrapper">
        <div class="order-item__group">
          <span class="order-item__title">Комментарий к заказу</span>
          <span class="order-item__info">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу.</span>
        </div>
      </div>
    </li>
    <?php } 
    }?>

  </ul>
</main>
<?php
};
mysqli_close($connect);
require 'includes/footer.php';
?>