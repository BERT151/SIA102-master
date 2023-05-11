var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.id, title: row.serviceType,email: row.email, start: row.start_datetime, end: row.end_datetime });
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        calendar = new Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                start: 'prev,next today',
                end: 'dayGridMonth,dayGridWeek',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            //Random default events
            events: events,
            eventClick: function(info) {
                var _details = $('#event-details-modal')
                var id = info.event.id
                if (!!scheds[id]) {
                    _details.find('#title').text(scheds[id].serviceType)
                    _details.find('#email').text(scheds[id].email)
                    _details.find('#trainer').text(scheds[id].trainer)
                    _details.find('#status').text(scheds[id].status)
                    _details.find('#start').text(scheds[id].sdate)
                    _details.find('#end').text(scheds[id].edate)
   
                    _details.find('#edit,#delete').attr('data-id', id)
                    _details.modal('show')
                } else {
                    alert("Appointment is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: true
        });

        calendar.render();

        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="serviceID"]').val(scheds[id].serviceID).attr('readonly', true)
                _form.find('[name="email"]').val(scheds[id].email).attr('readonly', true)
                _form.find('[name="status"]').val(scheds[id].status).attr('readonly', true)
                _form.find('[name="trainer"]').val(scheds[id].trainer)
                _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
                _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
                
                $('#event-details-modal').modal('hide')
                _form.find('[name="title"]').focus()
      
            } else {
                alert("Event is undefined");
            }
        })

        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _conf = confirm("Are you sure to delete this appointment?");
                if (_conf === true) {
                    location.href = "./delete_schedule.php?id=" + id;
                }
            } else {
                alert("Appointment is undefined");
            }
        })
    })