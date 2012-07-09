var g = {
    marcacoes: {
        urls: {
            calendario: '',
            marcar: '',
            actualizar: '',
            folha: '',
            apagar: ''
        },
        horario: {
            inicio: 8,
            fim: 18
        }
    },
    folhasObra: {
        urls: {
            material: '',
            servico: '', 
            funcionario: ''
        }
    }
}

/*Calendario/marcações*/
function initCalendar() {
    $("#calendar").fullCalendar({
        header: {
            left: 'month,basicWeek,basicDay',
            center: 'title',
            right: 'today prev,next'
        },
        editable: true,
        theme: true,
        firstDay: 1,
        firstHour: g.marcacoes.horario.inicio,
        events: g.marcacoes.urls.calendario,
        timeFormat: {
            agenda: 'H:mm{ - H:mm}', 
            '': 'H(:mm)'
        },
        buttonText:
        {
            today:    'Hoje',
            month:    'Mês',
            week:     'Semana',
            day:      'Dia'
        },
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        dayNames: ['Domingo', '2ª Feira', '3ª Feira', '4ª Feira', '5ª Feira', '6ª Feira', 'Sábado'],
        dayNamesShort: ['Dom.', 'Seg.', 'Ter.', 'Qua.', 'Qui.', 'Sex.', 'Sáb'],
        eventClick: function(calEvent, jsEvent, view) {
            $('#idEvento').val(calEvent.id);
            $('#descricaoEvento').val(calEvent.title);
            $('#matriculaEvento').val(calEvent.matricula);
            $('#dataEvento').datepicker('setDate', calEvent.start);
            $('#horaEvento').val(calEvent.start.getHours() + ':' + calEvent.start.getMinutes());
            $('#notasEvento').val(calEvent.notas);
            
            $('#janelaEvento').dialog('open');
        },
        dayClick: function(date, allDay, jsEvent, view) {
            $('#dataMarcacao').datepicker('setDate', date);
            $('#janelaMarcacao').dialog('open');
        },
        eventDrop: function( event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view ) {
        //$.ajax({
        //   url: '$urlEventDrop',
        //   data: {
        //            id: event.id,
        //            dayDelta: dayDelta,
        //            minuteDelta: minuteDelta,
        //            allDay: (allDay ? 1 : 0)
        //         },
        //   error: function (jqXHR, textStatus, errorThrown) { revertFunc() },
        //   success: function (data, textStatus, jqXHR)
        //               {
        //                  eval(data);
        //                  if (event.className.indexOf('eventloading') != -1) event.className.splice(event.className.indexOf('eventloading'), 1);
        //                  event.className.push('periodoModificado');
        //                  $('#{$this->getIdFullCalendar()}').fullCalendar('updateEvent', event);
        //               }
        //   });
        },
        eventResize: function( event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view ) {
        //$.ajax({
        //    url: '$urlEventResize',
        //    data: {
        //        id: event.id,
        //        minuteDelta: minuteDelta
        //    },
        //    error: function (jqXHR, textStatus, errorThrown) {
        //        revertFunc()
        //    },
        //    success: function (data, textStatus, jqXHR)
        //    {
        //        eval(data);
        //        if (event.className.indexOf('eventloading') != -1) event.className.splice(event.className.indexOf('eventloading'), 1);
        //        event.className.push('periodoModificado');
        //        $('#{$this->getIdFullCalendar()}').fullCalendar('updateEvent', event);
        //    }
        //});
        }        
    });
}

function initTimePicker() {
    $(".horas").timepicker({
        showPeriodLabels: false,
        hours: {
            starts: g.marcacoes.horario.inicio,
            ends: g.marcacoes.horario.fim
        },
        showDeselectButton: true,
        deselectButtonText: 'Limpar',
        hourText: 'Horas',
        minuteText: 'Minutos'
    });
}

function marcar() {
    $.ajax({
        url: g.marcacoes.urls.marcar,
        type: 'POST',
        dataType: 'json',
        data: {
            data: $('#dataMarcacao').datepicker('getDate').getTime(),
            matricula: $('#matricula').val(),
            hora: $('#hora').val(),
            descricao: $('#descricao').val(),
            notas: $('#notas').val()
        },
        success: function(json){
            if(json.sucesso) {
                $('#calendar').fullCalendar('renderEvent', json.evento);
            } else {
                alert('Não foi possível registar a marcação.');
            }
        },
        complete: function() {
            $("#janelaMarcacao").dialog("close");
        }
    });
}

