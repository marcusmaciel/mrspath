$(document).ready(function () {
    listaCategorias();
});

function listaCategorias() {
    var table = $('#lista-categorias  tbody');
    var itens = "";
    $.ajax({
        url: 'controllers/categorias/categorias.php',
        dataType: 'json',
        success: function (retorno) {
            for (var i in retorno) {
                itens += "<tr>";
                itens += '<td style="width: 90%;">' + retorno[i].Descricao + '</td>';
                itens += '<td><a class="btn btn-primary btn-flat btn-sm" href="alterar-categoria.php?id=' + retorno[i].ID +'"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-flat btn-sm" href="?excluir&id=' + retorno[i].ID +'"><i class="fa fa-close"></i></a></td>';
                itens += "</tr>";
            }
            table.html(itens);
        }
    });
}