<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action, $id)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = [];
    $params['allow'] = false;
    //$params['count'] = getBasketCount();
    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    }
    $params['count'] = getBasketCount();
    switch ($page) {

        case 'login':
            //проверка логина и пароля
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            if (!auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    $id = strip_tags(stripslashes($_SESSION['id']));
                    executeQuery("UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}");
                    setcookie("hash", $hash, time() + 3600);

                }
                $params['allow'] = true;
                $params['user'] = get_user();

                header("Location: /");

            }

            break;

        case 'logout':
            session_destroy();
            setcookie("hash");
            header("Location: /");
            break;

        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':
            //пример асинхронного обработчика лайков к новостям
            if ($action=="addlike") {
                //обращаемся к модели и ставим лайк
                $result = addNewsLike($id);
                echo json_encode(["result" => $result]);
            }

            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'feedback':

            doFeedbackAction($params, $action, $id);

            $params['feedback'] = getAllFeedback();

            break;

        case 'catalog':

            $params['goods'] = getAllGoods();
            break;

        case 'item':
            $params['good'] = getOneGood($id);
            break;

        case 'addToBasket':
            addToBasket($_GET['good_id']);
            header("Location: /catalog/");
            break;
        case 'basket':
            $params['goods'] = getBascket();
            break;
        case 'delGood':
            deleteFromBasket($_GET['id']);
            header("Location: /basket/");
            break;
    }

    return $params;
}





