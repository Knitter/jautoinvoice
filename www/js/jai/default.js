function fecharCaixaSMS() {
    $('#sms').val(''),
    $('#idClienteSms').val('')
}

function fecharCaixaEmail() {
    $('#assunto').val(''),
    $('#mensagem').val(''),
    $('#idClienteEmail').val('')
}

function caixaSms(idCliente) {
    $("#idClienteSms").val(idCliente);
    
    $("#smsForm").dialog("open");
    return false;
}

function caixaEmail(idCliente) {
    $("#idClienteEmail").val(idCliente);
    
    $("#emailForm").dialog("open");
    return false;
}

function enviarEmail(url) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            assunto: $('#assunto').val(),
            mensagem: $('#mensagem').val(),
            cliente: $('#idClienteEmail').val()
        },
        success: function(json){
            if(json.sucesso) {
                alert('Mensagem enviada.');
            } else {
                alert('Não foi possível enviar o e-mail.');
            }
        },
        complete: function() {
            $("#emailForm").dialog("close");
        }
    });
}

function enviarSMS(url) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            sms: $('#sms').val(),
            cliente: $('#idClienteSms').val()
        },
        success: function(json){
            if(json.sucesso) {
                alert('Mensagem enviada.');
            } else {
                alert('Não foi possível enviar a mensagem.');
            }
        },
        complete: function() {
            $("#smsForm").dialog("close");
        }
    });   
}

