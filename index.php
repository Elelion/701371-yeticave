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

    $title = "Главная";

//QUEST_3.1.6: Создайте в корне файл functions.php и подключите его в index.php. (см. каталог templates)
    require_once 'functions.php';
    
    $content = render('index', ['product_list' => $product_list]);
    print(render('layout', ['title' => $title, 'content' => $content, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'is_auth' => $is_auth,
        'category_list' => $category_list]));

//НЕ ЗАКРЫВАТЬ PHP!!!...