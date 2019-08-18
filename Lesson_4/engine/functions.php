<?php

function render($page, $params = [])
{
    return renderTemplate("layout", ['content' => renderTemplate($page, $params),
                                            'menu' => renderTemplate('menu' ,$params['menu'])]);
}

function renderTemplate($page, $params = [])
{
    ob_start();

    extract($params);

    $filename = TEMPLATES_DIR . $page . ".php";

    if (file_exists($filename)) {
        include $filename;
    } else {
        echo "Страницы не существует 404";
    }


    return ob_get_clean();
}


function getImages($imgs){
    return array_slice(scandir($imgs),2);
}