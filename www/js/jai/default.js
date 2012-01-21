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

