<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/db.php';

// Выдаёт пункты меню
function get_menu_items() {
    global $db;

    $sql = "SELECT `title`, `access`, `link` FROM `menu_items`";
    $query = $db->query($sql);
    $menu_items = $query->fetchAll();

    return $menu_items;
}