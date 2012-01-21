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
            $("#janelaMarcacao").dialog("open");
        }
    });
}

function marcar() {
    
}

function filtrarVeiculos() {
    
}