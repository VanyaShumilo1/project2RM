<?php

require '../db.php';

$postId = $_POST['id'];
$userId = $_SESSION['logged user']->id;

$user = R::findOne('users', 'id = ?', array($userId));
$post = R::findOne('posts', 'id = ?', array($postId));

if ($user->status == 'admin') {
    if ($post) {
        R::trash($post);
        echo 'success';
    }
} else {
    echo 'you are not admin';
}
