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

//ф-ция для шаблона пути
function getPathToScript($file) {    
    $path = $file . '.php';        
    return $path;
}

//Выводим оставшиеся время
function elapsedTime($format = "%H Ч : %M M") {		
    //tomorrow - означает, полночть
    $ts_midnight = strtotime('tomorrow');

    $secToMidnight = $ts_midnight - time();
    $result = gmstrftime($format, $secToMidnight);
    return $result;
}

//Подключаемся к ДБ
function connectDB() {    
    //ВАЖНО: данные для подключения должны всегда храниться в файле!!!
    $link = mysqli_connect("127.0.0.1", "root", "", "yeticave");
    mysqli_set_charset($link, "utf8");

    if (!$link) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    return $link;
}

//Ошибка 404
function Error404() {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); //Сообщаем 404 ошибку
    exit();
}

//Подсчитываем Вашу ставку см.templates \ lot.php
function sumPrice($current, $stepPrice) {
    $sum = $current + $stepPrice;
    return $sum;
}
?>