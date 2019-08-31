<?php

function getOneGood($id) {
    $id = (int)$id;
    $sql = "SELECT * FROM goods WHERE id = {$id}";

    $result = getAssocResult($sql)[0];

    return $result;
}

function getAllGoods() {
    $sql = "SELECT * FROM goods WHERE 1";
    $result = getAssocResult($sql);
    return $result;
}