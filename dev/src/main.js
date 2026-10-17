import "jarallax/dist/jarallax.min.css";
import "@fancyapps/ui/dist/fancybox/fancybox.css";
//import "aos/dist/aos.css";
import "./scss/style.scss";
//!
import { Swiper } from "swiper/bundle";

import { jarallax } from "jarallax";
import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
//import AOS from "AOS";

import { AutoCalc } from "./js/AutoCalc.js";
import { Menu } from "./js/Menu.js";
//import { RunningLine } from './js/RunningLine.js';
//import { BackdropList } from './js/BackdropList.js';
import { Modal } from "./js/Modal.js";
//import { cookies } from "./js/Cookies.js";
//import { AnimationCounter } from "./js/AnimationCounter.js";
//import HiddenDescr from "./js/HiddenDescr.js";
//import HiddenList from "./js/HiddenList.js";
import { imask } from "./js/imask.js";
//import { fileBtn } from "./js/FileBtn.js";
//import { CustomFieldSelect } from "./js/CustomFieldSelect.js";
import { Spoiler } from "./js/Spoiler.js";
//import { ScrollToTop } from "./js/ScrollToTop.js";
import { MXSwiper } from "./js/MXSwiper.js";
//import { CustomSelect } from "./js/CustomSelect.js";
//import { Tabs } from './js/Tabs.js';
//import { MapScrollLock } from './js/MapScrollLock.js';
//import { cf7CustomValidation } from './js/cf7-validation.js';
//import { SelectFromAcf } from './js/SelectFromAcf.js';
//import { loadMore } from './js/loadMore.js';
//import AirDatepicker from 'air-datepicker';
//import 'air-datepicker/air-datepicker.css';
//document.querySelectorAll('input.form-input-date')?.forEach(input => {
//	new AirDatepicker(input, {
//		selectedDates: [new Date()],
//		isMobile: true,
//		autoClose: true,
//		minDate: new Date(),
//	});
//})
// time
//document.querySelectorAll('input.form-input-time')?.forEach(input => {
//	new AirDatepicker(input, {
//		isMobile: true,
//		autoClose: true,
//		timepicker: true,
//		onlyTimepicker: true
//	});
//})
//cf7CustomValidation();

// FOR CONTACTS FORM 7
//import "./js/redirect-to-thanks-page.js";

new AutoCalc();
//new CustomFieldSelect({
//	input: '.form-wrapper .cf-select',
//	lastEdit: false
//});
new Menu({
	btn: ".burger-btn", //.burger-btn-icon
	menu: ".header-menu",
	activeClass: "open-header-menu",
	closeBtns: ["a", ".cart-btn"],
});
//new Menu({
//	btn: '.filter-mobile-btn',
//	menu: '.filter',
//	activeClass: 'open-filter-menu',
//	closeBtns: ['.filter-close-btn']
//})
//new Menu({
//	btn: '.header__phone-btn', //.burger-btn-icon
//	menu: '.header-phone-box',
//	activeClass: 'open-phone-box',
//	//closeBtns: ['.menu-close-btn']
//})

//new BackdropList();

new Modal();

jarallax(document.querySelectorAll(".jarallax"), {
	speed: 0.2,
});

//cookies();
imask();

Fancybox.bind("[data-fancybox]", {
	placeFocusBack: false,
});

//new RunningLine();
//new ScrollToTop();

new Spoiler();

//new Spoiler('[data-spoiler]', {
//	onlyOneOpen: true,
//	activeClass: 'is-open',
//});

//new Spoiler('[data-spoiler]', { media: 'max-width: 768px' });

new MXSwiper();

//new Tabs();

//new CustomSelect({
//	selector: "select",
//	forceSend: true,
//});

//new MapScrollLock();
/*
window.addEventListener('scroll', function () {
	const header = document.querySelector('.header');

	if (window.scrollY > 50) {
		header.classList.add('scrolled');
	} else {
		header.classList.remove('scrolled');
		const valueUnits = header.offsetHeight;
		document.querySelector(':root').style.setProperty(`--header-height`, valueUnits + 'px');
	}
});
*/

//fileBtn(); //

//new Tabs();

//document.querySelectorAll('video.wp-video-shortcode').forEach(video => {
//	if (!video.src) {
//		const link = video.querySelector('a');
//		if (link) video.src = link.href;
//	}
//});

