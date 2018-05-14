<?php
    date_default_timezone_set('Europe/Moscow');

//QUEST_5.1: В сценарии главной страницы выполните подключение к MySQL
    $link = mysqli_connect("127.0.0.1", "root", "", "yeticave");
    mysqli_set_charset($link, "utf8");

    if (!$link) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

//QUEST_5.4: Отправьте SQL-запрос для получения списка категорий
    $sql = "SELECT * FROM category";
    $result = mysqli_query($link, $sql); //Подключаемся к БД и получаем результат (в переменную) от нашего вышеуказанного запроса SQL        
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); //MYSQLI_ASSOC - константа, которая возвращает массив в читабельном виде, (т.е. в виде матрици на вид как бы)

    //Выводим наши данные из БД в массив category_list[], выводим его ниже в QUEST_5.5...
    foreach ($rows as $row) {
        $category_list[] = $row['name'];            
    }

    require_once 'src/functions.php';

//QUEST_5.2: Отправьте SQL-запрос для получения всей информации по новым лотам
    $sql_lot = "SELECT * FROM lot";
    $result_lot = mysqli_query($link, $sql_lot);
    $rows_lot = mysqli_fetch_all($result_lot, MYSQLI_ASSOC);

    //Выводим наши данные из БД в массив category_list[], выводим его ниже...
    foreach ($rows_lot as $row_lot) {
			$product = []; //Задаем переменную как массив!!! Важно!!!
			$product['name'] = $row_lot['name']; //Запихиваем в нее знаения из нашей БД (см. запрос выше)
			$product['category'] = $row_lot['category'];
			$product['price'] = $row_lot['price'];
			$product['url'] = $row_lot['url'];
			$product_list[] = $product; //Когда передаем значения массиву, то пишем в таком формате $массив[] = $массив (БЕЗ [] важно!!!)
    }

//....................................................................

    $is_auth = (bool) rand(0, 1);
    $user_name = 'Константин';
    $user_avatar = "img/user.jpg";

    /*
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
    ];*/

    $title = "Главная"; 
    
//QUEST_5.3: Используйте эти данные для показа списка карточек лотов на главной странице
    $content = render('index', ['product_list' => $product_list ]);

//QUEST_5.5: Используйте эти данные для показа списка категорий в футере страницы (вывод остается преждним как и ранее, лишь беруться данные из БД)
    print(render('layout', ['title' => $title, 'content' => $content, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'is_auth' => $is_auth,
        'category_list' => $category_list]));

    require_once 'src/connect_db.php';


//НЕ ЗАКРЫВАТЬ PHP!!!...