<?php 

require 'rb.php';

R::setup( 'mysql:host=localhost;dbname=project2RM',
        'root', 'root' );

session_start();