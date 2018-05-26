<?php
require_once 'src/functions.php';
date_default_timezone_set('Europe/Moscow');

//Защита от прямого захода по add.php
if(!isset($_POST["add_done"])) {
  Error404();
}

$link = connectDB();

//$id = mysqli_real_escape_string($link, $_GET['id']); //Экранируем наш SQL запрос

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
            #WHERE lot.id";
$result_lot = mysqli_query($link, $sql_lot);
$product_list = mysqli_fetch_all($result_lot, MYSQLI_ASSOC);


$sql_rate = "SELECT amount, date_create, username FROM rate
            INNER JOIN user ON user.id = rate.user_id WHERE rate.lot_id";
$result_rate = mysqli_query($link, $sql_rate);
$rate_list = mysqli_fetch_all($result_rate, MYSQLI_ASSOC);

$sql = "SELECT name, css_class FROM category";
$result = mysqli_query($link, $sql);    
$category_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = "img/user.jpg";

$title = "Главная"; 

$content = render('add', ['product_list' => $product_list, 
                          'category_list' => $category_list, 
                          'rate_list' => $rate_list]);

print(render('layout', ['title' => $title, 
                        'content' => $content, 
                        'user_name' => $user_name, 
                        'user_avatar' => $user_avatar, 
                        'is_auth' => $is_auth,                        
                        'category_list' => $category_list]));

//НЕ ЗАКРЫВАТЬ PHP!!!...