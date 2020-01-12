<?php

$dbhost = "localhost"; // имя сервера
$dbname = "restaurant"; // имя базы данных
$username = "root"; // имя пользователя для входа в бд
$password = ""; // пароль

$db = new PDO ("mysql:host=$dbhost; dbname=$dbname", $username, $password);

function get_menu() {
    global $db;
    $menu = $db->query("SELECT * FROM menu");
    return $menu;
}
function get_reports() {
    global $db;
    $reports = $db->query("SELECT * FROM reports ORDER BY date DESC");
    return $reports;
}
function get_interiors() {
    global $db;
    $interiors = $db->query("SELECT * FROM interior");
    return $interiors;
}
function get_types() {
    global $db;
    $types = $db->query("SELECT * FROM menu");
    return $types;
}
function get_food($type) {
    global $db;
    $food = $db->query("SELECT * FROM $type");
    return $food;
}

?>