//document?.querySelectorAll('.wpcf7-acceptance input[type="checkbox"]')?.forEach(el => {
//	el.checked = true;
//})

//AOS.init({
//	disable: 'mobile',
//	duration: 600,
//	offset: 100
//});

//new SelectFromAcf('.custom-select-product', {
//	data: '.select-products-data'
//})

//loadMore();

//AnimationCounter();

//HiddenDescr();

//HiddenList();

document.addEventListener("DOMContentLoaded", () => {
	const calcContainer = document.getElementById("calc-calculator");
	if (!calcContainer) return;

	// Загружаем тарифы
	let tariffs = [];
	try {
		tariffs = JSON.parse(calcContainer.dataset.tariffs || "[]");
	} catch (e) {
		tariffs = [];
	}

	// Ссылки на поля калькулятора (у них есть id)
	const calcDist = calcContainer.querySelector("#calc-distance");
	const calcWeight = calcContainer.querySelector("#calc-weight");
	const calcResult = calcContainer.querySelector("#calc-result");

	// Функция поиска тарифа
	function findTariff(distance) {
		for (const t of tariffs) {
			const cond = t.condition;
			const from = parseFloat(t.distance_from);
			const to = parseFloat(t.distance_to);
			const price = parseFloat(t.price);

			if (isNaN(from) || isNaN(price)) continue;

			let match = false;
			switch (cond) {
				case "less":
					match = distance < from;
					break;
				case "less_or_equal":
					match = distance <= from;
					break;
				case "equal":
					match = distance === from;
					break;
				case "greater_or_equal":
					match = distance >= from;
					break;
				case "greater":
					match = distance > from;
					break;
				case "between":
					match = distance >= from && distance <= to;
					break;
			}
			if (match) return price;
		}
		return null;
	}

	// Универсальная функция: обновляет ВСЕ поля с указанным name на странице
	function syncFieldsByName(fieldName, value) {
		// Ищем все input и textarea с нужным атрибутом name (работает для CF7)
		const inputs = document.querySelectorAll(
			`input[name="${fieldName}"], textarea[name="${fieldName}"]`,
		);
		inputs.forEach((input) => {
			if (input.value !== value) {
				input.value = value;
			}
		});
	}

	// Единая функция пересчета и синхронизации
	function calculateAndSync() {
		const distance = parseFloat(calcDist.value) || 0;
		const weight = parseFloat(calcWeight.value) || 0;
		let resultValue = "";

		if (distance > 0 && weight > 0) {
			const price = findTariff(distance);
			if (price !== null) {
				const total = distance * weight * price;
				resultValue = total.toLocaleString("ru-RU", {
					minimumFractionDigits: 2,
					maximumFractionDigits: 2,
				});
			} else {
				resultValue = "—";
			}
		}

		// 1. Обновляем поле результата в калькуляторе
		if (calcResult) calcResult.value = resultValue;

		// 2. Синхронизируем ВСЕ формы на странице по атрибуту name
		syncFieldsByName("distance_km", calcDist.value);
		syncFieldsByName("weight_t", calcWeight.value);
		syncFieldsByName("cost_result", resultValue);
	}

	// Делегирование событий: слушаем ввод на ВЕСЬ документ
	document.addEventListener("input", (e) => {
		const target = e.target;
		const fieldName = target.name; // Получаем name поля, в котором печатают

		// Проверяем, является ли поле одним из наших целевых (по name для CF7 или по id для калькулятора)
		const isTargetField =
			fieldName === "distance_km" ||
			fieldName === "weight_t" ||
			fieldName === "cost_result" ||
			target.id === "calc-distance" ||
			target.id === "calc-weight";

		if (isTargetField) {
			// Шаг 1: Синхронизируем расстояние
			if (fieldName === "distance_km" || target.id === "calc-distance") {
				syncFieldsByName("distance_km", target.value);
				if (calcDist && target !== calcDist) calcDist.value = target.value;
			}

			// Шаг 2: Синхронизируем вес
			if (fieldName === "weight_t" || target.id === "calc-weight") {
				syncFieldsByName("weight_t", target.value);
				if (calcWeight && target !== calcWeight)
					calcWeight.value = target.value;
			}

			// Шаг 3: Пересчитываем итоговую стоимость и обновляем все поля cost_result
			calculateAndSync();
		}
	});

	// Инициализация при загрузке (на случай, если браузер автозаполнил поля)
	calculateAndSync();
});
