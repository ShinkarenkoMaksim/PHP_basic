<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

if (isset($_GET['page']) && $_GET['page'] != '/') {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

$menu = [
    [
        "title" => "Главная",
        "href" => "/",
    ],
    [
        "title" => "Каталог",
        "href" => "catalog",
    ],
    [
        "title" => "Галерея",
        "href" => "gallery",
    ],
];

switch ($page) {
    case 'main':
        $params = ['name' => 'Alex', 'menu' => $menu];
        break;
    case 'catalog':

        $params = ['catalog' => [
                                    "Спички",
                                    "Метла",
                                    "Ведро"
                                ],
            'menu' => $menu,
        ];
        _log($params, "params");
        break;
        case 'gallery':
        $params = [
            'images' => getImages($_SERVER['DOCUMENT_ROOT'] . SMALL_IMG_DIR),
            'menu' => $menu,
        ];

        break;
    case 'apicatalog':
        $params = ['catalog' => [
            "Спички",
            "Метла",
            "Ведро"
        ]
        ];
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        die();
        break;
    default:
        $params = ['menu' => $menu];
}



echo render($page, $params);

