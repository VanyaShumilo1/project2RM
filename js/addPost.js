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


        let postImages = ''
        let postText = []

        // post images
        // $.ajax({
        //     url: '../scripts/addPost/getPostImages.php',
        //     method: 'POST',
        //     data: new FormData(this),
        //     processData: false,
        //     contentType: false,
        //     cache: false,
        //     success: function (data) {
        //         for (i in data) {
        //             let postImage = data[i];
        //             postImages += postImage
        //         }
        //     }
        // })


        // post text
        $.ajax({
            url: '../scripts/addPost/addPost.php',
            method: 'POST',
            data: { 'postText': $('.postText').val() },
            cache: false,
            success: function (data) {
                console.log(data.user_photo, data.username, data.text, data.time)
                alert('created!')
            }
        })

    })
})