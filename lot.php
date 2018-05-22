<?php
require_once 'src/functions.php';

//QUEST_6.6: Если параметр запроса отсутствует, либо если по этому id не нашли ни одной записи, 
//то вместо содержимого страницы возвращать код ответа 404. 
// ИЛИ QUEST_6.3: Проверьте существование параметра запроса с id лота
if((empty($_GET['id'])) || ($_GET['id'] > countCategory())) { //если передан ПУСТОЙ параметр, то...
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); //Сообщаем 404 ошибку
    exit();
}
else {        
    date_default_timezone_set('Europe/Moscow');

    $link = connectDB();

    $sql = "SELECT * FROM category";
    $result = mysqli_query($link, $sql);

    //MYSQLI_ASSOC - возвращает массив в читабельном виде (типа матрици)
    $category_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

    /*QUEST_6.4: Сформируйте и выполните SQL на чтение записи из таблицы с лотами, 
    где id лота равен полученному из параметра запроса.
    Получаем наш переданный ID из адресной строки*/
    $id = $_GET['id'];    

    $sql_lot = "SELECT 
                title AS name, 
                start_price as price,
                image_file as url,
                category_id as id, #добавляем для id по которому будет происходить линк на др. стр
                description as descr, #это будет нашим описанием
                category.name as category
                FROM lot 
                INNER JOIN category ON lot.category_id = category.id                

                #QUEST_6.4: 3Проверьте существование параметра запроса с id лота
                WHERE category_id = $id"; #выводим ту строку, где есть наш id, что был передан через url
    $result_lot = mysqli_query($link, $sql_lot);    
    $product_list = mysqli_fetch_all($result_lot, MYSQLI_ASSOC);

    $is_auth = (bool) rand(0, 1);
    $user_name = 'Константин';
    $user_avatar = "img/user.jpg";

    $title = "Главная"; 
    
    $content = render('lot', ['product_list' => $product_list, 'category_list' => $category_list]);

    print(render('layout', ['title' => $title, 
                            'content' => $content, 
                            'user_name' => $user_name, 
                            'user_avatar' => $user_avatar, 
                            'is_auth' => $is_auth, 
                            'category_list' => $category_list]));
} //else...

//НЕ ЗАКРЫВАТЬ PHP!!!...