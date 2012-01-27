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

function caixaEmail(idDestinatario) {
    $("#idDestinatario").val(idDestinatario);
    
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
            cliente: $('#idDestinatario').val()
        },
        success: function(json){
            if(json.sucesso) {
                alert('Mensagem enviada.');
            } else {
                alert(json.motivo ? json.motivo : 'Não foi possível enviar o e-mail.');
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
                alert(json.motivo ? json.motivo : 'Não foi possível enviar a mensagem.');
            }
        },
        complete: function() {
            $("#smsForm").dialog("close");
        }
    });   
}

function actualizarCreditos(url) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        success: function(json){
            if(json.sucesso) {
                $('#creditosSMS').html(json.creditos);
            } else {
                $('#creditosSMS').html('#ERRO!');
                if(json.motivo) {
                    alert(json.motivo);
                }
            }
        }
    });
}

