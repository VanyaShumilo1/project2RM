function renderImages(images) {

}

function renderPost(userphoto, username, postText, time) {
    html = `
    
    <div class="post">
        <div class="post__header">
            <div class="post__userPhoto"><img src="${userphoto}" alt="${userphoto}"></div>
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
    $('.addPostForm').on('submit', function (e) {
        e.preventDefault()

        $.ajax({
            url: '../scripts/addPost/addPostHandler.php',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                console.log('success')
                let photos = data.photos.split(',')
                console.log(photos)
                console.log(data)
            }
        })


    })
})