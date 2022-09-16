<?php

require '../db.php';


$text = $_POST['postText'];
$postTime = date("d.m.Y H:i");

$id = $_SESSION['logged user']->id;
$user = R::findOne('users', 'id = ?', array($id));

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
    $posts->photos = $_POST[''];
    R::store($posts);
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($posts);

// var_dump($_POST);
