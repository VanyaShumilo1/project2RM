function renderMessages(username, message, messageTime, photo) {
    return `
    
    <div class="message">
        <div class="message__header">
            <div class="message__photo"><img src="../../media/${photo}" alt=${photo}></div>
            <div class="message__username">${username}</div>
        </div>
        <div class="message__content">
            <div class="message__text">${message}</div>
            <div class="message__time">${messageTime}</div>
        </div>
    </div>
    
    `
}


function sendMessage() {
    let message = $('.chat__input').val()
    if (message != '' && message != ' ') {
        $.ajax({
            url: '../scripts/chat/sendMessage.php',
            type: 'POST',
            data: { 'message': message },
            success: function (message) {
                $('.chat__messages').append(renderMessages(message['user'], message['message'], message['time'], message['photo']))
                $('.chat__input').val('')
                element = $('.chat__messages')
                element.animate({
                    scrollTop: element.prop("scrollHeight")
                }, 400)
            }
        })
    }

}

$(document).ready(function () {

    //render all messages
    $.ajax({
        url: '../scripts/chat/getAllMessages.php',
        success: function (data) {
            for (i in data) {
                // console.log(message)
                message = data[i]
                $('.chat__messages').append(renderMessages(message['user'], message['message'], message['time'], message['photo']))
                chatMessages = document.querySelector('.chat__messages')
                chatMessages.scrollTop = chatMessages.scrollHeight
            }
        }
    })



    //send message
    $('.chat__button-send').on('click', function (e) {
        e.preventDefault()
        sendMessage()
    })

    $(document).on('keydown', function (e) {
        if (e.which == 13) {
            sendMessage()
        }
    })

})