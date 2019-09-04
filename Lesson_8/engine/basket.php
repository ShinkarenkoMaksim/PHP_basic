<?php

function deleteFromBasket($id) {
    $id=(int)$id;
    $session_id = session_id();
    if (is_admin())
        $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id} AND `session_id`='$session_id'";
    else
        $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id}";
    return executeQuery($sql);
}

function getBasket() {
    $session_id = session_id();
    $sql = "SELECT basket.id as basket_id, goods.id as good_id, goods.name as name, goods.price as price, goods.image as image FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id`='{$session_id}' AND basket.order_id IS NULL";
    $basket = getAssocResult($sql);
    return $basket;
}

function summFromBasket() {
    $session_id = session_id();
    $sql = "SELECT SUM(goods.price) as summ FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id` ='$session_id' AND basket.order_id IS NULL";
    return getAssocResult($sql)[0]['summ'];
}

function addToBasket($id) {
    $id = (int)$id;
    $session_id = session_id();
    $sql = "INSERT INTO `basket` (`session_id`, `goods_id`) VALUES ('{$session_id}', '{$id}');";
    return executeQuery($sql);
}

function getBasketCount() {
    $session_id = session_id();
    $sql = "SELECT COUNT(id) as count FROM `basket` WHERE `session_id`='$session_id' AND basket.order_id IS NULL";
    $result = getAssocResult($sql);
    $count = [];
    if (isset($result[0]))
        $count = $result[0];
    return $count['count'];
}