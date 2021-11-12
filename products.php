<?php 
require 'db.php';
$title = "Админ панель";
require 'includes/header.php';


// Удаление товара
if (isset($_POST['deleteProduct'])) {
  $sql = "DELETE from tovars WHERE id=" . $_POST['deleteProductId'];
  $result = mysqli_query($connect, $sql);
}

// Проверка на адм
session_start();
if (!$_SESSION['email']){
  echo '<a class="page-products__button button" href="authorization.php">Авторизация</a>';
} else {
?>

<main class="page-products">
  <h1 class="h h--1">Товары</h1>
  <a class="page-products__button button" href="add.php">Добавить товар</a>
  <a class="page-products__button button" href="orders.php">Заказы</a>
  <a class="page-products__button button" href="authorization.php">Выйти</a>
  <div class="page-products__header">
    <span class="page-products__header-field">Название товара</span>
    <span class="page-products__header-field">ID</span>
    <span class="page-products__header-field">Цена</span>
    <span class="page-products__header-field">Категория</span>
    <span class="page-products__header-field">Новинка</span>
  </div>
  <ul class="page-products__list">
    <?php if($result = $connect->query("SELECT * FROM tovars")){ 
    foreach($result as $row){ ?>
      <li class="product-item page-products__item">
        <b class="product-item__name"><?= $row['name']; ?></b>
        <span class="product-item__field"><?= $row['id']; ?></span>
        <span class="product-item__field"><?= $row['price']; ?> руб.</span>
        <span class="product-item__field"><?= $row['category']; ?></span>
        <span class="product-item__field"><?php if($row['is_new'] == 1){ echo "Да";} else {echo "Нет";}; ?></span>
        <a href="add.html" class="product-item__edit" aria-label="Редактировать"></a>

        <form action="" method="post">
          <input type="hidden" name="deleteProductId" id="input" class="form-control" value="<?php echo $row['id']; ?>">
          <button name="deleteProduct" class="product-item__delete" type="submit"></button>
        </form>
        
      </li>
    <?php } } ?>
  </ul>
</main>

<?php 
mysqli_close();
require 'includes/footer.php';

}
?>
