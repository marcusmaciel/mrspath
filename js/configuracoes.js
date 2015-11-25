$(document).ready(function () {

    var frmConfigSite = $('form[name="form-config-site"]');
    var frmConfigSEO = $('form[name="form-config-seo"]');
    frmConfigSite.submit(function () {
        $.ajax({
            url: 'controllers/configuracoes/site.php',
            data: 'ac=atualizarSite&' + frmConfigSite.serialize(),
            type: 'post',
            beforeSend: function (xhr) {
                $('button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i> Atualizando').attr('disabled', true);
            },
            success: function (data, textStatus, jqXHR) {
                if (data === 'atualizou') {
                    $('button[type="submit"]').html('Atualizar informações').attr('disabled', false);
                    setTimeout(function () {
                        $(location).attr('href', 'configuracoes-site.php');
                    }, 1000);
                } else {
                    console.log(data);
                }
            }
        });
        return false;
    });

    frmConfigSEO.submit(function () {
        $.ajax({
            url: 'controllers/configuracoes/site.php',
            data: 'ac=atualizarSEO&' + frmConfigSEO.serialize(),
            type: 'post',
            beforeSend: function (xhr) {
                $('button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i> Atualizando').attr('disabled', true);
            },
            success: function (data, textStatus, jqXHR) {
                if (data === 'atualizou') {
                    $('button[type="submit"]').html('Atualizar informações').attr('disabled', false);
                    setTimeout(function () {
                        $(location).attr('href', 'configuracoes-de-seo.php');
                    }, 1000);
                } else {
                    console.log(data);
                }
            }
        });
        return false;
    });
});


$(window).load(function () {
    if (location.href === baseSite() + 'configuracoes-de-seo.php') {
        buscaDadosSEO();
    } else {
        buscaDadosSite();
    }
});

function buscaDadosSite() {
    $.ajax({
        url: 'controllers/configuracoes/site.php',
        dataType: 'json',
        success: function (data, textStatus, jhXHR) {
            $('#facebook').val(data.Facebook);
            $('#twitter').val(data.Twitter);
            $('#youtube').val(data.Youtube);
            $('#descricao').val(data.descricao);
            $('#email').val(data.email);
            $('#titulo').val(data.titulo);
        }
    });
}
function buscaDadosSEO() {
    $.ajax({
        url: 'controllers/configuracoes/site.php',
        dataType: 'json',
        success: function (data, textStatus, jhXHR) {
            $('#ga').val(data.ga);
            $('#keys').val(data.Keywords);
        }
    });
}

function baseSite() {
    return 'http://localhost/zoas/';
}