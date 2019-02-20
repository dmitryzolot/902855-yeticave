<?php

require 'init.php';
require 'functions.php';

$con = getConnection();
if ($con == false) {
	print("Ошибка подключения: " . mysqli_connect_error());
}

$categories = getCategories($con);

$lots = getLots($con);

$content = include_template('index.php', ['categories' => $categories, 'lots' => $lots, 'hm_tomidnight' => $hm_tomidnight]);
$layout = include_template('layout.php', ['content' => $content, 'categories' => $categories, 'is_auth' => $is_auth, 'user_name' => $user_name]);

print $layout;