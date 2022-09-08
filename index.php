<?php

require 'scripts/db.php';
require 'scripts/paths.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="libs/_bootstrap-reboot.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/mainPage.css">
    <title>MAIN</title>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="haeder__item">
                    <ul class="header__list">
                        <li class="header__list-item"><a href="index.php">Home</a></li>
                        <li class="header__list-item"><a href="#">Contact</a></li>
                        <li class="header__list-item"><a href="#">About us</a></li>
                        <?php
                        if (isset($_SESSION['logged user'])) {
                            echo <<< HTML
                             <li class="header__list-item"><a href="chat.php">Chat</a></li>
HTML;
                        }
                        ?>
                        
                    </ul>
                </div>
                <div class="header__item">

                    <?php

                    if (isset($_SESSION['logged user'])) {
                        $username = $_SESSION['logged user']->username;
                        echo '
                                <div class="header__links">
                                    <a class="link header__username" href="pages/dashboard.php">' . $username . '</a>
                                    <a class="link" href="scripts/handlerLogout.php">Log out</a>
                                </div>
                                ';
                    } else {
                        echo '<div class="header__links">
                                     <a href="pages/login.php">Log in</a> / <a href="pages/register.php">Sign In</a>
                                 </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </header>

</body>

</html>