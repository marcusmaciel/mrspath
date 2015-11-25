$(document).ready(function () {
    var formLogin = $('form[name="form-login"]');
    formLogin.submit(function () {
        $.ajax({
            url: rota('seguranca', 'login'),
            type: 'post',
            data: formLogin.serialize(),
            success: function (data, textStatus, jqXHR) {
                if (data === 'naoexiste') {
                    getRetorno('Não existe esse usuario', 'alerta');
                }else if(data === 'errado'){
                    getRetorno('Credênciais inválidas','erro')
                }
                else if(data === 'login'){
                    $(location).attr('href','index.php');
                }
                else {
                    console.log(data);
                }
            }
        });
        return false;
    });
});
//Pegar retorno dos controllers
function getRetorno(texto, tipo) {
    var retorno = $('.retorno');
    if (tipo === 'erro') {
        retorno.show();
        retorno.html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>" +
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>" +
                "<strong>" + texto + "</strong>" +
                "</div>");
        setTimeout(function () {
            retorno.hide();
        }, 3000);
    } else if (tipo === 'alerta') {
        retorno.show();
        retorno.html("<div class='alert alert-warning alert-dismissible fade in' role='alert'>" +
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>" +
                "<strong>" + texto + "</strong>" +
                "</div>");
        setTimeout(function () {
            retorno.hide();
        }, 3000);
    }
}
//Montar a rota
function rota(modulo, arquivo) {
    return 'controllers/' + modulo + '/' + arquivo + '.php';
}