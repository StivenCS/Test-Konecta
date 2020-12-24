const input = document.getElementById('searchUser');

function list() {
    var url = `users/all`;
    $.ajax({
        url: url,
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
        },
        method: 'GET',
        success: function(data) {
            table(data);
        },
        error: function(param) {
            console.log(param);
            notifications(param.responseJSON.status, param.status);
        }
    })
    let timeout;
    input.addEventListener('input', function(event) {
        clearTimeout(timeout)
        timeout = setTimeout(() => {
            var name = event.srcElement.value ? event.srcElement.value : "";
            var token = $("input[name='_token']").val();
            var data = {
                '_token': token,
                'name': name
            };
            $.ajax({
                url: 'users/name',
                method: 'POST',
                data: data,
                headers: {
                    'Authorization': `Bearer ${localStorage.getItem('token')}`,
                },
                success: function(response) {
                    table(response);
                }
            });
            clearTimeout(timeout)
        }, 1000)
    });
}

function table(response) {
    var table = $("#usersTable");
    tableContent = "";
    $(response).each(function(key, value) {
        tableContent += "<tr>";
        tableContent += `<td class="text-center">${value.name}</td>`;
        tableContent += `<td class="text-center">${value.email}</td>`;
        tableContent += `<td class="text-center">${value.role}</td>`;
        tableContent += `<td><div class="btn-group text-center" role="group">
        <button class="update btn btn-link" title="Editar Usuario"  data-id="${ value.id }" data-toggle='modal' data-target='#User'><span style="font-size: 1em; color: Dodgerblue;"><i class="fas fa-user-edit"></i></span></button>
        <button class="delete btn btn-link" title="Eliminar Usuario"  data-id="${ value.id }"><span style="font-size: 1em; color: Tomato;"><i class="fas fa-trash"></i></span></button> </div></td>`;
        tableContent += "</tr>";
    });

    table.empty();
    table.append(tableContent);
}

$(document).ready(function() {
    list();
});