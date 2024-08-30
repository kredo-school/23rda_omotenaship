<div id="calendar"></div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            dateClick: function(info) {
                window.location.href = '/posts/calendar?date=' + info.dateStr;
                document.getElementById('selected-date').innerText = selectedDate;
            },
            // hand pointer function
            dayCellClassNames: function() {
            return 'fc-day-pointer';
            }
        });
        calendar.render();
    });
</script>