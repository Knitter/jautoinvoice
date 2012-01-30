var globais = {
    url: {
        funcionarios: '',
        servicos: '',
        materiais: ''
    }
}, linhasServico = new Array(), linhasGasto = null;

function adicionarLinhaServico() {
    linhasGasto = new Array();
    
    $('#dlgLinhaServico').dialog('open');
}

function criarLinhaServico() {
    var valor = $('#valorHora').val() != '' ? parseFloat($('#valorHora').val()) : 0,
    duracao = $('#duracao').val() != '' ? parseInt($('#duracao').val(), 10) : 0,
    base = $('#valor').val() != '' ? parseFloat( $('#valor').val()) : 0,
    iva = $('#valorIvaServico').val() != '' ? parseFloat($('#valorIvaServico').val()) : 0;
    
    valor = (valor * duracao) + (base * (1 + iva));
            
    $(document.createElement('tr'))
    .append($(document.createElement('td')).html($('#funcionario option:selected').text()))
    .append($(document.createElement('td')).html($('#servico option:selected').text()))
    .append($(document.createElement('td')).html(duracao))
    .append($(document.createElement('td')).html(valor))
    .append($(document.createElement('td')).html($('#notas').val()))
    .append($(document.createElement('td'))
        .append($(document.createElement('input')).attr({
            type: 'button',
            onclick: 'removerLinhaServico();',
            value: '-'
        })))
    .appendTo($('#linhasServico'));
    
    linhasServico.push({
        id: linhasServico.length + 1,
        funcionario: {
            id: $('#funcionario').val(),
            valorHora: $('#valorHora').val(),
            nome: $('#funcionario option:selected').text()
        },
        servico: {
            id: $('#servico').val(),
            nome: $('#servico option:selected').text()
        },
        duracao: $('#duracao').val(),
        preco: $('#valor').val(),
        iva: {
            id: $('#idIvaServico').val(),
            valor: iva,
            nome: $('#descIvaServico').val()
        },
        notas: $('#notas').val(),
        gastos: linhasGasto
    });
   
    $('#dlgLinhaServico').dialog('close');
}

function limparCamposDlgLinhaServico() {
    $('#valorHora').val('');
    $('#duracao').val('');
    $('#valor').val('');
    $('#valorIvaServico').val(0);
    $('#descIvaServico').val('');
    $('#funcionario').val('');
    $('#servico').val('');
    $('#notas').val(''); 
}

function removerLinhaServico() {
    alert('Por implementar');
}

function criarLinhaGasto() {
    var total = 0.0, precoUnitario = $('#precoUnitario').val() != '' ? parseFloat($('#precoUnitario').val()) : 0,
    iva = $('#valorIvaMaterial').val() != '' ? parseFloat($('#valorIvaMaterial').val()) : 0, 
    desconto = $('#desconto').val() != '' ? parseFloat($('#desconto').val()) : 0,
    quantidade = $('#quantidade').val() != '' ? parseInt($('#quantidade').val(), 10) : 0;
    
    total = ((precoUnitario * (1 + iva)) - desconto) * quantidade;
    
    linhasGasto.push({
        ordem: linhasGasto.length + 1,
        quantidade: quantidade,
        material: {
            id: $('#material').val(),
            nome: $('#material option:selected').text()
        },
        preco: precoUnitario,
        iva: {
            id: $('#idIvaMaterial').val(),
            valor: iva,
            nome: $('#descIvaMaterial').val()
        },
        desconto: desconto
    });    
    
    $(document.createElement('tr'))
    .append($(document.createElement('td')).html(quantidade))
    .append($(document.createElement('td')).html($('#material option:selected').text()))
    .append($(document.createElement('td')).html(precoUnitario))
    .append($(document.createElement('td')).html($('#descIvaMaterial').val()))
    .append($(document.createElement('td')).html(desconto))
    .append($(document.createElement('td')).html(total))
    .append($(document.createElement('td')).append(
        $(document.createElement('input')).attr({
            type: 'button',
            onclick: 'removerLinhaGasto();',
            value: '-'
        })))
    .appendTo($('#linhasGasto'));
    
    $('#btnAdicionarLG').attr('disabled', 'disabled');
    limparCamposDlgLinhaGastos();
}

//TODO: verificar se é reutilizado além da função criarLinhaGasto
function limparCamposDlgLinhaGastos() {
    $('#quantidade').val('');
    $('#material').val('');
    $('#precoUnitario').val(0);
    $('#descIvaMaterial').val('');
    $('#desconto').val(0);
    $('#valorIvaMaterial').val(0);
    $('#idIvaMaterial').val(0)
}

function removerLinhaGasto() {
    alert('Por implementar');
}

function pedirDadosFuncionario() {
    if($('#funcionario').val() != '') { 
        $.ajax({
            url: globais.url.funcionarios,
            dataType: 'json',
            type: 'POST',
            data: {
                id: $('#funcionario').val()
            },
            success: function(json) {
                if(json.sucesso) {
                    $('#valorHora').val(json.funcionario.valorHora);
                }
            },
            complete: verificarBotaoAdicionar
        });
    }
}

function pedirDadosServico() {
    if($('#servico').val() != '') {
        $.ajax({
            url: globais.url.servicos,
            dataType: 'json',
            type: 'POST',
            data: {
                id: $('#servico').val()
            },
            success: function(json) {
                if(json.sucesso) {
                    $('#valor').val(json.servico.preco);
                    if(json.servico.iva) {
                        $('#idIvaServico').val(json.servico.iva.idIVA);
                        $('#valorIvaServico').val(json.servico.iva.valorIVA / 100);
                        $('#dscIva').html('(' + json.servico.iva.descIVA + ')');
                    } else {
                        $('#idIvaServico').val(0);
                        $('#valorIvaServico').val(0);
                        $('#dscIva').html('(Sem IVA)');
                    }
                }
            },
            complete: verificarBotaoAdicionar
        });
    }
}

function verificarBotaoAdicionar() {
    if($('#funcionario').val() != '' && $('#servico').val() != '') {
        $('#btnAdicionarLS').attr('disabled', false);
    } else {
        $('#btnAdicionarLS').attr('disabled', 'disabled');
    }
}

function pedirDadosMaterial() {
    if($('#material').val()) {
        $.ajax({
            url: globais.url.materiais,
            dataType: 'json',
            type: 'POST',
            data: {
                id: $('#material').val()
            },
            success: function(json) {
                if(json.sucesso) {
                    $('#precoUnitario').val(json.material.precoUnitario);
                    $('#maxDesconto').val(json.material.desconto);
                    //iva
                    $('#descIvaMaterial').val(json.material.iva.descIVA);
                    $('#valorIvaMaterial').val(json.material.iva.valorIVA / 100);
                    $('#idIvaMaterial').val(json.material.iva.idIVA);
                }
            },
            complete: function () {
                if($('#material').val() != '') {
                    $('#btnAdicionarLG').attr('disabled', false);
                } else {
                    $('#btnAdicionarLG').attr('disabled', 'disabled');
                }
            }
        });
    }
}