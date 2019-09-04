<?php
function saveUser($name = 'Someone', $phone, $address = 'no_address') {
    $session_id = session_id();

    $sql = "INSERT INTO `orders` (`name`, `phone`, `address`, `session_id`) VALUES ('{$name}', '{$phone}', '{$address}', '{$session_id}');";
    executeQuery($sql);

    $sql = "UPDATE `basket` SET `order_id`=(SELECT LAST_INSERT_ID()) WHERE `session_id`='{$session_id}' AND `order_id` IS NULL;";
    executeQuery($sql);
}

function getOrderList() {
    if (is_admin()) {
        $sql = "SELECT * FROM orders WHERE 1;";
        $orders = getAssocResult($sql);

    } else {
        $session_id = session_id();
        $sql = "SELECT * FROM orders WHERE `session_id` = '{$session_id}';";
        $orders = getAssocResult($sql);
    }
    return $orders;
}

function getOrders($order_id = null) {
    if (is_admin()) {

        $sql = "SELECT basket.id as basket_id, goods.id as good_id, goods.name as name, goods.price as price, goods.image as image FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `basket`.`order_id`='{$order_id}';";

        $basket = getAssocResult($sql);
    } else {
        $session_id = session_id();
        $sql = "SELECT basket.id as basket_id, goods.id as good_id, goods.name as name, goods.price as price, goods.image as image FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id`='{$session_id}' AND basket.`order_id` IS NOT NULL";
        $basket = getAssocResult($sql);
    }
    return $basket;
}


function setStatus($id, $stat) {
    $sql = "UPDATE `orders` SET `stat`= '{$stat}' WHERE `id` = '{$id}';";
    executeQuery($sql);
}

function cancelOrder($id) {
    $session_id = session_id();
    $sql = "UPDATE `orders` SET `stat`= 'canceled' WHERE `id` = '{$id}' AND `session_id` = '{$session_id}';";
    executeQuery($sql);
}