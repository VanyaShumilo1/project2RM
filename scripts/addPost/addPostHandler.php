<?php

require '../db.php';

function savePhotos($photos)
{
    $photosNames = [];
    foreach ($photos as $photo) {
        $fileName = time() . rand() . $photo['name'];
        array_push($photosNames, $fileName);
        $fileTmp = $photo['tmp_name'];
        // var_dump($photo);

        $uploadFolder = $_SERVER['DOCUMENT_ROOT'].'/media/postsImages/';

        $moveFile = move_uploaded_file($fileTmp, $uploadFolder . $fileName);

        // if ($moveFile) {
        //     echo 'photo upload successful';            
        // } else {
        //     echo 'error';
        // }
    }
    return $photosNames;
}



$images = $_FILES['images'];
$normalizeImages = [];



foreach ($images as $key_name => $value) {
    foreach ($value as $key => $item) {
        $normalizeImages[$key][$key_name] = $item;
    }
}

// var_dump($normalizeImages);
// exit;

// $photos = savePhotos($normalizeImages);

$text = $_POST['postText'];
$postTime = date("d.m.Y H:i");

$id = $_SESSION['logged user']->id;
$user = R::findOne('users', 'id = ?', array($id));

$photoNames = savePhotos($normalizeImages);



// foreach ($normalizeImages as $key => $value) {
//     array_push($photoNames, $value['name']);
// }

$photoNames = implode(',', $photoNames);

if ($user) {
    $username = $user->username;
    $userPhoto = $user->photo;
    $userStatus = $user->status;
}


if (isset($text) && $userStatus == 'admin') {
    $posts = R::dispense('posts');
    $posts->time = $postTime;
    $posts->username = $username;
    $posts->userPhoto = $userPhoto;
    $posts->text = $text;
    $posts->photos = $photoNames;
    R::store($posts);
    
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($posts);