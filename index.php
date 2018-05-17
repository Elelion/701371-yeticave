<?php
	require_once 'src/functions.php';

    date_default_timezone_set('Europe/Moscow');

//QUEST_5.1: В сценарии главной страницы выполните подключение к MySQL
    //$link - присваиваем ему ф-цию.

    $link = connectDB();    

//QUEST_5.4: Отправьте SQL-запрос для получения списка категорий
    $sql = "SELECT * FROM category";
    $result = mysqli_query($link, $sql); //Подключаемся к БД и получаем результат (в переменную) от нашего вышеуказанного запроса SQL        
    $category_list = mysqli_fetch_all($result, MYSQLI_ASSOC); //MYSQLI_ASSOC - константа, которая возвращает массив в читабельном виде, (т.е. в виде матрици на вид как бы)

//QUEST_5.2: Отправьте SQL-запрос для получения всей информации по новым лотам
    //Выводим наши данные из БД в массив category_list[], выводим его ниже...    
    $sql_lot = "SELECT 
                title AS name, 
                start_price as price,
                image_file as url,
                category.name as category
                FROM lot 
                INNER JOIN category ON lot.category_id = category.id";
    
    $result_lot = mysqli_query($link, $sql_lot);    
    $product_list = mysqli_fetch_all($result_lot, MYSQLI_ASSOC);

    $is_auth = (bool) rand(0, 1);
    $user_name = 'Константин';
    $user_avatar = "img/user.jpg";

    $title = "Главная"; 
    
//QUEST_5.3: Используйте эти данные для показа списка карточек лотов на главной странице
    $content = render('index', ['product_list' => $product_list, 'category_list' => $category_list]);

//QUEST_5.5: Используйте эти данные для показа списка категорий в футере страницы (вывод остается преждним как и ранее, лишь беруться данные из БД)
    print(render('layout', ['title' => $title, 'content' => $content, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'is_auth' => $is_auth,
        'category_list' => $category_list]));

//НЕ ЗАКРЫВАТЬ PHP!!!...