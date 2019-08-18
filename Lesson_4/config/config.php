<?php
define("TEMPLATES_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../view/");
define("BIG_IMG_DIR", "/gallery_img/big/"); // Если сделать здесь абсолютный путь, то html страница потеряет картинки
define("SMALL_IMG_DIR", "/gallery_img/small/"); // Если сделать здесь абсолютный путь, то html страница потеряет картинки

require_once $_SERVER['DOCUMENT_ROOT'] . "/../engine/functions.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/../engine/log.php";