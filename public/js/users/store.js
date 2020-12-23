$(".addUser").click(function() {
    var name = $("#name").val();
    var type = $("#type").val();
    var email = $("#email").val();
    var token = $("input[name='_token']").val();
    var password = $('#password').val();
    var data = {
        'name': name,
        'type': type,
        'email': email,
        'password': password,
        '_token': token,
    };

    var url = `register`;
    var request = $.post(url, data);
    request.done(function(response, status, code) {
        notifications(response.message, code.status);
    });
    request.fail(function(response) {
        const errorMessage = response.responseJSON;
        printErrorMsg(errorMessage);
    });
});