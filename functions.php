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

function getConnection()
{
    return mysqli_connect ("localhost", "root", "", "yeticave");
}

function getCategories($con) {
    $query = 'SELECT * FROM categories';
    $result = mysqli_query($con, $query);
    $categories = [];
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $categories;
}

function getLots($con) {
    $query = 'SELECT items.id, items.name, categories.name AS category_name, items.initial_price, items.picture FROM items 
JOIN categories ON items.categories_id = categories.id';
    $result = mysqli_query($con, $query);
    $lots = [];
    if ($result) {
        $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $lots;
}

function getLotByID($con, $lot_id) {
    $lot_id = mysqli_real_escape_string($con, $lot_id);
    $query = 'SELECT * FROM items WHERE id = "$lot_id"';
    $result = mysqli_query($con, $query);
    $lot = [];
    if ($result) {
        $lot = mysqli_fetch_assoc($result);
    }
    return $lot;
}