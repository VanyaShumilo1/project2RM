<?php

require '../db.php';

$images = $_FILES['images'];
$normalizeImages = [];

foreach ($images as $key_name => $value) {
    foreach ($value as $key => $item) {
        $normalizeImages[$key][$key_name] = $item;
    }
}

header('Content-Type: application/json; charset=utf-8');
// echo json_encode($normalizeImages);

$names = [];

foreach ($normalizeImages as $key => $value) {
    array_push($names, $value['name']);
}

$names = implode(',', $names);
$posts = R::dispense('posts');
$posts->photos = $names;
R::store($posts);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($names);

