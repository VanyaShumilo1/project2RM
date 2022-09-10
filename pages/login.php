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
    <!-- <link rel="stylesheet" href="../style/mainPage.css"> -->
    <title>Login</title>
</head>

<body>

    <section class="main">


        <div class="container">
            <h1 class="title">Log in your account</h1>
            <h2 class="subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been the industry.</h2>

            <form enctype="multipart/form-data" class="form" novalidate>
                <div class="inputs">
                    <input id="username" name="username" class="input input-email" type="text" placeholder="Login*" value="<?php echo $login ?>">
                    <input id="password" name="password" class="input input-password" id="password" type="password" placeholder="Password*" value="<?php echo $password ?>">
                </div>
                <div class="errors"></div>
                <button id="logButton" name="logButton" type="submit" class="button">Confirm</button>
            </form>

            <div class="line"></div>

            <div class="main__text">
                Have not account? <a class="link" href="<?php echo $path['register']; ?>">Create it!
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9H15" stroke="#4B72C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.75 3.75L15 9L9.75 14.25" stroke="#4B72C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>

    </section>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>
</body>

</html>