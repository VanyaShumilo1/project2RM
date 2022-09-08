<?php

require '../scripts/db.php';
require '../scripts/paths.php';

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
    <title>Register</title>
</head>

<body>

    <section class="main">


        <div class="container">
            <h1 class="title">Set up your account</h1>
            <h2 class="subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been the industry.</h2>

            <form enctype="multipart/form-data" class="form" novalidate>
                <div class="inputs">
                    <input name="username" id="username" class="input" type="text" placeholder="Username*" value="<?php echo $_POST['login'] ?>">
                    <input name="phone" id="phone" class="input input-phone" type="tel" placeholder="Mobile number*" value="<?php echo $_POST['phone'] ?>">
                    <input name="email" id="email" class="input input-email" type="email" placeholder="Email*" value="<?php echo $_POST['email'] ?>">
                    <input name="password" id="password" class="input input-password" id="password" type="password" placeholder="Password*" value="<?php echo $_POST['password'] ?>">
                    <input name="confirmPassword" id="confirmPassword" class="input input-confirmPassword" id="confirm_password" type="password" placeholder="Confirm password*" value="<?php echo $_POST['confirmPassword'] ?>">
                    <div class="confirm">
                        <input id="checkbox" type="checkbox" class="checkbox" id="checkbox" name="checkbox">
                        <label class="label1" for="checkbox">Privacy policy</label>
                    </div>
                </div>

                <div class="errors"></div>

                <button id="regButton" name="regButton" type="button" class="button">Confirm</button>
            </form>

            <div class="line"></div>

            <div class="main__text">
                Already have an account? <a class="link" href="<?php echo $path['login'] ?>">Log in
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9H15" stroke="#4B72C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.75 3.75L15 9L9.75 14.25" stroke="#4B72C2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>

    </section>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/register.js"></script>
</body>

</html>