$(document).ready(function() {
    $(document).on('click', '.update', function() {
        $('#titleModalUser').text('Actualizar Usuario');
        $('#createButtonContent').attr('hidden', true);
        $('#updateButtonContent').attr('hidden', false);
        var id = $(this).attr('data-id');
        $("#updateID").val(id);
        var url = `/users/${id}`;
        $.ajax({
            url: url,
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
            success: function(response) {
                $("#name").val(response.name);
                $("#type").val(response.type);
                $("#email").val(response.email);
            }
        })
    });

    $("#btnUpdateUser").click(function() {
        var id = $("#updateID").val();
        var name = $("#name").val();
        var type = $("#type").val();
        var email = $("#email").val();
        var token = $("input[name='_token']").val();
        var data = {
            'name': name,
            'type': type,
            'email': email,
            '_token': token,
        };
        var url = `/users/update/${id}`;
        var request = $.ajax({
            method: 'POST',
            url: url,
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
            data: data,
            success: function(response, status, code) {
                notifications(response.message, code.status);
                list();
            },
            error: function(response) {
                const errorMessage = response.responseJSON;
                printErrorMsg(errorMessage);
            },

        });
    });
});