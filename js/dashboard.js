function render(id, status, username, phone, email, photo) {
    return `
    
    <div class="row">
        <div class="column">ID</div>
        <div class="column column-id">${id}</div>
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
        <img class="column-img" src="../media/${photo}" alt="${photo}">
        <button type="button" class="column changeButton changePhotoButton">Change</button>
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

    // render dashboard
    $.ajax({
        url: '../scripts/userData.php', //get user data from DB
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

        $('.changePhotoButton').on('click', function () {
            $('.popup__changePhoto').css('display', 'block')
            $('.popup__changePhoto').css('top', '0')
        })

        $('.popup__close').on('click', function () {
            $('.popup').css('top', '-200%')
        })
    })


    // Change phone number
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


    //Change photo

    const photoPreviewNode = document.querySelector('.popup__photoPreview')
    const inputPhoto = document.querySelector('.popup__input-AddPhoto')


    function renderImg(file) {
        let reader = new FileReader();
        reader.onload = function (e) {
            photoPreviewNode.innerHTML = `<img src="${e.target.result}" alt="photo">`
        }
        reader.onerror = function (e) {
            alert('error')
        }
        reader.readAsDataURL(file.files[0])
    }


    function validateImage(file) {
        const errorsNode = $('.errors')
        if (!['image/png', 'image/jpg', 'image/jpeg'].includes(file.type)) {
            console.log(file.type + " - type")
            console.log('only images')
            errorsNode.text('Only images (jpg/jpeg or png)')
            return false
        } else if (file.size > 2 * 1024 * 1024) {
            console.log('max photo size 2 mb')
            errorsNode.text('Max photo size 2 mb')
            return false
        } else {
            errorsNode.text('')
            console.log('valid')
            return true
        }
    }


    inputPhoto.addEventListener('change', () => {
        if (validateImage(inputPhoto.files[0])) {
            renderImg(inputPhoto)
        }
    })


    $('.changePhotoForm').on('submit', function (e) {
        e.preventDefault()
        if (validateImage(inputPhoto.files[0])) {

            $.ajax({
                url: '../scripts/dashboard/handlerChangePhoto.php',
                method: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.popup__changePhoto').css('top', '-200%')
                    $('.column-img').attr('src', `../media/${inputPhoto.files[0].name}`)
                }
            })
        }
    })

})


