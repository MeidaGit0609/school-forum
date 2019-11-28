<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/user_functions.php';
$header = 'Location: /pages/auth.php?auth=';

if(isset($_POST['enter'])) {
    $name     = htmlspecialchars(trim($_POST['name']));
    $password = htmlspecialchars($_POST['password']);

    if(strlen($password) > 100 || strlen($password) < 1) {
        $header .= 'error';
    }
    elseif(strlen($name) < 1 || strlen($name) > 100) {
        $header .= 'error';
    }
    else {
        $password = md5($password);

        $user_id = auth_user($name, $password);

        if(is_numeric($user_id)) {
            if(setcookie('user', $user_id, time() + 64 * 64 * 24 * 365 * 365, '/')) {
                $header .= 'happy';
            }
            else {
                $header .= 'error';
            }
        }
        else {
            $header .= 'data_error';
        }


    }
}
else {
    $happy = 'error';
}

header($header);