function fecharJanelaMarcacao() {   
    $('#dataMarcacao').datepicker('setDate', new Date());
    $('#matricula').val('');
    $('#hora').val('');
    $('#descricao').val('');
    $('#notas').val('');
}

function fecharJanelaEvento() {
    $('#idEvento').val(0);
    $('#descricaoEvento').val('');
    $('#matriculaEvento').val('');
    $('#dataEvento').datepicker('setDate', new Date());
    $('#horaEvento').val('');
    $('#notasEvento').val('');
}

function folhaObra() {
    window.location = g.marcacoes.urls.folha + '&id=' + $('#idEvento').val();
}

function guardar() {
    var id = $('#idEvento').val(), calendario = $('#calendar'), 
    eventos = calendario.fullCalendar('clientEvents', id),
    evento = null;
    
    $.ajax({
        url: g.marcacoes.urls.actualizar,
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            data: $('#dataEvento').datepicker('getDate').getTime(),
            matricula: $('#matriculaEvento').val(),
            hora: $('#horaEvento').val(),
            descricao: $('#descricaoEvento').val(),
            notas: $('#notasEvento').val()
        },
        success: function(json) {
            if(json.sucesso) {
                evento = eventos[0];
                
                evento.title = json.evento.title;
                evento.start = json.evento.start;
                evento.matricula = json.evento.matricula;
                evento.allDay = json.evento.allDay;
                evento.notas = json.evento.notas;
                
                calendario.fullCalendar('updateEvent', evento);
            } else {
                alert('Não foi possível guardas as alterações.');
            }
        },
        complete: function() {
            $("#janelaEvento").dialog("close");
        }
    });   
}

function apagar() {
    if(confirm('Tem a certeza que deseja remover a marcação?')) {
        $.ajax({
            url: g.marcacoes.urls.apagar,
            type: 'POST',
            dataType: 'json',
            data: {
                id: $('#idEvento').val()
            },
            success: function(json){
                if(json.sucesso) {
                    $('#calendar').fullCalendar('removeEvents', $('#idEvento').val());
                } else {
                    alert('Não foi possível remover a marcação seleccionada.');
                }
            },
            complete: function() {
                $("#janelaEvento").dialog("close");
            }
        });
    }
}

/*Contactos*/
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

/*Folhas de Obra*/
var linhasGasto = new Array(), nrLinhasServico = 0;

function adicionarLinhaServico() {
    linhasGasto = new Array();
    $('#dlgLinhaServico').dialog('open');
}

function limparCamposDlgLinhaServico() {   
    var max = 0, i;
    
    $('#duracao').val('');
    $('#funcionario').val('');
    $('#servico').val('');
    $('#notas').val('');
    $('#material').val('');
    $('#quantidade').val('');
    
    max = linhasGasto.length;
    for(i = 1; i <= max; i++) {
        removerLinhaGasto(i);
    }
}

