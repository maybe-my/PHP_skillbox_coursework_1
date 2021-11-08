<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Добавление товара</title>

    <meta name="description" content="Fashion - интернет-магазин">
    <meta name="keywords" content="Fashion, интернет-магазин, одежда, аксессуары">

    <meta name="theme-color" content="#393939">

    <link rel="preload" href="fonts/opensans-400-normal.woff2" as="font">
    <link rel="preload" href="fonts/roboto-400-normal.woff2" as="font">
    <link rel="preload" href="fonts/roboto-700-normal.woff2" as="font">

    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.min.css">

    <script src="js/scripts.js" defer=""></script>
</head>

<body>
    <header class="page-header">
        <a class="page-header__logo" href="#">
            <img src="img/logo.svg" alt="Fashion">
        </a>
        <nav class="page-header__menu">
            <ul class="main-menu main-menu--header">
                <li>
                    <a class="main-menu__item" href="index.html">Главная</a>
                </li>
                <li>
                    <a class="main-menu__item" href="products.html">Товары</a>
                </li>
                <li>
                    <a class="main-menu__item" href="orders.html">Заказы</a>
                </li>
                <li>
                    <a class="main-menu__item" href="#">Выйти</a>
                </li>
            </ul>
        </nav>
    </header>
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
                <input type="checkbox" name="new" id="new" class="custom-form__checkbox">
                <label for="new" class="custom-form__checkbox-label">Новинка</label>
                <input type="checkbox" name="sale" id="sale" class="custom-form__checkbox">
                <label for="sale" class="custom-form__checkbox-label">Распродажа</label>
            </fieldset>
            <button class="button" type="submit">Добавить товар</button>


        </form>
        <section class="shop-page__popup-end page-add__popup-end" hidden="">
            <div class="shop-page__wrapper shop-page__wrapper--popup-end">
                <h2 class="h h--1 h--icon shop-page__end-title">Товар успешно добавлен</h2>
            </div>
        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <a class="page-footer__logo" href="#">
                <img src="img/logo--footer.svg" alt="Fashion">
            </a>
            <nav class="page-footer__menu">
                <ul class="main-menu main-menu--footer">
                    <li>
                        <a class="main-menu__item" href="#">Главная</a>
                    </li>
                    <li>
                        <a class="main-menu__item" href="#">Новинки</a>
                    </li>
                    <li>
                        <a class="main-menu__item" href="index.html">Sale</a>
                    </li>
                    <li>
                        <a class="main-menu__item">Доставка</a>
                    </li>
                </ul>
            </nav>
            <address class="page-footer__copyright">
                © Все права защищены
            </address>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    
    <script>
    $(document).ready(function() {
        $('button').on('click', function() {
            var nameValue = $('input#product-name').val();
            var priceValue = $('input#product-price').val();
            var file_data = $('#product-photo').prop('files')[0];
            var form_data = new FormData();
            form_data.append('product-photo', file_data);
            form_data.append('product-name', nameValue);
            form_data.append('product-price', priceValue);
            alert(form_data);
            $.ajax({
                url: 'add_tovar.php', // <-- point to server-side PHP script
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response); // <-- display response from the PHP script, if any
                }
            });
        })
    });
    </script>


</body>

</html>