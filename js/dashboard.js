function render(id, status, username, phone, email, photo) {
    return `
    
    <div class="row">
        <div class="column">ID</div>
        <div class="column">${id}</div>
    </div>
    <div class="row">
        <div class="column">Status</div>
        <div class="column">${status}</div>
    </div>
    <div class="row">
        <div class="column">Username</div>
        <div class="column">${username}</div>
    </div>
    <div class="row">
        <div class="column">Phone</div>
        <div class="column columnPhone">${phone}</div>
        <button type="button" class="column changeButton changePhoneButton">Change</button>
    </div>
    <div class="row">
        <div class="column">Email</div>
        <div class="column columnEmail">${email}</div>
        <button type="button" class="column changeButton changeEmailButton">Change</button>
    </div>
    <div class="row">
        <div class="column">Photo</div>
        <div class="column">${photo}</div>
    </div>
    <div class="row">
        <div class="column">Password</div>
        <div class="column">********</div>
        <button type="button" class="column changeButton changePasswordButton">Change</button>
    </div>

    `
}


function validatePhone(phone) {
    const phoneREGEX = /^[\d\+][\d\(\)\ -]{4,14}\d$/
    const errorsNode = $('.errors')

    if (!phoneREGEX.test(phone)) {
        errorsNode.text('Invalid phone number')
        return false
    } else {
        errorsNode.text('')
        return true
    }
}


function validateEmail(email) {
    const emailREGEX = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i
    const errorsNode = $('.errors')

    if (!emailREGEX.test(email)) {
        errorsNode.text('Invalid email')
        return false
    } else {
        errorsNode.text('')
        return true
    }
}


function validatePassword(password, confirmPassword) {
    const errorsNode = $('.errors')

    if (password.length < 8) {
        errorsNode.text('password too easy, password must contain at least 8 symbols')
        return false
    } else if (password != confirmPassword) {
        errorsNode.text('passwords not the same')
        return false
    } else {
        errorsNode.text('')
        return true
    }
}


$(document).ready(function () {

    $.ajax({
        url: '../scripts/userData.php',
        dataType: 'json',
        success: function (data) {
            $('.dashboard__wrappepr').html(render(data.id, data.status, data.username, data.phone, data.email, data.photo))
        }
    }).done(function (data) {

        //popup buttons
        $('.changePhoneButton').on('click', function () {
            $('.popup__changePhone').css('display', 'block')
            $('.popup__changePhone').css('top', '0')
        })

        $('.changeEmailButton').on('click', function () {
            $('.popup__changeEmail').css('display', 'block')
            $('.popup__changeEmail').css('top', '0')
        })

        $('.changePasswordButton').on('click', function () {
            $('.popup__changePassword').css('display', 'block')
            $('.popup__changePassword').css('top', '0')
        })

        $('.popup__close').on('click', function () {
            $('.popup').css('top', '-200%')
        })
    })


    // Change number
    $('.changePhoneSubmit').on('click', function (e) {
        e.preventDefault()
        const phone = $('.popup__input-phone').val();

        if (validatePhone(phone)) {
            console.log('phone valid')
            $.ajax({
                url: '../scripts/dashboard/handlerChangePhone.php',
                type: 'POST',
                cache: false,
                data: { 'newPhone': phone },
                success: function (data) {
                    $('.popup').css('top', '-100%')
                    $('.popup__input-phone').val('')
                    $('.columnPhone').text(phone)
                    alert(`Phone number changed to ${phone}`)
                }
            })
        }
    })


    //Change email
    $('.changeEmailSubmit').on('click', function (e) {
        e.preventDefault()
        const email = $('.popup__input-email').val()

        if (validateEmail(email)) {
            console.log('email valid')
            $.ajax({
                url: '../scripts/dashboard/handlerChangeEmail.php',
                type: 'POST',
                cache: false,
                data: { 'newEmail': email },
                success: function (data) {
                    $('.popup').css('top', '-100%')
                    $('.popup__input-email').val('')
                    $('.columnEmail').text(email)
                    alert(`Email number changed to ${email}`)
                }
            })
        }
    })


    //Change password
    $('.changePasswordSubmit').on('click', function (e) {
        e.preventDefault()
        const oldPassword = $('.popup__input-oldPassword').val()
        const newPassword = $('.popup__input-newPassword').val()
        const confirmNewPassword = $('.popup__input-newConfirmPassword').val()


        if (validatePassword(newPassword, confirmNewPassword)) {
            $.ajax({
                url: '../scripts/dashboard/handlerChangePassword.php',
                type: 'POST',
                cache: false,
                data: {
                    'oldPassword': oldPassword,
                    'newPassword': newPassword,
                    'confirmNewPassword': confirmNewPassword
                },
                success: function (data) {
                    if (data == 'success') {
                        $('.popup').css('top', '-200%')
                        $('.popup__input-oldPassword').val('')
                        $('.popup__input-newPassword').val('')
                        $('.popup__input-newConfirmPassword').val('')
                        alert('Password changed successfuly')
                    } else if (data == 'wrongOldPassword') {
                        $('.errors').text('Wrong old password')
                    }
                }
            })
        }
    })


})


