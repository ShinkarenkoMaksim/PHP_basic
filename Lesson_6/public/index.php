<?php
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу
require_once $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$url_array = explode("/", $_SERVER['REQUEST_URI']);

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
$page = "";
$action = "";
$id = "";
if ($url_array[1] == "") {
    $page = 'main';
} else {
    $page = $url_array[1];
    if (!$url_array[2]=="") {
        if (is_numeric($url_array[2])) {
            $id = $url_array[2];
            if (isset($url_array[3])){
                $action = $url_array[3];
            }
        } else {
            $action = $url_array[2];
            if (is_numeric($url_array[3])) {
                $id = $url_array[3];
            }
        }
    }
}

$params = prepareVariables($page, $action, $id);

//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);

