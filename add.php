<?php
require_once 'src/functions.php';
date_default_timezone_set('Europe/Moscow');


if(!empty($_POST['lot-name'])) {
  
}
  ?>  
<!--
  <style>
    #lot-name {    
      border: 1px solid red;
    }
  </style>  
-->
  <?php

if(!empty($_POST['lot-rate'])) {
  
}

if(!empty($_POST['lot-step'])) {
  
}

//Проверяем нажатие нашей кнопки
if(isset($_POST['add_lot'])) {
  if($_POST['lot-category'] == "Выберите категорию") {
    ?><style>
      #category { border: 1px solid red; }    
    </style> <?php    
  }
  else {
    //Загрузка файла
    if($_FILES['load']['error'] == 0) //Проверяем нет ли ошибок, если НЕТ, то...
    {
      if($_FILES['load']['size'] <= 100000) //Проверяем размер
      {
        $types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

        //Проверяем разрешения файла
        if (in_array($_FILES['load']['type'], $types)) {
          move_uploaded_file($_FILES['load']['tmp_name'], 'img/'.$_FILES['load']['name']);

          //сохраняем наш файл с расширением                  
          $extension = $_FILES['load']['name'];

          //присваиваем новое уникальное имя . и получаем расширение, которое было сохр.
          $_FILES['load']['name'] = uniqid() . "." . getFileExtension($extension);

          echo "Был перемещен 1 файл" . $_FILES['load']['name'];
        }      
      }
    }
    echo $_POST['lot-name'];
    echo $_POST['lot-rate'];
    echo $_POST['lot-category'];
    echo $_POST['lot-step'];

    else {
      echo "ошибка при передаче файла на сервер!";
    }
  } //else...
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