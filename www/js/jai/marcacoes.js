var globais = {
    url: {
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
}

function initCalendar() {
    $("#calendar").fullCalendar({
        header: {
            left: 'month,basicWeek,basicDay',
            center: 'title',
            right: 'today prev,next'
        },     
        theme: true,
        firstDay: 1,
        firstHour: globais.horario.inicio,
        events: globais.url.calendario,
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
        }
    });
}

function initTimePicker() {
    $(".horas").timepicker({
        showPeriodLabels: false,
        hours: {
            starts: globais.horario.inicio,
            ends: globais.horario.fim
        },
        showDeselectButton: true,
        deselectButtonText: 'Limpar',
        hourText: 'Horas',
        minuteText: 'Minutos'
    });
}

function marcar() {
    $.ajax({
        url: globais.url.marcar,
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
    window.location = globais.url.folha + '&id=' + $('#idEvento').val();
}

function guardar() {
    var id = $('#idEvento').val(), calendario = $('#calendar'), 
    eventos = calendario.fullCalendar('clientEvents', id),
    evento = null;
    
    $.ajax({
        url: globais.url.actualizar,
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
            url: globais.url.apagar,
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