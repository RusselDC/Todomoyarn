/*!
FullCalendar Core v6.0.3
Docs & License: https://fullcalendar.io
(c) 2022 Adam Shaw
*/
(function (index_js) {
    'use strict';

    var locale = {
        code: 'ar-dz',
        week: {
            dow: 0,
            doy: 4, // The week that contains Jan 1st is the first week of the year.
        },
        direction: 'rtl',
        buttonText: {
            prev: 'السابق',
            next: 'التالي',
            today: 'اليوم',
            month: 'شهر',
            week: 'أسبوع',
            day: 'يوم',
            list: 'أجندة',
        },
        weekText: 'أسبوع',
        allDayText: 'اليوم كله',
        moreLinkText: 'أخرى',
        noEventsText: 'أي أحداث لعرض',
    };

    index_js.globalLocales.push(locale);

})(FullCalendar);
