<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Fashion</title>

  <meta name="description" content="Fashion - интернет-магазин">
  <meta name="keywords" content="Fashion, интернет-магазин, одежда, аксессуары">

  <meta name="theme-color" content="#393939">

  <link rel="preload" href="img/intro/coats-2018.jpg" as="image">
  <link rel="preload" href="fonts/opensans-400-normal.woff2" as="font">
  <link rel="preload" href="fonts/roboto-400-normal.woff2" as="font">
  <link rel="preload" href="fonts/roboto-700-normal.woff2" as="font">

  <link rel="icon" href="img/favicon.png">
  <link rel="stylesheet" href="css/style.min.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/scripts.js" defer=""></script>
</head>
<body>
    <header class="page-header">
      <a class="page-header__logo" href="/">
        <img src="img/logo.svg" alt="Fashion">
      </a>
      <nav class="page-header__menu">
        <ul class="main-menu main-menu--header">
          <li>
            <a class="main-menu__item active" href="/">Главная</a>
          </li>
          <li>
            <a class="main-menu__item" href="/?news=true">Новинки</a>
          </li>
          <li>
            <a class="main-menu__item "href="/?sale=true" >Sale</a>
          </li>
          <li>
            <a class="main-menu__item" href="delivery.html">Доставка</a>
          </li>
          <?php if ($_SESSION['email']) { ?>
            <li>
              <a class="main-menu__item" href="products.php">Панель администратора</a>
            </li>
          <?php } else {
            echo '
            <li>
              <a class="main-menu__item" href="authorization.php">Войти</a>
            </li>';
          } ?>
        </ul>
      </nav>
    </header>