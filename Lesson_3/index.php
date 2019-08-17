<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

/*$menu = ['q1' => 'Задание 1',
    'q2' => 'Задание 2',
    'q3' => 'Задания 3, 8',
    'q4-5' => 'Задания 4-5, 9',
    'q6' => 'Задание 6',
    'q7' => 'Задание 7',];*/

$menu = ['main' => 'Главная',
    'Легко' => [
        'q1' => 'Задание 1',
        'q2' => 'Задание 2',
        'q3' => 'Задания 3, 8',],
    'Трудно' => [
        'q4-5' => 'Задания 4-5, 9',
        'q6' => 'Задание 6',],
    'q7' => 'Задание 7',];

switch ($page) {
    case 'main':
        $params = ['name' => 'Олег', 'menu' => $menu];
        break;
    default:
        $params = ['menu' => $menu];
}

echo render($page, $params);

function render($page, $params = [])
{
    return renderTempate("layout", ['content' => renderTempate($page, $params)]);
}

function renderTempate($page, $params = [])
{
    ob_start();

    extract($params);

    if(isset($params['menu'])) {
        renderMenu($params['menu']);
    }

    $filename = $page . ".php";

    if (file_exists($filename)) {
        include $filename;
    } else {
        echo "Страницы не существует 404";
    }

    return ob_get_clean();
}

function renderMenu($menu, $key = null) {

    ob_start();

    include "menu.php";

    return ob_end_flush();
}