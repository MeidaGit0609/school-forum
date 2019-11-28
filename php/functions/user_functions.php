<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/db.php';

// Добавляет юзера в БД
function add_user($name, $date_reg, $gender, $age, $email, $password) {
    global $db;

    $sql   = "INSERT INTO `users` 
    (`name`, `date_reg`, `gender`, `age`, `email`, `password`) 
    VALUES(:name, :date_reg, :gender, :age, :email, :password);";
    $query = $db->prepare($sql);
    $query->execute([
        'name'     => $name,
        'date_reg' => $date_reg,
        'gender'   => $gender,
        'age'      => $age,
        'email'    => $email,
        'password' => $password
    ]);

    return true;
}

// Выдаёт id по имени
function user_id_by_name($name) {
    global $db;

    $sql  = "SELECT `id` FROM `users` WHERE `name` = :name";
    $query = $db->prepare($sql);
    $query->execute([
        'name' => $name
    ]);
    $id = $query->fetchAll();
    $id['id'];

    return $id;
}

// Есть ли юзер с таким именем
function search_user_by_name($name) {
    global $db;

    $sql = "SELECT * FROM `users` WHERE `name` = :name";
    $query = $db->prepare($sql);
    $query->execute([
        'name' => $name
    ]);
    $num = $query->rowCount();

    if($num < 1) {
        return false;
    }
    else {
        return true;
    }
}

// Если данны правильные данные возвращает id пользователя
function auth_user($name, $password) {
    global $db;

    $sql = "SELECT `id` FROM `users` WHERE `name` = :name AND `password` = :password";
    $query = $db->prepare($sql);
    $query->execute([
        'name'     => $name,
        'password' => $password
    ]);

    if($query->rowCount() > 0) {
        $user_id = $query->fetchAll();

        return $user_id[0]['id'];
    }
    else {
        return false;
    }
}