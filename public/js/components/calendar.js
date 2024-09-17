'use strict';

{
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var urlParams = new URLSearchParams(window.location.search);
        var selectedDate = urlParams.get('date');

        if (selectedDate) {
            document.getElementById('selected-date').textContent = selectedDate;
        }

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            contentHeight: 'auto',

            dateClick: function (info) {
                window.location.href = '/posts/calendar?date=' + info.dateStr;
            },

            // hand pointer function
            dayCellClassNames: function () {
                return 'fc-day-pointer';
            }
        });

        calendar.render();
    });
}
