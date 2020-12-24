$(".addClient").click(function() {
    var name = $("#name").val();
    var document = $("#document").val();
    var email = $("#email").val();
    var token = $("input[name='_token']").val();
    var direction = $('#direction').val();
    var data = {
        'name': name,
        'document': document,
        'email': email,
        'direction': direction,
        '_token': token,
    };

    var url = `clients/create`;
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