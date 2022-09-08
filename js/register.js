$('#regButton').on('click', function() {

    const username = $('#username').val().trim()
    const phone = $('#phone').val().trim()
    const email = $('#email').val().trim()
    const password = $('#password').val()
    const confirmPassword = $('#confirmPassword').val()
    const regButton = $('#regButton')
    const checkbox = document.querySelector("#checkbox")
    const errorsNode = $('.errors')
    const phoneREGEX = /^[\d\+][\d\(\)\ -]{4,14}\d$/
    const emailREGEX = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i

    if (username == '' || username.lengh < 4) {
        errorsNode.text('Invalid username')
        return false
    } else if (!phoneREGEX.test(phone)) {
        errorsNode.text('Invalid phone number')
        return false
    } else if (!emailREGEX.test(email)) {
        errorsNode.text('Invalid email')
        return false
    } else if (password.length < 8) {
        errorsNode.text('password too easy, password must contain at least 8 symbols')
        return false
    } else if (password != confirmPassword) {
        errorsNode.text('passwords not the same')
        return false
    } else if (!(checkbox.checked)) {
        errorsNode.text('checkbox must be chacked')
        return false
    }

    errorsNode.text('')

    $.ajax({
        url: '../scripts/handlerRegister.php',
        type: 'POST',
        cache: false,
        data: {
            'username': username,
            'phone': phone,
            'email': email,
            'password': password,
            'confirmPassword': confirmPassword,
            'checkbox': checkbox.checked
        },
        beforeSend: function() {
            regButton.prop('disabled', true)
        },
        success: function (data) {
            if (data == 'startSession') {
                console.log(123)
                window.location = '../index.php'
            }
        }
    })
})