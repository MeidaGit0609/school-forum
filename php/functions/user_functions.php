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