<?php
  function render($name, $data) {
    ob_start();   
    $filePath = 'templates' . DIRECTORY_SEPARATOR . $name . '.php';

    if (is_file($filePath)) {      
        require $filePath;
    }

    $content = ob_get_contents();  
    ob_clean();

    return $content;
  }

//Выводим оставшиеся время
  function elapsedTime() {		
    $ts_midnight = strtotime('tomorrow');               //tomorrow - означает, полночть    
    $secs_to_midnight = $ts_midnight - time();          //считаем разницу между полуночтью и текущем временем
    $hours = floor($secs_to_midnight / 3600);           //Получаем число часов, floor - округление
    $minutes = floor(($secs_to_midnight % 3600) / 60);  //Получаем число минут, floor - округление
    print("$hours Ч : $minutes М");                     //выводим оставшиеся часы и минуты
  }

//Подключаемся к ДБ
  function connectDB() {
    $link = mysqli_connect("127.0.0.1", "root", "", "yeticave"); //ВАЖНО: данные для подключения должны всегда храниться в файле!!!
    mysqli_set_charset($link, "utf8");

    if (!$link) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    return $link;
  }

  //Считаем кол-во записей в категориях
  function countCategory() {   
    //подключаемся к БД
    $link = connectDB();

    $sql_category_count = "SELECT * FROM category";
    $result_category = mysqli_query($link, $sql_category_count);

    //mysqli_num_rows - подсчитывает кол-во записей в ДБ
    $records_count = mysqli_num_rows($result_category);

    //print($records_count);    
    return $records_count;
  }
?>