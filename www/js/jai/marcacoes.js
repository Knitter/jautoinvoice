function initCalendar(url) {
    $("#calendar").fullCalendar({
        header: {
            left: 'month,basicWeek,basicDay',
            center: 'title',
            right: 'today prev,next'
        },     
        
        firstHour: 8,
        events: url,
        timeFormat: {
            agenda: 'H:mm{ - H:mm}', 
            '': 'H(:mm)'
        },
        buttonText:
        {
            prev:     '&nbsp;&#9668;&nbsp;',  // left triangle
            next:     '&nbsp;&#9658;&nbsp;',  // right triangle
            prevYear: '&nbsp;&lt;&lt;&nbsp;', // <<
            nextYear: '&nbsp;&gt;&gt;&nbsp;', // >>
            today:    'Hoje',
            month:    'Mês',
            week:     'Semana',
            day:      'Dia'
        },
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        dayNames: ['Domingo', '2ª Feira', '3ª Feira', '4ª Feira', '5ª Feira', '6ª Feira', 'Sábado'],
        dayNamesShort: ['Dom.', 'Seg.', 'Ter.', 'Qua.', 'Qui.', 'Sex.', 'Sáb'],
        eventClick: function(event) {
        //$("#janelaEvento").dialog("open");
        },
        dayClick: function(date, allDay, jsEvent, view) {
            //TODO: actualizar valor correcto de acordo com horário de funcionamento
            $('#data').datepicker('setDate', date);
            //$("#hora").val(date.getHours() + ':' + date.getMinutes());
            $('#janelaMarcacao').dialog('open');
        }
    });
}

function initTimePicker() {
    $("#hora").timepicker({
        showPeriodLabels: false,
        //TODO: personalizavel
        hours: {
            starts: 9,
            ends: 18
        },
        showDeselectButton: true,
        deselectButtonText: 'Limpar',
        hourText: 'Horas',
        minuteText: 'Minutos'
    });
}

function marcar(url) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            data: $('#data').datepicker('getDate').getTime(),
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

function fechar() {   
    $('#data').datepicker('setDate', new Date());
    $('#matricula').val('');
    $('#hora').val('');
    $('#descricao').val('');
    $('#notas').val('');
}