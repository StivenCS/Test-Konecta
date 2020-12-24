$(document).ready(function() {
    $(document).on('click', '.update', function() {
        $('#titleModalClient').text('Actualizar Cliente');
        $('#createButtonContent').attr('hidden', true);
        $('#updateButtonContent').attr('hidden', false);
        var id = $(this).attr('data-id');
        $("#updateID").val(id);
        var url = `/clients/${id}`;
        $.ajax({
            url: url,
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
            success: function(response) {
                $("#name").val(response[0].name);
                $("#document").val(response[0].document);
                $("#email").val(response[0].email);
                $("#direction").val(response[0].direction);
            }
        })
    });

    $("#btnUpdateClient").click(function() {
        var id = $("#updateID").val();
        var name = $("#name").val();
        var document = $("#document").val();
        var email = $("#email").val();
        var direction = $("#direction").val();
        var token = $("input[name='_token']").val();
        var data = {
            'name': name,
            'document': document,
            'email': email,
            'direction': direction,
            '_token': token,
        };
        var url = `/clients/update/${id}`;
        $.ajax({
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