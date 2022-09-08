<?php

require 'db.php';


$username = trim($_POST['username']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$checkbox = $_POST['checkbox'];


$phonePattern = "/^[0-9]{10,12}+$/";

if (isset($_POST)) {
    $errors = [];

    if ($username == '' || strlen($username) < 4) {
        $errors['username'] = '<div class="error">invalid username</div>';
    }
    if (!preg_match($phonePattern, $phone)) {
        $errors['phone'] = '<div class="error">invalid phone</div>';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = '<div class="error">invalid email</div>';
    }
    if (strlen($password) < 8) {
        $errors['password'] = '<div class="error">invalid password</div>';
    }
    if ($password != $confirmPassword) {
        $errors['confirmPassword'] = '<div class="error">invalid confirmPassword</div>';
    }
    if (!isset($checkbox)) {
        $errors['checkbox'] = '<div class="error">checkbox must be checked</div>';
    }
    if (R::count('users', 'username = ?', array($username)) > 0) {
        $errors['user exist'] = '<div class="error">user with your username already exist</div>';
    }
    if (R::count('users', 'email = ?', array($email)) > 0) {
        $errors['user exist'] = '<div class="error">user with your email already exist</div>';
    }

    if (empty($errors)) {
        $user = R::dispense('users');  // connect/create table users
        $user->username = $username;
        $user->phone = $phone;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->status = 'user';
        $user->photo = 'default.png';
        R::store($user);              // save table
        $_SESSION['logged user'] = $user;
        echo 'startSession';
    } else {
        echo 123;
    }
}
