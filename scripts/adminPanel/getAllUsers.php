<?php

require '../db.php';

$users = R::findAll('users', 'ORDER BY `id`');
header('Content-Type: application/json; charset=utf-8');
echo json_encode($users);