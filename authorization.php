<?php 
session_start();
$title = "Аккаунт";
require 'includes/header.php';
include 'db.php';

// Выйти
if (isset($_POST['logoff'])) {
  session_destroy();
}

// Вход
if (isset($_POST['email'])) {
  // Ищем в базе
  $result = mysqli_query($connect, "SELECT * FROM users WHERE email='camib10959@d3ff.com'");
  mysqli_close($connect);

  if ($_POST['email'] == 'camib10959@d3ff.com' && $_POST['password'] == '1234') {
    $_SESSION['email'] = 'camib10959@d3ff.com';
    $_SESSION['is_admin'] = true;
  }
}

if (!$_SESSION['email']) {
  
?>

<main class="page-authorization">
  <h1 class="h h--1">Авторизация</h1>
  <form class="custom-form" action="#" method="post">
    <input type="email" placeholder="Email" class="custom-form__input" required="" value="<?= $_POST['email']; ?>" name="email">
    <input type="password" placeholder="Password" class="custom-form__input" required="" name="password">
    <button class="button" type="submit">Войти в личный кабинет</button>
  </form>
</main>


<?php 
} else { ?>
<main class="page-authorization">
  <h1 class="h h--2">Вы уже авторизованный!</h1>
  <form class="custom-form" action="#" method="post">
    <button class="button" type="submit" name="logoff">ВЫЙТИ</button>
  </form>
  <a href="products.php" class="button">Админ панель</a>
</main>

<?php
}

require 'includes/footer.php';
?>