<?php
$is_auth = rand(0, 1);

$user_name = 'Дмитрий Золотов'; // укажите здесь ваше имя

$con = mysqli_connect ("localhost", "root", "", "yeticave");


if ($con == false) {
	print("Ошибка подключения: " . mysqli_connect_error());
}
else { 
print("Соединение установлено");
}


$categoriesSql = 'select * from categories';
$categoriesResult = mysqli_query($con, $categoriesSql);
if ($categoriesResult) {
$categories = mysqli_fetch_all($categoriesResult, MYSQLI_ASSOC);
} else {
$categories = []; // Пустой массив
}

$advertsSql = "SELECT items.name, categories.name AS category_name, items.initial_price, items.picture FROM items 
JOIN categories ON items.categories_id = categories.id";


$advertsResult = mysqli_query($con, $advertsSql);
if ($advertsResult) {
$adverts = mysqli_fetch_all($advertsResult, MYSQLI_ASSOC);
} else {
$adverts = []; // Пустой массив
}
		
/* $adverts = [
		
		[
			'name' => '2014 Rossignol District Snowboard',
			'category' => 'Доски и лыжи',
			'price' => '10999',
			'url' => 'img/lot-1.jpg'
		],
				
		[
			'name' => 'DC Ply Mens 2016/2017 Snowboard',
			'category' => 'Доски и лыжи',
			'price' => '159999',
			'url' => 'img/lot-2.jpg'
		],
				
		[
			'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
			'category' => 'Крепления',
			'price' => '8000',
			'url' => 'img/lot-3.jpg'
		],
			
		[
			'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
			'category' => 'Ботинки',
			'price' => '10999',
			'url' => 'img/lot-4.jpg'
		],
				
		[
			'name' => 'Куртка для сноуборда DC Mutiny Charocal',
			'category' => 'Одежда',
			'price' => '7500',
			'url' => 'img/lot-5.jpg'
		],
				
		[
			'name' => 'Маска Oakley Canopy',
			'category' => 'Разное',
			'price' => '5400',
			'url' => 'img/lot-6.jpg'
		]
			
			];
*/
?>


<?php 
date_default_timezone_set("Europe/Helsinki");
$ts_midnight = strtotime("tomorrow");
$sec_to_midnight = $ts_midnight - time();
$hm_tomidnight = date('H:i', $sec_to_midnight);
?>

<?php

require("functions.php");

$content = include_template('index.php', ['categories' => $categories, 'adverts' => $adverts, 'hm_tomidnight' => $hm_tomidnight]);
$layout = include_template('layout.php', ['content' => $content, 'categories' => $categories, 'is_auth' => $is_auth, 'user_name' => $user_name, 'sql' => $categoriesSql, 'categoriesResult' => $categoriesResult, 'con' => $con]);
print $layout;
?>
