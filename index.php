<?php
require_once 'src/functions.php';
date_default_timezone_set('Europe/Moscow');

$link = connectDB(); //link - хранит ресурс, ресурс не как не отображается.

$sql = "SELECT * FROM category";
$result = mysqli_query($link, $sql);

//MYSQLI_ASSOC - возвращает массив в читабельном виде (типа матрици)
$category_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql_lot = "SELECT 
            title AS name, 
            start_price as price,
            image_file as url,
            lot.id, #добавляем для id по которому будет происходить линк на др. стр
            category.name as category
            FROM lot 
            INNER JOIN category ON lot.category_id = category.id";

$result_lot = mysqli_query($link, $sql_lot);    
$product_list = mysqli_fetch_all($result_lot, MYSQLI_ASSOC);

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = "img/user.jpg";

$title = "Главная"; 

$content = render('index', ['product_list' => $product_list, 'category_list' => $category_list]);

print(render('layout', ['title' => $title, 
                        'content' => $content, 
                        'user_name' => $user_name, 
                        'user_avatar' => $user_avatar, 
                        'is_auth' => $is_auth, 
                        'category_list' => $category_list]));

//НЕ ЗАКРЫВАТЬ PHP!!!...