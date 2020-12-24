function notifications(msg, statusCode) {
    switch (statusCode) {
        case 200:
            toastr.success(msg);
            break;

        case 201:
            toastr.success(msg);
            break;

        case 400:
            toastr.error(msg);
            break;
        case 402:
            toastr.error(msg);
            localStorage.clear();
            location.href = '/';
            break;
        default:
            console.log("internal server 500");
            break;
    }
}

$('#navbarDropdown').text(localStorage.getItem('user'));

if (!localStorage.getItem('user')) {
    $('#userName').remove();
}

function printErrorMsg(msg) {
    let info = "";
    $.each(msg, function(key, value) {
        info = info + '<li>' + value + '</li>';
    });
    toastr.error(info);
}

function logout() {
    $.ajax({
        method: 'GET',
        url: 'logout',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
        },
        success: function() {
            localStorage.clear();
            location.href = '/';
        }
    })
}