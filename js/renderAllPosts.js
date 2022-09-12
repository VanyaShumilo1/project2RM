function renderPost(userphoto, username, postText, time) {
    html = `
    
    <div class="post">
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
                    renderPost(post.user_photo, post.username, post.text, post.time)
                )
                feedWrapper = document.querySelector('.feed__wrapper')
                feedWrapper.scrollTop = feedWrapper.scrollHeight
                
            }
            console.log(data)
        }
    })
})