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
    <title>Dashboard</title>
</head>

<body>


    <div class="popup popup__changePhone">
        <div class="poput__content">
            <div class="popup__close">X</div>
            <form enctype="multipart/form-data" class="changeFrom changePhoneForm">
                <div class="popup__oldContent popup__oldPhone">Current Phone: <?php echo $_SESSION['logged user']->phone ?></div>
                <label for="popup__input-phone">Change Phone</label>
                <input type="tel" class="popup__input popup__input-phone" id="popup__input-phone">
                <div class="errors"></div>
                <button type="button" class="button changePhoneSubmit">Change</button>
            </form>
        </div>
    </div>

    <div class="popup popup__changeEmail">
        <div class="poput__content">
            <div class="popup__close">X</div>
            <form enctype="multipart/form-data" class="changeEmailForm">
                <div class="popup__oldContent popup__oldEmail">Current Email: <?php echo $_SESSION['logged user']->email ?></div>
                <label for="popup__input-email">Change Email</label>
                <input type="tel" class="popup__input popup__input-email" id="popup__input-email">
                <div class="errors"></div>
                <button type="button" class="button changeEmailSubmit">Change</button>
            </form>
        </div>
    </div>

    <div class="popup popup__changePassword">
        <div class="poput__content">
            <div class="popup__close">X</div>
            <form enctype="multipart/form-data" class="changePasswordForm">

                <label for="popup__input-oldPassword" class="left">Current password</label>
                <input type="password" class="popup__input popup__input-oldPassword" id="popup__input-oldPassword"> 

                <label for="popup__input-newPassword" class="left">New password</label>
                <input type="password" class="popup__input popup__input-newPassword" id="popup__input-newPassword">
                
                <label for="popup__input-newConfirmPassword" class="left">Confirm new password</label>
                <input type="password" class="popup__input popup__input-newConfirmPassword" id="popup__input-newConfirmPassword">
                
                <div class="errors"></div>
                
                <button type="button" class="button changePasswordSubmit">Change</button>
            </form>
        </div>
    </div>


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




    <div class="dashboard">
        <div class="container">
            <div class="dashboard__wrappepr">


            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/dashboard.js"></script>



</body>

</html>