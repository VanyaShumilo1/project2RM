<?php

require '../db.php';

$newEmail = $_POST['newEmail'];

if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = '<div class="error">invalid email</div>';
}

if (empty($errors)) {
    $id = $_SESSION['logged user']->id;
    $user = R::findOne('users', 'id = ?', array($id));

    if ($user) {
        $user->email = $newEmail;
        $_SESSION['logged user'] = $user;
        R::store($user);
        echo 'success';
    }
}