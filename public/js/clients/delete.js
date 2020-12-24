$(document).on('click', '.delete', function() {
    var id = $(this).attr('data-id');
    var url = `/clients/delete/${id}`;
    $.ajax({
        url: url,
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
        },
        success: function(response, status, code) {
            notifications(response.message, code.status);
            list();
        }
    })
});