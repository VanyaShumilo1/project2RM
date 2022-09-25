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
                alert('success')
            }
        })


    })
})