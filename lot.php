<?php
require_once 'src/functions.php';
date_default_timezone_set('Europe/Moscow');

//QUEST_6.6: Если параметр запроса отсутствует, либо если по этому id не нашли ни одной записи, 
//то вместо содержимого страницы возвращать код ответа 404. 
if((empty($_GET['id']))) { //если передан ПУСТОЙ параметр, то...
    Error404();
}

$link = connectDB();

/*QUEST_6.4: Сформируйте и выполните SQL на чтение записи из таблицы с лотами, 
где id лота равен полученному из параметра запроса.
Получаем наш переданный ID из адресной строки*/
$id = mysqli_real_escape_string($link, $_GET['id']); //Экранируем наш SQL запрос

//QUEST_6.4: 3Проверьте существование параметра запроса с id лота
$sql_lot = "SELECT 
            title AS name, 
            start_price AS price,
            step_price AS StepPrice,
            image_file AS url,
            lot.id, #category_id as id, #добавляем для id по которому будет происходить линк на др. стр
            description AS descr, #это будет нашим описанием
            category.name AS category
            FROM lot 
            INNER JOIN category ON lot.category_id = category.id                            
            WHERE lot.id = $id"; #выводим ту строку, где есть наш id, что был передан через url
$result_lot = mysqli_query($link, $sql_lot);
$product_list = mysqli_fetch_all($result_lot, MYSQLI_ASSOC); //MYSQLI_ASSOC - возвращает массив в читабельном виде (типа матрици)


$sql_rate = "SELECT amount, date_create, username FROM rate
            INNER JOIN user ON user.id = rate.user_id WHERE rate.lot_id = $id";
$result_rate = mysqli_query($link, $sql_rate);
$rate_list = mysqli_fetch_all($result_rate, MYSQLI_ASSOC);

// ИЛИ QUEST_6.3: Проверьте существование параметра запроса с id лота
if(empty($product_list)) {
    Error404();
}

$sql = "SELECT name, css_class FROM category";
$result = mysqli_query($link, $sql);    
$category_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = "img/user.jpg";

$title = "Главная"; 

$content = render('lot', ['product_list' => $product_list, 
                          'category_list' => $category_list, 
                          'rate_list' => $rate_list]);

print(render('layout', ['title' => $title, 
                        'content' => $content, 
                        'user_name' => $user_name, 
                        'user_avatar' => $user_avatar, 
                        'is_auth' => $is_auth,                        
                        'category_list' => $category_list]));

//НЕ ЗАКРЫВАТЬ PHP!!!...