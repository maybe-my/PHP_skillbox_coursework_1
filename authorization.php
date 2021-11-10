<?php 
session_start();
require 'includes/header.php';


// Выйти
if (isset($_POST['logoff'])) {
  echo "Yes";
  session_destroy();
}

// Вход
if (isset($_POST['email'])) {
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
</main>

<?php
}

require 'includes/footer.php';
?>