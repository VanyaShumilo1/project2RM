<?php

require '../db.php';


function validate_password($pass1, $pass2) {
    if ($pass1 == $pass2) {
        if (strlen($pass1) >= 8) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


$id = $_SESSION['logged user']->id;
$oldPasswordFromUser = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];

$user = R::findOne('users', 'id = ?', array($id));
$oldPassword = $user->password;

if ($user) {
    if (password_verify($oldPasswordFromUser, $oldPassword)) {
        if (validate_password($newPassword, $confirmNewPassword)) {
            $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
            $_SESSION['logged user'] = $user;
            R::store($user);
            echo 'success';
        } else {
            echo 'passwordsNotTheSame';
        }
    } else {
        echo 'wrongOldPassword';
    }
}
