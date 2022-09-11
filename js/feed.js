$(document).ready(function(){
    $.ajax({
        url: 'scripts/userData.php',
        success: function(data) {
            if (data == 'userNotFound') {
                const html = `
                <div class="sign">
                    <div class="sign__text">You must be logged in to watch post</div>
                    <div class="sign__links">
                        <a class="sign__link" href="pages/login.php">Log in</a>
                        <a class="sign__link" href="pages/register.php">Registration</a>
                    </div>
                </div>
                `
                $('.feed__wrapper').html(html)
            } else {
                
            }
        }
    })
})