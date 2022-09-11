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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


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
                             <li class="header__list-item"><a href="pages/chat.php">Chat</a></li>
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

    <section class="feed">
        <div class="container">
            <h1 class="title">Feed</h1>
            <div class="feed__wrapper">

                <div class="post">
                    <div class="post__header">
                        <div class="post__userPhoto">PHOTO</div>
                        <div class="post__username">USERNAME</div>
                    </div>
                    <div class="post__body">
                        <div class="post__photo"></div>
                        <div class="post__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi ullam similique qui asperiores quasi, dolorem iste possimus eligendi distinctio reiciendis aperiam? Iure itaque quia molestias ipsum rem sed deleniti sequi?</div>
                    </div>
                    <div class="post__footer"></div>
                </div>

                <div class="post">
                    <div class="post__header">
                        <div class="post__userPhoto">PHOTO</div>
                        <div class="post__username">USERNAME</div>
                    </div>
                    <div class="post__body">
                        <div class="post__photo"></div>
                        <div class="post__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi ullam similique qui asperiores quasi, dolorem iste possimus eligendi distinctio reiciendis aperiam? Iure itaque quia molestias ipsum rem sed deleniti sequi?</div>
                    </div>
                    <div class="post__footer"></div>
                </div>

                <div class="post">
                    <div class="post__header">
                        <div class="post__userPhoto">PHOTO</div>
                        <div class="post__username">USERNAME</div>
                    </div>
                    <div class="post__body">
                        <div class="post__photo">
                            <img src="/media/audi.jpg" alt="">
                        </div>
                        <div class="post__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi ullam similique qui asperiores quasi, dolorem iste possimus eligendi distinctio reiciendis aperiam? Iure itaque quia molestias ipsum rem sed deleniti sequi?</div>
                    </div>
                    <div class="post__footer"></div>
                </div>

                <div class="post">
                    <div class="post__header">
                        <div class="post__userPhoto">PHOTO</div>
                        <div class="post__username">USERNAME</div>
                    </div>
                    <div class="post__body">
                        <div class="post__photo">


                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide"><img src="/media/bmw.jpeg" alt=""></div>
                                    <div class="swiper-slide"><img src="/media/bmw.jpeg" alt=""></div>
                                    <div class="swiper-slide"><img src="/media/bmw.jpeg" alt=""></div>

                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>




                        </div>
                        <div class="post__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi ullam similique qui asperiores quasi, dolorem iste possimus eligendi distinctio reiciendis aperiam? Iure itaque quia molestias ipsum rem sed deleniti sequi?</div>
                    </div>
                    <div class="post__footer"></div>
                </div>

                <div class="post">
                    <div class="post__header">
                        <div class="post__userPhoto">PHOTO</div>
                        <div class="post__username">USERNAME</div>
                    </div>
                    <div class="post__body">
                        <div class="post__photo"></div>
                        <div class="post__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi ullam similique qui asperiores quasi, dolorem iste possimus eligendi distinctio reiciendis aperiam? Iure itaque quia molestias ipsum rem sed deleniti sequi?</div>
                    </div>
                    <div class="post__footer"></div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="/js/feed.js"></script>
    <script src="js/slider.js"></script>
</body>

</html>