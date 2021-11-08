<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";
?>


<form class="custom-form" action="" method="post" enctype="multipart/form-data">
    <fieldset class="page-add__group custom-form__group">
        <legend class="page-add__small-title custom-form__title">Раздел</legend>
        <div class="page-add__select">
            <select id="category" name="category" class="custom-form__select" multiple="multiple">
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