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

    $is_auth = (bool) rand(0, 1);
    $user_name = 'Константин';
    $user_avatar = "img/user.jpg";

    $title = "Главная"; 
    
//QUEST_5.3: Используйте эти данные для показа списка карточек лотов на главной странице
    $content = render('index', ['product_list' => $product_list ]);

//QUEST_5.5: Используйте эти данные для показа списка категорий в футере страницы (вывод остается преждним как и ранее, лишь беруться данные из БД)
    print(render('layout', ['title' => $title, 'content' => $content, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'is_auth' => $is_auth,
        'category_list' => $category_list]));    


//НЕ ЗАКРЫВАТЬ PHP!!!...