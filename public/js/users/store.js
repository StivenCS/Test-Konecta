$(".addUser").click(function() {
    var name = $("#name").val();
    var type = $("#type").val();
    var email = $("#email").val();
    var token = $("input[name='_token']").val();
    var password = $('#password').val();
    var password
    var data = {
        'name': name,
        'type': type,
        'email': email,
        'password': password,
        '_token': token,
    };

    var url = `register`;
    $.ajax({
        url: url,
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
        },
        data: data,
        method: 'POST',
        success: function(response, status, code) {
            notifications(response.message, code.status);
            list();
        },
        error: function(response) {
            const errorMessage = response.responseJSON;
            printErrorMsg(errorMessage);
        }
    });

});