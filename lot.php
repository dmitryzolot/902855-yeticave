<?php

require("functions.php");
$content = include_template('lot.php', ['lot' => $lot, 'categories' => $categories, 'adverts' => $adverts, 'is_auth' => $is_auth, 'user_name' => $user_name, 'sql' => $categoriesSql, 'categoriesResult' => $categoriesResult, 'con' => $con]);
$layout = include_template('layout.php', ['content' => $content, 'categories' => $categories, 'is_auth' => $is_auth, 'user_name' => $user_name, 'sql' => $categoriesSql, 'categoriesResult' => $categoriesResult, 'con' => $con]);
$lot_id = (int) $_GET['id'];
$lot = getLotByID($con, $lot_id); // Получаем лот из базы данных по его id
print $layout;
?>