<?php

function prepareVariables($page, $action, $id, $params = []) {
    switch ($page) {
        case 'main':
            $params = ['name' => 'Alex'];
            break;
        case 'catalog':

            $params = ['catalog' => [
                "Спички",
                "Метла",
                "Ведро"
            ]
            ];
            _log($params, "params");
            break;

        case 'news':
            $params = [
                'news' => getNews()
            ];
            break;
        case 'newscontent':
            $params = [
                'newscontent' => getNewsContent($id)
            ];

            break;
        case 'gallery':
            $params = [
                'gallery' => getGallery(),
            ];
            break;
        case 'img':
            $params = [
                    'img' => getImg($id),
                'row' => [
                    'action' => 'add',
                    'submit' => 'Отправить',
                    'url' => "/img/{$id}",
                ],];
            doFeedbackAction($params, $action, $id);
            $params['feedback'] = getAllFeedback($id);
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
        case 'feedback':

            doFeedbackAction($params, $action, $id);

            $params['feedback'] = getAllFeedback('*');
            break;
    }
    return $params;
}

function getGallery() {
    $gallery = getAssocResult("SELECT * FROM goods ORDER BY views DESC");
    return $gallery;
}

function getImg($id) {
    $id = (int)$id;
    $sql = "SELECT * FROM goods WHERE id = {$id}";
    $sqlSet = "UPDATE goods SET views=views+1 WHERE id = {$id}";
    executeQuery($sqlSet);
    $imgs = getAssocResult($sql);
    //В случае если картинки нет, вернем пустое значение
    $result = [];
    if(isset($imgs[0]))
        $result = $imgs[0];
    return $result;
}

function doFeedbackAction(&$params, $action, $id, $header = '/img/') {
    switch ($action) {
        case "del":
            $id_mes = (int)$_GET['id'];
            $sql = "UPDATE `feedback` SET `hidden` = 1 WHERE id = ' {$id_mes}';";
            $result = executeQuery($sql);
            $params['row'] = ['action' => 'add',
                'submit' => 'Отправить',
                'url' => " {$header}{$id}",
            ];
            header("Location: {$params['row']['url']}/?message=del");
            break;

        case "add":
            $name = strip_tags(htmlspecialchars($_POST['name']));
            $feedback = strip_tags(htmlspecialchars($_POST['feedback']));
            $id_img = strip_tags(htmlspecialchars($id));
            $sql = "INSERT INTO `feedback` (`name`, `feedback`, `id_img`) VALUES ('{$name}', '{$feedback}', '{$id_img}');";
            $result = executeQuery($sql);
            $params['row'] = [
                'action' => 'add',
                'submit' => 'Отправить',
                'url' => "{$header}{$id}",
            ];
            header("Location: {$params['row']['url']}/?message=OK");
            break;

        case "edit":
            $id_mes = (int)$_GET['id'];
            $sql = "SELECT * FROM `feedback` WHERE id = {$id_mes};";
            $result = getAssocResult($sql)[0];
            $params['row'] = [
                'name' => $result['name'],
                'text' => $result['feedback'],
                'id' => $result['id'],
                'action' => 'save',
                'submit' => 'Исправить',
                'url' => "{$header}{$id}",
            ];
            break;

        case "save":
            $name = strip_tags(htmlspecialchars($_POST['name']));
            $feedback = strip_tags(htmlspecialchars($_POST['feedback']));
            $id_mes = strip_tags(htmlspecialchars($_POST['id']));
            $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id_mes};";
            $result = executeQuery($sql);
            $params['row'] = [
                'action' => 'add',
                'submit' => 'Отправить',
                'url' => "{$header}{$id}",
            ];
            header("Location: {$params['row']['url']}/?message=save");
        }
    return $result;
}

function getAllFeedback($id_img) {
    $sql = "SELECT * FROM `feedback` WHERE id_img = {$id_img} AND hidden = 0 ORDER BY id DESC";
    $params['row'] = [
        'action' => 'add',
        'submit' => 'Отправить',
        'url' => "/img/{$id_img}/",
    ];
    return getAssocResult($sql);
}

function getNews() {
    $news = getAssocResult("SELECT * FROM news");
    return $news;
}

function getNewsContent($id) {
    $id = (int)$id;
    $sql = "SELECT text FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($news[0]))
        $result = $news[0];
    return $result;
}

function render($page, $params = [])
{
    return renderTempate(LAYOUTS_DIR . "layout", ['content' => renderTempate($page, $params)]);
}


function renderTempate($page, $params = [])
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
