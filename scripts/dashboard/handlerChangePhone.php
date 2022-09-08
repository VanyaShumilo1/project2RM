<?php

require '../db.php';

$newPhone = $_POST['newPhone'];

$phonePattern = "/^[0-9]{10,12}+$/";
if (!preg_match($phonePattern, $newPhone)) {
    $errors['phone'] = '<div class="error">invalid phone</div>';
}

if (empty($errors)) {
    $id = $_SESSION['logged user']->id;
    $user = R::findOne('users', 'id = ?', array($id));

    if ($user) {
        $user->phone = $newPhone;
        $_SESSION['logged user'] = $user;
        R::store($user);
        echo 'success';
    }
}
