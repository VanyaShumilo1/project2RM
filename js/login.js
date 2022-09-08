$('#logButton').on('click', function (e) {
    e.preventDefault()
    const username = $('#username').val().trim()
    const password = $('#password').val()

    $.ajax({
        url: '../scripts/handlerLogin.php',
        type: 'POST',
        data: {
            'username': username,
            'password': password
        },
        success: function (data) {
            if (data == 'loginSuccess') {
                window.location = '../index.php'
            } else if (data == 'userNotFound') {
                $('.errors').text('User not found')
            } else if (data == 'wrongPassword') {
                $('.errors').text('Wrong password')
            }
        }
    })
})