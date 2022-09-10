<?php

require '../db.php';

$id = $_SESSION['logged user']->id;
$messageTime = date("d.m.Y H:i");
$message = $_POST['message'];
$messageTime = date("d.m.Y H:i");
$user = R::findOne('users', 'id = ?', array($id));

if ($user) {
    $username = $user->username;
    $photo = $user->photo;
}

if (isset($message)) {
    $messages = R::dispense('messages');
    $messages->username = $username;
    $messages->photo = $photo;
    $messages->time = $messageTime;
    $messages->message = $message;
    R::store($messages);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($messages);
