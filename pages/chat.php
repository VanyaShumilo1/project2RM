<?php

require '../scripts/db.php';
require '../scripts/paths.php'

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
    <link rel="stylesheet" href="../libs/_bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/mainPage.css">
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/chat.css">
    <title>Chat</title>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="haeder__item">
                    <ul class="header__list">
                        <li class="header__list-item"><a href="<?php echo $path['index'] ?>">Home</a></li>
                        <li class="header__list-item"><a href="#">Contact</a></li>
                        <li class="header__list-item"><a href="#">About us</a></li>
                        <?php
                        if (isset($_SESSION['logged user'])) {
                            $pathChat = $path['chat'];
                            echo <<< HTML
                             <li class="header__list-item"><a href="$pathChat">Chat</a></li>
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
                                    <a class="link header__username" href="' . $path['dashboard'] . '">' . $username . '</a>
                                    <a class="link" href="../scripts/handlerLogout.php">Log out</a>
                                </div>
                                ';
                    } else {
                        echo '<div class="header__links">
                                     <a href="' . $path['login'] . '">Log in</a> / <a href="' . $path['register'] . '">Sign In</a>
                                 </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </header>


    <section class="chat">
        <div class="container">
            <h1 class="title">
                Chat
            </h1>
            <div class="chat__wrapper">

                <div class="chat__messages">
                    
                </div>


                <div class="chat__triggers">
                    <?php
                    if (isset($_SESSION['logged user'])) {
                        echo <<<HTML
                            <input type="text" name="message" class="chat__input" placeholder="message">
                            <button class="chat__button-send">Send</button>
HTML;
                    } else {
                        echo <<<HTML
                            <div class="error">You must be logged in to write a message</div>
HTML;
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/chat.js"></script>

</body>

</html>