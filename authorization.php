<?php 
session_start();
include 'db.php';

// Выйти
if (isset($_POST['logoff'])) {
  session_destroy();
}

// Вход
if (isset($_POST['email'])) {
  $input_email = $_POST['email'];
  $input_pass = $_POST['password'];

  $result = mysqli_query($connect, "SELECT * FROM users WHERE email='$input_email' AND password='$input_pass'");
  if ($result) {
    $user = mysqli_fetch_array($result);
    if (!empty($user['email'])) {
      $_SESSION['email'] = $user['email'];
    } else $error_msg = "Такой пользователь не найден!";
  }
  
  mysqli_close($connect);
}

// Настройки страницы
$title = "Аккаунт";
require 'includes/header.php';
if (!$_SESSION['email']) { 
?>

<!-- Авторизация -->
<main class="page-authorization">
  <h1 class="h h--1">Авторизация</h1>
  <?php 
    echo $error_msg;
  ?>
  <form class="custom-form" action="" method="post">
    <input type="email" placeholder="Email" class="custom-form__input" required="" value="<?= $_POST['email']; ?>" name="email">
    <input type="password" placeholder="Password" class="custom-form__input" required="" name="password">
    <button class="button" type="submit">Войти в личный кабинет</button>
  </form>
</main>

<!-- Для авторизированых -->
<?php 
} else { ?>
<main class="page-authorization">
  <h1 class="h h--2">Вы уже авторизованный!</h1>
  <form class="custom-form" action="authorization.php" method="post">
    <button class="button" type="submit" name="logoff">ВЫЙТИ</button>
  </form>
  <a href="products.php" class="button">Админ панель</a>
</main>

<?php
}

require 'includes/footer.php';
?>