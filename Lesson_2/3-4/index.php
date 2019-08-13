<?php

function summation ($a, $b) {
    return $a + $b;
}

function subtraction ($a, $b) {
    return $a - $b;
}

function multiplication ($a, $b) {
    return $a * $b;
}

function division ($a, $b) {
    return $a / $b;
}

function mathOperation ($arg1, $arg2, $operation) {
    $result = 0;
    switch ($operation) {
        case "summation":
            $result = summation($arg1, $arg2);
            break;
        case "subtraction":
            $result = subtraction($arg1, $arg2);
            break;
        case "multiplication":
            $result = multiplication($arg1, $arg2);
            break;
        case "division":
            $result = division($arg1, $arg2);
    }
    return $result;
}