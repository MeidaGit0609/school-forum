<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/user_functions.php';
session_start();

$header = 'Location: /pages/registr.php?registr=';

if(isset($_POST['enter'])) {
    // Входные данные
    $name            = htmlspecialchars(trim($_POST['name']));
    $email           = htmlspecialchars(trim($_POST['email']));
    $age             = htmlspecialchars(trim((int)$_POST['age']));
    $gender          = htmlspecialchars(trim($_POST['gender']));
    $password        = htmlspecialchars($_POST['password']);
    $password_repeat = htmlspecialchars($_POST['password-repeat']);

    // Проверка всех полей
    if(search_user_by_name($name) == true) {
        $header .= 'user_repeat';
    }
    elseif(is_numeric($name) && strlen($name) < 3 && strlen($name) > 50) {
        $header .= 'big-name';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 89) {
        $header .= 'email-fail';
    }
    elseif(strlen($password) < 3) {
        $header = 'mini-password';
    }
    elseif(strlen($password) > 150) {
        $header .= 'big-password';
    }
    elseif($password != $password_repeat) {
        $header .= 'password-repeat_fail';
    }
    elseif(strlen($age) != 4 && !is_int($age) && (date('Y') - $age) < 8 && $age < 1920) {
        $header .= 'age-fail';
    }
    elseif(strlen($gender) < 1 && strlen($gender) > 20) {
        $header .= 'gender-fail';
    }
    else {
        $email_code = substr(md5($email), 0, 4);
        $message    = "Спасибо за регистрацию на нашем форуме!!\nКод для регистрации: $email_code";
        $subject    = "Подтверждение почты";

        if(mail($email, $subject, $message)) { // Отправка удалась

            // Записываю в ссесию данные
            $_SESSION['email_code']        = $email_code;
            $_SESSION['name']              = $name;
            $_SESSION['date_reg']          = time();
            $_SESSION['gender']            = $gender;
            $_SESSION['age']               = date('Y') - $age;
            $_SESSION['email']             = $email;
            $_SESSION['password']          = md5($password);

            $header .= 'code';

        }
        else {
            $header .= 'code-fail';
        }
    }
}
else {
    $header .= '';
}




//session_destroy();
header($header);
