<?php

function auth($login, $pass)
{
    //$db = get_db();
    $login = strip_tags(stripslashes($login));

    $sql = "SELECT * FROM users WHERE login = '{$login}'";
    //$result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $result = getAssocResult($sql)[0];
    //$row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $result['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $result['id'];
        return true;
    }
    return false;
}

function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        //$db = get_db();
        $result = getAssocResult("SELECT * FROM `users` WHERE `hash`='{$hash}'")[0];
        //$result = mysqli_query($db, $sql);
        //$row = mysqli_fetch_assoc($result);
        $user = $result['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user()
{
    return is_auth() ? $_SESSION['login'] : false;
}
