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
    <link rel="stylesheet" href="../style/addPost.css">

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

                        <?php
                        if ($_SESSION['logged user']->status == 'admin') {
                            $pathAdmin = $path['adminPanel'];
                            echo <<< HTML
                             <li class="header__list-item"><a href="$pathAdmin">USERS</a></li>
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

    <div class="addPost">
        <div class="container">
            <form class="addPostForm" enctype="multipart/form-data">
                <label class="label selectImages" for="postImages">Select images</label>
                <input name="images[]" type="file" id="postImages" class="postImagesInput" multiple>
                <label class="label" for="postText">Write a post</label>
                <textarea name="postText" class="postText" id="postText"></textarea>
                <button type="submit" class="button addPostButton">Public</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/addPost.js"></script>

</body>

</html>