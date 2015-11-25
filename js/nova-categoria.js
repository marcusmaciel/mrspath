$(document).ready(function () {
    var frmCadastroCategoria = $('form[name="form-cadastro-categorias"]');
    var frmAlterarCategoria = $('form[name="form-alterar-categorias"]');
    
    frmCadastroCategoria.submit(function () {
        $.ajax({
            url: 'controllers/categorias/categorias.php',
            data: 'ac=cadastrar&' + frmCadastroCategoria.serialize(),
            type: 'post',
            beforeSend: function (xhr) {
                $('button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i> Salvando').attr('disabled', true);
            },
            success: function (data, textStatus, jqXHR) {
                if (data === 'cadastrou') {
                    $('button[type="submit"]').html('Salvar').attr('disabled', false);
                    setTimeout(function () {
                        $(location).attr('href', 'gerenciador-de-categorias.php');
                    }, 1000);
                } else {
                    console.log(data);
                }
            }
        });
        return false;
    });
    
    frmAlterarCategoria.submit(function () {
        $.ajax({
            url: 'controllers/categorias/categorias.php',
            data: 'ac=alterar&' + frmAlterarCategoria.serialize(),
            type: 'post',
            beforeSend: function (xhr) {
                $('button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i> Alterando').attr('disabled', true);
            },
            success: function (data, textStatus, jqXHR) {
                if (data === 'alterou') {
                    $('button[type="submit"]').html('Alterar').attr('disabled', false);
                    setTimeout(function () {
                        $(location).attr('href', 'gerenciador-de-categorias.php');
                    }, 1000);
                } else {
                    console.log(data);
                }
            }
        });
        return false;
    });
    
});
