import datepicker from './datepicker-full.min';

(() => {
    const datepickerBlock = document.querySelector('[data-datepicker-from]');

    if (!datepickerBlock) {
        return;
    }


    const fromDateInput = document.querySelector('[data-datepicker-from]');
    const toDateInput = document.querySelector('[data-datepicker-to]');

    function parseMonthFromInput(input) {
        
        // Разделите значение на день, месяц и год
        const parts = input.value.split(".");
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        return new Date(year,month,day);
    }

    const fromDate = parseMonthFromInput(fromDateInput);
    const toDate = parseMonthFromInput(toDateInput);
    
    const pickerFrom = datepicker('[data-datepicker-from]', {
        customDays: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
        customMonths: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
        overlayButton: 'Применить',
        overlayPlaceholder: 'Введите год',
        startDay: 1,
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString()
            input.value = value
        },
        onSelect: function (input, instance, date) {

        },
        onShow: function (input, instance, date) {
            let value = input.value

            input.value = value
        },
        id: 1,
    });
    
    const pickerTo = datepicker('[data-datepicker-to]', {
        customDays: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
        customMonths: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
        overlayButton: 'Применить',
        overlayPlaceholder: 'Введите год',
        startDay: 1,
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString()
            input.value = value
        },
        onSelect: function (input, instance, date) {
        },
        id: 1
    });

    if (fromDateInput.value != '') {
        pickerFrom.setDate(fromDate, true)
        
    }

    if (toDateInput.value != '') {
        pickerTo.setDate(toDate, true)

    }

})()
