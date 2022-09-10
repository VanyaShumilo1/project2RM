<?php

require '../db.php';

$messages = R::findAll('messages', 'ORDER BY `id`');
header('Content-Type: application/json; charset=utf-8');
echo json_encode($messages);









// $id = $_SESSION['logged user']->id;
// $user = R::dispense('users');
// $user = R::findOne('users', 'id = ?', array($id));
// if ($user) {
//     $photo = $user['photo'];
// }
// $message = $_POST['message'];
// $login = $_SESSION['logged user']->login;
// $messageTime = date("d.m.Y H:i");

// if (isset($message)) {
//     $messages = R::dispense('messages');  // connect/create table users
//     $messages->user = $login;
//     $messages->photo = $photo;
//     $messages->message = $message;
//     $messages->time = $messageTime;
//     R::store($messages);
// }
// header('Content-Type: application/json; charset=utf-8');
// echo json_encode($messages);