function list() {
    var url = `clients/all`;
    $.ajax({
        url: url,
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`,
        },
        method: 'GET',
        success: function(data) {
            table(data);
        }
    })
}

function table(response) {
    var table = $("#clientsTable");
    tableContent = "";
    $(response).each(function(key, value) {
        tableContent += "<tr>";
        tableContent += `<td class="text-center">${value.name}</td>`;
        tableContent += `<td class="text-center">${value.document}</td>`;
        tableContent += `<td class="text-center">${value.email}</td>`;
        tableContent += `<td class="text-center">${value.direction}</td>`;
        tableContent += `<td><div class="btn-group text-center" role="group">
        <button class="update btn btn-link" title="Editar Cliente"  data-id="${ value.id }" data-toggle='modal' data-target='#Client'><span style="font-size: 1em; color: Dodgerblue;"><i class="fas fa-user-edit"></i></span></button>
        <button class="delete btn btn-link" title="Eliminar Cliente"  data-id="${ value.id }"><span style="font-size: 1em; color: Tomato;"><i class="fas fa-trash"></i></span></button> </div></td>`;

        tableContent += "</tr>";
    });

    table.empty();
    table.append(tableContent);
}

$(document).ready(function() {
    list();
});