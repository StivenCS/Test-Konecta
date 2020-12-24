$(".btnLogIn").click(function() {
    var email = $('#email').val();
    var password = $('#password').val();
    var token = $("input[name='_token']").val();
    var data = {
        'email': email,
        'password': password,
        '_token': token,
    };

    var url = `login`;
    var request = $.post(url, data);
    request.done(function(response, status, code) {
        localStorage.setItem('token', response.token.token);
        localStorage.setItem('user', response.user);
        location.href = '/users';
    });
    request.fail(function(response) {
        const errorMessage = response.responseJSON;
        printErrorMsg(errorMessage);
    });
})