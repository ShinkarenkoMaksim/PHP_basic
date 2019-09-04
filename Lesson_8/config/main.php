<?php
//Файл констант
define("TEMLATES_DIR", '../views/');
define("LAYOUTS_DIR", 'layout/');
define("ENGINE_DIR", "../engine/");


/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'shop');

const ERR_CODE = [
    null => "",
    "OK" => "Отзыв добавлен!",
    "DELETED" => "Отзыв удален!",
    "ERROR_ADD" => "Ошибка добавления отзыва!",
    "ERROR_DEL" => "Ошибка удаления отзыва!",
    "ERROR_UPDATE" => "Ошибка изменения отзыва!",
    "UPDATED" => "Отзыв изменен!"
];

//Тут же подключим основные функции нашего приложения, пока это render
//Можете кстати подключить и в главном index.php если такая вложенность напрягает
include_once ENGINE_DIR . "lib_autoload.php";


