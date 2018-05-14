<?php
  function render($name, $data)
  {    
    ob_start();   
    $filePath = 'templates' . DIRECTORY_SEPARATOR . $name . '.php';

    if (is_file($filePath)) {      
        require $filePath;
    }

    $content = ob_get_contents();  
    ob_clean();

    return $content;
  }

  function elapsedTime()
  {  		
    $ts_midnight = strtotime('tomorrow');               //tomorrow - означает, полночть    
    $secs_to_midnight = $ts_midnight - time();          //считаем разницу между полуночтью и текущем временем
    $hours = floor($secs_to_midnight / 3600);           //Получаем число часов, floor - округление
    $minutes = floor(($secs_to_midnight % 3600) / 60);  //Получаем число минут, floor - округление
    print("$hours Ч : $minutes М");                     //выводим оставшиеся часы и минуты
  }
?>