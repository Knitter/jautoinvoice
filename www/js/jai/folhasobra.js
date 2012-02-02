var urlMaterial = '', urlServico = '', urlFuncionario = '', linhasServico = new Array(), linhasGasto = null;

function adicionarLinhaServico() {
    linhasGasto = new Array();
    $('#dlgLinhaServico').dialog('open');
}

function criarLinhaServico() {
    var linha = null, subTotalGastos = 0, tabela = null, max = 0, i = 0, l = null,
    funcionario = null, servico = null, duracao = 0, actual = null;
    
    //SYNC?
    $.ajax({
        async: false,
        url: urlFuncionario,
        dataType: 'json',
        type: 'POST',
        data: {
            id: $('#funcionario').val() 
        },
        success: function(json) {
            if(json.sucesso) {
                funcionario = {
                    id: json.funcionario.idFuncionario,
                    valorHora: json.funcionario.valorHora
                }
            } else {
                alert('Não foi possível obter os dados do funcionário.');
            }
        }
    });

    //SYNC?
    $.ajax({
        async: false,
        url: urlServico,
        dataType: 'json',
        type: 'POST',
        data: {
            id: $('#servico').val() 
        },
        success: function(json) {
            if(json.sucesso) {
                servico = {
                    id: json.servico.idServico,
                    preco: json.servico.preco
                }
            } else {
                alert('Não foi possível obter os dados do servico.');
            }
        }
    });
    
    if(funcionario != null && servico != null) {
        max = linhasGasto.length;
        for(i = 0; i < max; i++) {
            subTotalGastos += linhasGasto[i].subTotal;
        }
        
        duracao = $('#duracao').val() != '' ? parseInt($('#duracao').val(), 10) : 0;
                
        linha = {
            ordem: linhasServico.length + 1,
            funcionario: funcionario,
            servico: servico,
            duracao: duracao,
            notas: $('#notas').val(),
            gastos: linhasGasto,
            subTotalGastos: subTotalGastos,
            valor: (subTotalGastos + servico.preco + (funcionario.valorHora * duracao))
        }, 
        linhasServico.push(linha);
            
        $(document.createElement('tr'))
        //.attr()
        .append($(document.createElement('td')).html($('#funcionario option:selected').text()))
        .append($(document.createElement('td')).html($('#servico option:selected').text()))
        .append($(document.createElement('td')).html(linha.duracao))
        .append($(document.createElement('td')).html(linha.notas))
        .append($(document.createElement('td')).html(parseFloat(linha.valor).toFixed(2)))
        .append($(document.createElement('td'))
            .append($(document.createElement('input')).attr({
                type: 'button',
                onclick: 'removerLinhaServico(' + linha.ordem +');',
                value: '-'
            })))
        .appendTo($('#linhasServico'));
    
        tabela = $(document.createElement('table'))
        .append($(document.createElement('tr'))
            .append($(document.createElement('td')).html('Material'))
            .append($(document.createElement('td')).addClass('small-column').html('Quantidade'))
            .append($(document.createElement('td')).addClass('small-column').html('Unit. ( &euro; ) / IVA'))
            .append($(document.createElement('td')).addClass('small-column').html('Sub-total ( &euro; )'))
            );
    
        max = linha.gastos.length;
        for(i = 0; i < max; i++) {
            actual = linha.gastos[i];
            
            $(document.createElement('tr'))
            .append($(document.createElement('td')).html(actual.material.nome))
            .append($(document.createElement('td')).html(actual.quantidade))
            .append($(document.createElement('td')).html(parseFloat(actual.material.precoUnitario).toFixed(2) 
                + ' / ' + actual.material.iva.percentagem + '%'))
            .append($(document.createElement('td')).html(parseFloat(actual.subTotal).toFixed(2)))
            .appendTo(tabela);
        }

        tabela.append($(document.createElement('tr'))
            .append($(document.createElement('td')).attr('colspan', 3).html('Sub-total ( &euro; )'))
            .append($(document.createElement('td')).html(parseFloat(linha.subTotalGastos).toFixed(2)))
            );
                
        $(document.createElement('tr'))
        //.attr()
        //Columna base para a tabela de gastos
        .append($(document.createElement('td'))
            .addClass('coluna-gastos')
            .attr('colspan', 6)
            .append(tabela)
            )
        .appendTo($('#linhasServico'));
            
        $(document.createElement('input')).attr({
            id: 'ls-' + linha.id,
            name: 'linhasServico[]',
            type: 'hidden',
            value: JSON.stringify(linha)
        })
        .appendTo($('#folhaobra-form'));
   
        $('#dlgLinhaServico').dialog('close');
    } else {
        alert('Ocorreu um erro interno.');
    }
}

function limparCamposDlgLinhaServico() {   
    $('#duracao').val('');
    $('#funcionario').val('');
    $('#servico').val('');
    $('#notas').val('');
    $('#material').val('');
    $('#quantidade').val('');
    
//each linhaGasto    
//removerLinhaGasto();

//deactivate add button
//deactivate add linha gasto button
}

function removerLinhaServico(ordem) {
//var deleted = linhasServico.splice(ordem, 1), i = deleted[0].gastos.length;
//remover linhas de gasto já colocadas no DOM do form
}

function criarLinhaGasto() {
    var linha = null, quantidade = 0;
    
    $.ajax({
        url: urlMaterial,
        dataType: 'json',
        type: 'POST',
        data: {
            id: $('#material').val()
        },
        success: function(json) {
            if(json.sucesso) {
                quantidade = $('#quantidade').val() != '' ? parseInt($('#quantidade').val(), 10) : 1;
                linha = {
                    ordem: linhasGasto.length + 1,
                    quantidade: quantidade,
                    material: {
                        id: json.material.idMaterial,
                        nome: json.material.nome,
                        precoUnitario: json.material.precoUnitario,
                        iva: {
                            id: json.material.iva.idIVA,
                            percentagem: json.material.iva.percentagem
                        }
                    },
                    subTotal: quantidade * json.material.precoUnitario * (1 + json.material.iva.percentagem / 100)
                };
                linhasGasto.push(linha);
                
                $(document.createElement('tr')).attr({
                    id: 'lg-' + linha.ordem
                })
                .append($(document.createElement('td')).html(linha.quantidade))
                .append($(document.createElement('td')).html($('#material option:selected').text()))
                .append($(document.createElement('td')).html(linha.subTotal.toFixed(2)))
                .append($(document.createElement('td')).append(
                    $(document.createElement('input')).attr({
                        type: 'button',
                        onclick: 'removerLinhaGasto(' + linha.ordem + ');',
                        value: '-'
                    })))
                .appendTo($('#linhasGasto'));
                
                $('#quantidade').val('');
                $('#material').val('');
            } else {
                alert('Não foi possível obter os dados do material.');
            }
        }
    });
}

function removerLinhaGasto(ordem) {
    linhasGasto.splice(ordem, 1);
    $('#lg-' + ordem).remove();
}

function verificarBotaoAdicionar() {
//if($('#funcionario').val() != '' && $('#servico').val() != '') {
//    $('#btnAdicionarLS').attr('disabled', false).removeClass('ui-state-disabled');
//} else {
//    $('#btnAdicionarLS').attr('disabled', 'disabled').addClass('ui-state-disabled');
//}
}

function verificarBotaoAdicionarLG () {
//if($('#material').val() != '' && $('#quantidade').val() != '') {
//    $('#btnAdicionarLG').attr('disabled', false);
//} else {
//    $('#btnAdicionarLG').attr('disabled', 'disabled');
//}
}