function renderPost(userphoto, username, postText, time, id, photos) {

    let photosHTML = ``;

    photos.forEach(photo => {
        photosHTML += `<div class="swiper-slide"><img src="media/postsImages/${photo}" alt=""></div>`
    });

    console.log(photosHTML)

    html = `
    
    <div class="post" data-id=${id}>
        <button class="delete__post" data-id=${id}>X</button>
        <div class="post__header">
            <div class="post__userPhoto"><img src="media/${userphoto}" alt="${userphoto}"></div>
            <div class="post__username">${username}</div>
        </div>
        <div class="post__body">




        <div class="post__photo">
            <div class="swiper">
                <div class="swiper-wrapper">
                    ${photosHTML}
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>


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
        url: 'scripts/userData.php',
        success: function (data) {
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

                $.ajax({
                    url: '/scripts/addPost/getAllPosts.php',
                    cache: false,
                    success: function (data) {
                        for (i in data) {
                            let post = data[i]
                            let photos = post.photos.split(',')
                            $('.feed__wrapper').append(
                                renderPost(post.user_photo, post.username, post.text, post.time, post.id, photos)
                            )
                            feedWrapper = document.querySelector('.feed__wrapper')
                            feedWrapper.scrollTop = feedWrapper.scrollHeight

                        }
                    }
                }).done(function (data) {

                    $.ajax({
                        url: '/scripts/userData.php',
                        success: function (data) {
                            if (data.status == 'admin') {
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


            }
        }
    })
})