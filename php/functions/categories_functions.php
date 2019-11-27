<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/db.php';

// Массив с категориями
function get_categories($page) {
    global $db, $itemOnePage;

    $offset = ($page - 1) * $itemOnePage;

    $sql        = "SELECT * FROM `categories` LIMIT $itemOnePage OFFSET $offset";
    $query      = $db->query($sql);
//    $query->execute();
    $categories = $query->fetchAll();

    return $categories;
}

// Считает категории
function categories_count() {
    global $db;

    $sql = "SELECT * FROM `categories`";
    $query = $db->query($sql);
    $count = $query->rowCount();

    return $count;
}