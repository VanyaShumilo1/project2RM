<?php

require '../db.php';


function checkUser ($id) {
    $user = R::findOne('users', 'id = ?', array($id));

    if ($id == $_SESSION['logged user']->id) {
        echo 'you can not delete yourself';
        return false;
    } else if ($user->status == 'admin') {
        echo 'you can not delete admin';
        return false;
    } else {
        return true;
    }
}


$userID = $_POST['id'];

if (isset($userID)) {
    $user = R::findOne('users', 'id = ?', array($userID));
    if ($user && checkUser($userID)) {
        R::trash($user);
        echo 'success';
    }
}