/* Календарь */

// Подключение списка активных модулей
import { flsModules } from "../modules.js";

// Подключение модуля
import datepicker from 'js-datepicker';


(()=>{
	const pickers = document.querySelectorAll('[data-datepicker]');

	if (pickers.length === 0) {
		return false;
	}

	const pickerProjFrom = datepicker('[data-datepicker_proj_from]', {
		customDays: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
		customMonths: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
		overlayButton: 'Применить',
		overlayPlaceholder: 'Год (4 цифры)',
		startDay: 1,
		formatter: (input, date, instance) => {
			const value = date.toLocaleDateString()
			input.value = value
		},
		onSelect: function (input, instance, date) {
	
		}
	});

	const pickerProjTo = datepicker('[data-datepicker_proj_to]', {
		customDays: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
		customMonths: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
		overlayButton: 'Применить',
		overlayPlaceholder: 'Год (4 цифры)',
		startDay: 1,
		formatter: (input, date, instance) => {
			const value = date.toLocaleDateString()
			input.value = value
		},
		onSelect: function (input, instance, date) {
	
		}
	});
	
	const pickerPartner = datepicker('[data-datepicker_partner_1]', {
		customDays: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
		customMonths: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
		overlayButton: 'Применить',
		overlayPlaceholder: 'Год (4 цифры)',
		startDay: 1,
		formatter: (input, date, instance) => {
			const value = date.toLocaleDateString()
			input.value = value
		},
		onSelect: function (input, instance, date) {
	
		}
	});
	//flsModules.datepicker = picker;
})();
