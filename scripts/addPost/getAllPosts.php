<?php

require '../db.php';

$posts = R::findAll('posts', 'ORDER BY `id`');
header('Content-Type: application/json; charset=utf-8');
echo json_encode($posts);
