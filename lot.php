<?php

require 'init.php';
require 'functions.php';

$con = getConnection();
if ($con == false) {
	print("Ошибка подключения: " . mysqli_connect_error());
}

$categories = getCategories($con);

$lot_id = (int) $_GET['id'];
$lot = [];
if ($lot_id >= 1) {
	$lot = getLotByID($con, $lot_id); // Получаем лот из базы данных по его id
} else {
	http_reponse_code(404); // Возвращаем ответ 404
	die('404 not found');
}

$content = include_template('lot.php', ['lot' => $lot, 'categories' => $categories, 'is_auth' => $is_auth, 'user_name' => $user_name]);
$layout = include_template('layout.php', ['content' => $content, 'categories' => $categories, 'is_auth' => $is_auth, 'user_name' => $user_name]);

print $layout;