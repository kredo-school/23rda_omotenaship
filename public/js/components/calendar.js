'use strict';

{
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            contentHeight: 'auto',

            dateClick: function (info) {
                var clickedDate = info.date;
                var options = { month: 'short', day: 'numeric' };
                var formattedDate = clickedDate.toLocaleDateString('en-US', options);

                document.getElementById('selected-date').textContent = formattedDate;
            },

            // hand pointer function
            dayCellClassNames: function () {
                return 'fc-day-pointer';
            }
        });

        calendar.render();
    });
}
