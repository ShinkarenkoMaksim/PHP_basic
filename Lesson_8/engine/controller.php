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
    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    }
    $params['count'] = getBasketCount();
    switch ($page) {

        case 'login':
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (!auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($_POST['save'])) {
                    makeHashAuth();
                }
            }
            header("Location: /");
            break;

        case 'logout':
            session_destroy();
            setcookie("hash", "", time() - 3600, "/");
            header("Location: /");
            break;

        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':
            //пример асинхронного обработчика лайков к новостям
            if ($action == "addlike") {
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

        case "basket":

            $params['basket'] = getBasket();
            $params['summ'] = summFromBasket();

            break;


        case 'api':
            if ($action == "buy") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;

                addToBasket($id);
                $params['count'] = getBasketCount();

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
            if ($action == "deleteFromBasket") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;

                deleteFromBasket($id);

                $params['count'] = getBasketCount();
                $params['summ'] = summFromBasket();
                $params['id'] = $id;

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
            if ($action == "stat") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;
                $stat = $data->stat;
                setStatus($id, $stat);

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
            if ($action == "cancel") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;
                cancelOrder($id);
                $params['id'] = $id;
                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
            break;

        case 'order':
            if($action == "add") {
                if ($_POST['phone'] == "") {
                    die('Необходимо ввести контактный номер телефона');
                }
                $address = $_POST['address'];
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                saveUser($name, $phone, $address);
                header("Location: /order");
            }
            $params['order'] = getOrderList();
            foreach ($params['order']  as $key => $item) {
                $params['order'][$key]['basket'] = getOrders($item['id']);
                switch ($item['stat']) {
                    case 'new':
                        $params['order'][$key]['status'] = 'Новый';
                        break;
                    case 'process':
                        $params['order'][$key]['status'] = 'В процессе';
                        break;
                    case 'completed':
                        $params['order'][$key]['status'] = 'Выполнен';
                        break;
                    case 'canceled':
                        $params['order'][$key]['status'] = 'Отменен';
                        break;
                }
            }
            break;
    }

    return $params;
}





