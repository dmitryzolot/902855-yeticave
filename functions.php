<?php
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

?>

<?php
function getLotByID($con, $lot_id) {
	$LotIDSql = 'select items.name, items.picture, categories.name AS category_name, items.description, items.initial_price from items
JOIN categories ON items.categories_id = categories.id where items.id = "$lot_id"';
	$con = mysqli_connect ("localhost", "root", "", "yeticave");
	$lotResult = mysqli_query($con, $LotIDSql);
	if ($lotResult) {
		$lot = mysqli_fetch_all($lotResult, MYSQLI_ASSOC);
	} else {
	$lot = [];
	}
	return $lot;
}

?>