<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/user_functions.php';

$header = 'Location: /pages/registr.php?registr=';

if(isset($_POST['enter']) && isset($_SESSION['email_code'])) {
    $code       = $_SESSION['email_code'];
    $name       = $_SESSION['name'];
    $date_reg   = $_SESSION['date_reg'];
    $gender     = $_SESSION['gender'];
    $age        = $_SESSION['age'];
    $email      = $_SESSION['email'];
    $password   = $_SESSION['password'];

    if($code != $_POST['code']) {
        $header .= 'code_fail';
    }
    else {

        if(add_user($name, $date_reg, $gender, $age, $email, $password) === true) {
            $id = user_id_by_name($name);
            $id = $id[0]['id'];
            setcookie('user', $id, time() + 64 * 64 * 24 * 365 * 365, '/');
            $header .= 'happy';
        }



    }
}

//echo $id;
session_destroy();
header($header);