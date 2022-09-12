<?php

require '../db.php';

function savePhoto($photo)
{
    $fileName = time() . $photo['name'];
    $fileTmp = $photo['tmp_name'];

    $uploadFolder = '../../media/';

    $moveFile = move_uploaded_file($fileTmp, $uploadFolder . $fileName);

    if ($moveFile) {
        echo 'photo uploaded successful';
    }

    $user = R::findOne('users', 'id = ?', array($_SESSION['logged user']->id));
    if ($user) {
        $user->photo = $fileName;
        $_SESSION['logged user'] = $user;
        R::store($user);
    }
}


function validateImgType($photo)
{
    if ($photo['type'] == 'image/jpeg') {
        return true;
    } else if ($photo['type'] == 'image/jpg') {
        return true;
    } else if ($photo['type'] == 'image/png') {
        return true;
    } else {
        return false;
    }
}

$photo = $_FILES['addPhoto'];
$id = $_SESSION['logged user']->id;
$user = R::findOne('users', 'id = ?', array($id));

if (validateImgType($photo)) {
    savePhoto($photo);
}
