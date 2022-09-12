function renderPost(userphoto, username, postText, time, id) {
    html = `
    
    <div class="post" data-id=${id}>
        <button class="delete__post" data-id=${id}>X</button>
        <div class="post__header">
            <div class="post__userPhoto"><img src="media/${userphoto}" alt="${userphoto}"></div>
            <div class="post__username">${username}</div>
        </div>
        <div class="post__body">
            <div class="post__text">${postText}</div>
        </div>
        <div class="post__footer">
            <div class="post__time">${time}</div>
        </div>
    </div>
    
    `
    return html
}

$(document).ready(function () {

    $.ajax({
        url: '/scripts/addPost/getAllPosts.php',
        cache: false,
        success: function (data) {
            for (i in data) {
                post = data[i]
                $('.feed__wrapper').append(
                    renderPost(post.user_photo, post.username, post.text, post.time, post.id)
                )
                feedWrapper = document.querySelector('.feed__wrapper')
                feedWrapper.scrollTop = feedWrapper.scrollHeight

            }
        }
    }).done(function (data) {

        $.ajax({
            url: '/scripts/userData.php',
            success: function (data) {
                if (data.status == 'admin'){
                    $('.delete__post').css('display', 'block')
                } else {
                    $('.delete__post').css('display', 'none') 
                }
            }
        })



        $('.delete__post').on('click', function () {
            let id = this.dataset.id
            $.ajax({
                url: '/scripts/addPost/removePost.php',
                data: { 'id': id },
                method: 'POST',
                success: function (data) {
                    if (data == 'success') {
                        $(`.post[data-id=${id}]`).remove()
                    } else {
                        alert(data)
                    }
                }
            })
        })
    })




})