function criarLinhaServico() {
    var linha = null, subTotalGastos = 0, tabela = null, max = 0, i = 0, l = null,
    funcionario = null, servico = null, duracao = 0, actual = null, idFuncionario = 0,
    idServico = 0;
    
    if((idFuncionario = $('#funcionario').val()) != '' && (idServico = $('#servico').val()) != '') {
    
        //SYNC?
        $.ajax({
            async: false,
            url: g.folhasObra.urls.funcionario,
            dataType: 'json',
            type: 'POST',
            data: {
                id: idFuncionario
            },
            success: function(json) {
                if(json.sucesso) {
                    funcionario = {
                        id: json.funcionario.idFuncionario,
                        valorHora: parseFloat(json.funcionario.valorHora)
                    }
                } else {
                    alert('Não foi possível obter os dados do funcionário.');
                }
            }
        });

        //SYNC?
        $.ajax({
            async: false,
            url: g.folhasObra.urls.servico,
            dataType: 'json',
            type: 'POST',
            data: {
                id: idServico
            },
            success: function(json) {
                if(json.sucesso) {
                    servico = {
                        id: json.servico.idServico,
                        preco: parseFloat(json.servico.preco)
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
                ordem: ++nrLinhasServico,
                funcionario: funcionario,
                servico: servico,
                duracao: duracao,
                notas: $('#notas').val(),
                gastos: linhasGasto,
                subTotalGastos: parseFloat(subTotalGastos),
                valor: (subTotalGastos + servico.preco + (funcionario.valorHora * duracao))
            }, 
            
            $(document.createElement('tr'))
            .attr({
                id: 'tr-ls-' + linha.ordem
            })
            .append($(document.createElement('td')).html($('#funcionario option:selected').text()))
            .append($(document.createElement('td')).html($('#servico option:selected').text()))
            .append($(document.createElement('td')).html(linha.duracao))
            .append($(document.createElement('td')).html(linha.notas))
            .append($(document.createElement('td')).html(parseFloat(linha.valor).toFixed(2)))
            .append($(document.createElement('td'))
                //.append($(document.createElement('a')).attr({
                //    href: 'javascript:;',
                //    onclick: 'editarLinhaServico(' + linha.ordem +');'
                //})
                //.append($(document.createElement('img'))
                //    .attr({
                //        src: 'imagens/icones/editar.png'
                //    })))
                .append($(document.createElement('a')).attr({
                    href: 'javascript:;',
                    onclick: 'removerLinhaServico(' + linha.ordem +');'
                })
                .append($(document.createElement('img'))
                    .attr({
                        src: 'imagens/icones/remover.png'
                    }))))
            .appendTo($('#linhasServico'));
   
            max = linha.gastos.length;            
            if(max > 0) {
                tabela = $(document.createElement('table'))
                .append($(document.createElement('tr'))
                    .append($(document.createElement('td')).html('Material'))
                    .append($(document.createElement('td')).addClass('small-column').html('Quantidade'))
                    .append($(document.createElement('td')).addClass('small-column').html('Unit. ( &euro; ) / IVA'))
                    .append($(document.createElement('td')).addClass('small-column').html('Sub-total ( &euro; )'))
                    );

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
                
                //Columna base para a tabela de gastos
                $(document.createElement('tr'))
                .attr({
                    id: 'gastos-' + linha.ordem
                })
                .append($(document.createElement('td'))
                    .addClass('coluna-gastos')
                    .attr({
                        colspan: 6
                    })
                    .append(tabela)
                    )
                .appendTo($('#linhasServico'));
            }

            $(document.createElement('input')).attr({
                id: 'ls-' + linha.ordem,
                name: 'linhasServico[]',
                type: 'hidden',
                value: JSON.stringify(linha)
            })
            .appendTo($('#folhaobra-form'));
   
            $('#dlgLinhaServico').dialog('close');
        } else {
            alert('Ocorreu um erro interno.');
        }
    } else {
        alert('Não é possível registar um serviço sem o funcionário e o serviço.');
    }
}

function removerLinhaServico(ordem) {
    $('#tr-ls-' + ordem).remove();
    $('#gastos-' + ordem).remove();
    $('#ls-' + ordem).remove();
    
    linhasGasto = Array();
}

function editarLinhaServico(ordem) {
    
}

function criarLinhaGasto() {
    var linha = null, quantidade = 0, idMaterial = 0;
    
    if((idMaterial = $('#material').val()) != '') {    
        $.ajax({
            url: g.folhasObra.urls.material,
            dataType: 'json',
            type: 'POST',
            data: {
                id: idMaterial
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
                            precoUnitario: parseFloat(json.material.precoUnitario),
                            iva: {
                                id: json.material.iva.idIVA,
                                percentagem: parseFloat(json.material.iva.percentagem)
                            }
                        },
                        subTotal: quantidade * parseFloat(json.material.precoUnitario) * (1 + parseFloat(json.material.iva.percentagem) / 100)
                    };
                    linhasGasto.push(linha);
                
                    $(document.createElement('tr')).attr({
                        id: 'lg-' + linha.ordem
                    })
                    .append($(document.createElement('td')).html(linha.quantidade))
                    .append($(document.createElement('td')).html($('#material option:selected').text()))
                    .append($(document.createElement('td')).html(linha.subTotal.toFixed(2)))
                    .append($(document.createElement('td')).append(
                        $(document.createElement('a')).attr({
                            href: 'javascript:;',
                            onclick: 'removerLinhaGasto(' + linha.ordem + ');'
                        })
                        .append($(document.createElement('img'))
                            .attr({
                                src: 'imagens/icones/remover.png'
                            }))
                        ))
                    .appendTo($('#linhasGasto'));
                
                    $('#quantidade').val('');
                    $('#material').val('');
                } else {
                    alert('Não foi possível obter os dados do material.');
                }
            }
        });
    }
}

function removerLinhaGasto(ordem) {
    linhasGasto.splice(ordem - 1, 1);
    $('#lg-' + ordem).remove();
}