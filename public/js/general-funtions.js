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

        default:
            console.log("internal server 500");
            break;
    }
}

function printErrorMsg(msg) {
    let info = "";
    $.each(msg, function(key, value) {
        info = info + '<li>' + value + '</li>';
    });
    toastr.error(info);
}