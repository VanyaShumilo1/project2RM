<?php

require '../db.php';

$userID = $_POST['id'];

if (isset($userID)) {
    $user = R::findOne('users', 'id = ?', array($userID));
    if ($user) {
        R::trash($user);
        echo 'success';
    }
}