<?php


function getBascket() {
    $session_id = session_id();
    $sql = "SELECT basket.id AS `id`, basket.id_good AS `id_good`, goods.image AS image, goods.name AS `name`, goods.price AS `price` FROM `basket`, `goods` WHERE id_good = goods.id AND id_session = '{$session_id}'";
    $result = getAssocResult($sql);
    return $result;
}

function getBasketCount() {
    $session_id = session_id();
    $sql = "SELECT COUNT(*) FROM basket WHERE id_session = '{$session_id}'";
    return getAssocResult($sql)['0']['COUNT(*)'];
}

function deleteFromBasket($id) {
    $session_id = session_id();
    $sql = "DELETE FROM `basket` WHERE id = '{$id}' AND id_session = '{$session_id}'";
    return executeQuery($sql);
}

function addToBasket($good_id) {
    $session_id = session_id();
    $sql = "INSERT INTO `basket`(`id_session`, `id_good`) VALUES ('{$session_id}', {$good_id})";
    return executeQuery($sql);
}