<?php

require 'db.php';

$id = $_SESSION['logged user']['id'];

$user = R::findOne('users', 'id = ?', array($id));

if ($user) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($user);
} else {
    echo 'userNotFound';
}
