function renderUsers(id, status, username, phone, email) {
    const allUsersNode = $('.allUsers')
    let html = `
    
    <div class="dashboard__wrappepr" data-id=${id}>
        <div class="row">
            <div class="column">ID</div>
            <div class="column column-id">${id}</div>
            <div class="column">
                <button class="removeUserButton" data-id=${id}>X</button>
            </div>
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
        </div>
        <div class="row">
            <div class="column">Email</div>
            <div class="column columnEmail">${email}</div>
        </div>
    </div>
    
    `
    allUsersNode.append(html)
}


$(document).ready(function () {

    //render users
    $.ajax({
        url: '../scripts/adminPanel/getAllUsers.php',
        success: function (data) {
            for (i in data) {
                let user = data[i]
                renderUsers(user['id'], user['status'], user['username'], user['phone'], user['email'])
            }
        }
    }).done(function (e) {
        $('.removeUserButton').on('click', function (e) {
            let id = this.dataset.id
            $.ajax({
                url: '../scripts/adminPanel/removeUser.php',
                data: { 'id': id },
                type: 'POST',
                success: function (data) {
                    if (data == 'success') {
                        let element = $(`.dashboard__wrappepr[data-id=${id}]`).remove()
                    } else {
                        alert(data)
                    }
                }
            })

        })
    })
})