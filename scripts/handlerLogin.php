<?php

require 'db.php';


$username = trim($_POST['username']);
$password = trim($_POST['password']);


if (isset($_POST)) {
    $errors = [];
    $user = R::findOne('users', 'username = ?', array($username));
    if ($user) {
        if (password_verify($password, $user->password)) {
            $_SESSION['logged user'] = $user;
            echo 'loginSuccess';
        } else {
            $errors['wrongPassword'] = '<div class="error">wrong password</div>';
            echo 'wrongPassword';
        }
    } else {
        $errors['userNotFound'] = '<div class="error">user not found</div>';
        echo 'userNotFound';
    }
}