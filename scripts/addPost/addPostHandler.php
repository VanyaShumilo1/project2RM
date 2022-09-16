<?php

require '../db.php';

$images = $_FILES['images'];
$normalizeImages = [];

foreach ($images as $key_name => $value) {
    foreach ($value as $key => $item) {
        $normalizeImages[$key][$key_name] = $item;
    }
}

$text = $_POST['postText'];
$postTime = date("d.m.Y H:i");

$id = $_SESSION['logged user']->id;
$user = R::findOne('users', 'id = ?', array($id));

$photoNames = [];

foreach ($normalizeImages as $key => $value) {
    array_push($photoNames, $value['name']);
}

$photoNames = implode(',', $photoNames);

if ($user) {
    $username = $user->username;
    $userPhoto = $user->photo;
    $userStatus = $user->status;
}

if (isset($text) && $userStatus == 'admin') {
    $posts = R::dispense('posts');
    $posts->time = $postTime;
    $posts->username = $username;
    $posts->userPhoto = $userPhoto;
    $posts->text = $text;
    $posts->photos = $photoNames;
    R::store($posts);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($posts);
