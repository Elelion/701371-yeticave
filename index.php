<?php

//QUEST_3.1.5: В файле index.php удалите весь HTML-код, который вы перенесли в файлы шаблонов (см. каталог /templates/...)

//QUEST_1:
    //$is_auth - Переменная определяющая зарегистрировался ли(true) пользователь или нет(false)
    //Присваиваем рандомное значение 1 или 0
    $is_auth = (bool) rand(0, 1);
    $user_name = 'Константин';
    //Присваиваем картинку переменной
    $user_avatar = "img/user.jpg";
//QUEST_2.1: Добавьте в код файла index.php простой массив категорий со следующими значениями:
    //простой массив категорий. get, set и.т.п. в начале рекомендуется НЕ использовать!!!
    $category_list = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
//QUEST_2.2: Добавьте двумерный массив, каждый элемент которого будет ассоциативным массивом с данными одного объявления. 
    //ассоциативный массив. Где FullProduct = далее как FP
    $product_list = [
        [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'url' => 'img/lot-1.jpg'
        ],
        [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'url' => 'img/lot-2.jpg'
        ],
        [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'url' => 'img/lot-3.jpg'
        ],
        [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'url' => 'img/lot-4.jpg'
        ],
        [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'url' => 'img/lot-5.jpg'
        ],
        [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'url' => 'img/lot-6.jpg'
        ],
    ];
<<<<<<< HEAD

    $title = "Главная";
=======
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="main-header__container container">
        <h1 class="visually-hidden">YetiCave</h1>
        <a class="main-header__logo">
            <img src="img/logo.svg" width="160" height="39" alt="Логотип компании YetiCave">
        </a>
        <form class="main-header__search" method="get" action="https://echo.htmlacademy.ru">
            <input type="search" name="search" placeholder="Поиск лота">
            <input class="main-header__search-btn" type="submit" name="find" value="Найти">
        </form>
        <a class="main-header__add-lot button" href="add-lot.html">Добавить лот</a>

        <nav class="user-menu">

        <!-- QUEST-1: Условие должно проверять истинность значения переменной $is_auth (сравнивать с истиной) -->
        <?php
        if ($is_auth == true) {
            ?>
                <div class="user-menu__image">
                    <img src="<?php echo $user_avatar ?>" width="40" height="40" alt="Пользователь">
                </div>
                <div class="user-menu__logged">
                    <p><?php echo $user_name ?></p>
                </div>
            <?php
            } else {
            ?>
                <ul class="user-menu__list">
                    <li class="user-menu__item">
                    <a href="#">Регистрация</a>
                </li>

                <li class="user-menu__item">
                    <a href="#">Вход</a>
                </li>
                </ul>
            <?php

        	}
        ?>

        </nav>
    </div>
</header>

<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="promo__item promo__item--attachment">
                <a class="promo__link" href="all-lots.html">Крепления</a>
            </li>
            <li class="promo__item promo__item--boots">
                <a class="promo__link" href="all-lots.html">Ботинки</a>
            </li>
            <li class="promo__item promo__item--clothing">
                <a class="promo__link" href="all-lots.html">Одежда</a>
            </li>
            <li class="promo__item promo__item--tools">
                <a class="promo__link" href="all-lots.html">Инструменты</a>
            </li>
            <li class="promo__item promo__item--other">
                <a class="promo__link" href="all-lots.html">Разное</a>
            </li>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">

<!-- QUEST_2.4: Объявления выводятся как элементы списка ul.lots__list. Используя цикл для прохода по массиву с лотами, 
    заполните этот список объявлениями. Каждый элемент списка (объявление) должно подставлять информацию в теги 
    из соответствующего ключа массива. -->
            <?php foreach($product_list as $product) { ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $product['url']; ?>" width="350" height="260" alt="Сноуборд">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $product['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?= $product['name']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            
                            <span class="lot__cost"><?= number_format($product['price'], 0, ',' , ' ' ); ?><b class="rub">р</b></span>                            
                            <!-- <span class="lot__cost"> //$product['price']; <b class="rub">р</b></span> -->
                        </div>
                        <div class="lot__timer timer">

                        </div>
                    </div>
                </div>
            </li>
          <?php } ?>
        </ul>
    </section>
</main>

<footer class="main-footer">
    <nav class="nav">
        <ul class="nav__list container">


<!-- QUEST_2.3: Найдите в HTML-коде список ul.nav__list. Используйте цикл, чтобы заменить содержимое списка данными из массива категорий./li> 
    Сокращаеть переменные до cat... м.и.п. НЕ рекомендуется. Т.к. тыкнув в любую строку, нужно опнимать что происходит в коде -->
        <?php foreach($category_list as $category) { ?>
            <li class="nav__item">
                <a href="all-lots.html"><?php print($category); ?></a>
            </li>
        <?php } ?>
<!--        
1st_version:
>>>>>>> c887da9122a8b1dcd555e6e6f85140f24f1688bd

//QUEST_3.1.6: Создайте в корне файл functions.php и подключите его в index.php. (см. каталог templates)
    require_once 'functions.php';
    
    $content = render('index', ['product_list' => $product_list]);
    print(render('layout', ['title' => $title, 'content' => $content, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'is_auth' => $is_auth,
        'category_list' => $category_list]));

//НЕ ЗАКРЫВАТЬ PHP!!!...