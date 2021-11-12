<?php 
$title = "Добавление товара";
require "includes/header.php";
if (!$_SESSION['email']) {
    echo '<a class="page-products__button button" href="authorization.php">Авторизация</a>';
} else {
?>
<main class="page-add">
    <h1 class="h h--1">Добавление товара</h1>

    <form class="custom-form" action="add_tovar.php" method="post" enctype="multipart/form-data">
        <fieldset class="page-add__group custom-form__group">
            <legend class="page-add__small-title custom-form__title">Данные о товаре</legend>
            <label for="product-name" class="custom-form__input-wrapper page-add__first-wrapper">
                <input type="text" class="custom-form__input" name="product-name" id="product-name">
                <p class="custom-form__input-label">
                    Название товара
                </p>
            </label>
            <label for="product-price" class="custom-form__input-wrapper">
                <input type="text" class="custom-form__input" name="product-price" id="product-price">
                <p class="custom-form__input-label">
                    Цена товара
                </p>
            </label>
        </fieldset>
        <fieldset class="page-add__group custom-form__group">
            <legend class="page-add__small-title custom-form__title">Фотография товара</legend>
            <ul class="add-list">
                <li class="add-list__item add-list__item--add">
                    <input type="file" name="product-photo" id="product-photo" hidden="">
                    <label for="product-photo">Добавить фотографию</label>
                </li>
            </ul>
        </fieldset>
        <fieldset class="page-add__group custom-form__group">
            <legend class="page-add__small-title custom-form__title">Раздел</legend>
            <div class="page-add__select">
                <select name="category" class="custom-form__select" multiple="multiple">
                    <option hidden="">Название раздела</option>
                    <option value="female">Женщины</option>
                    <option value="male">Мужчины</option>
                    <option value="children">Дети</option>
                    <option value="access">Аксессуары</option>
                </select>
            </div>
            <input type="checkbox" name="new" id="new" value='1' class="custom-form__checkbox">
            <label for="new" class="custom-form__checkbox-label">Новинка</label>
            <input type="checkbox" name="sale" id="sale" value='2' class="custom-form__checkbox">
            <label for="sale" class="custom-form__checkbox-label">Распродажа</label>
        </fieldset>
        <button class="button" type="submit">Добавить товар</button>


    </form>
    <section class="shop-page__popup-end page-add__popup-end" hidden="">
        <div class="shop-page__wrapper shop-page__wrapper--popup-end">
            <h2 class="h h--1 h--icon shop-page__end-title">Товар успешно добавлен</h2>
            <a href=""><p>Добавить новый товар</p></a>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="js/add_tovar.js"></script>

<?php 
};
require 'includes/footer.php';