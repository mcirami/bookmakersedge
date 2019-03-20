
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});*/



jQuery(document).ready(function($) {

	$(window).on('resize', function () {

		var mobileMenuIcon = $('.mobile_menu_icon');
		if ($(window).width() > 768) {

			if(mobileMenuIcon.hasClass('open')) {
				$('.wrapper').removeClass('slide');
				$('#global_header').removeClass('slide');
				mobileMenuIcon.removeClass('open');
				$('#navbarNav').removeClass('open');
				$('body, html').css('overflow-y', 'auto');
			}

			var dropdownLink = $('.dropdown.top a');

			if(dropdownLink.hasClass('open')) {
				dropdownLink.removeClass('open');
				$('.dropdown.top').removeClass('show');
				$('.dropdown-menu').removeClass('show')
			}
		} else {
			mobileSubMenu();
		}

	});

	/* Selecting Payment Type */

	if($('.checkout_options').length > 0) {

		var creditCardCheck = $('#credit_card_check');
		var paypalCheck = $('#paypal_check');

		var paypalWrap = $('.paypal_wrap');
		var creditCardWrap = $('.credit_card_wrap');

		var creditCardDiv = $('#credit_card_form');
		var html = creditCardDiv.html();

		creditCardCheck.prop('checked', true).addClass('active');
		paypalWrap.css('display', 'none');

		$('.radio_checkout').on('click', function(){
			$('.radio_checkout').removeClass('active');
			$(this).addClass('active');

			if(creditCardCheck.hasClass('active')) {
				creditCardWrap.css('display', 'block');
				//$('#credit_card_check').addClass('active');
				creditCardDiv.append(html);
				paypalWrap.css('display', 'none');
			} else if(paypalCheck.hasClass('active')) {
				paypalWrap.css('display', 'block');
				creditCardDiv.empty();
				creditCardWrap.css('display', 'none');
			}
		});
	}

	/*****************************/


	/* Animate Header On Scroll */

	$(window).on('scroll', function (event) {
		if ($(window).scrollTop() > 40) {
			$('.header_top,.menu,#global_header .logo,ul.member_menu > li').addClass('scroll');
			$('.header_bottom').addClass('home_background');
		} else {
			$('.header_top,.menu,#global_header .logo,ul.member_menu > li').removeClass('scroll');
			$('.header_bottom').removeClass('home_background');
		}
	});

	if ($(window).scrollTop() > 40) {
		$('.header_top,.menu,#global_header .logo,ul.member_menu > li').addClass('scroll');
		$('.header_bottom').addClass('home_background');
	}

	/*****************************/

	/* Mobile menu */

	$('.mobile_menu_icon').on('touchstart click', function (e) {
		e.preventDefault();

		if($(this).hasClass('open')) {
			$('body, html').css('overflow-y', 'auto');
			window.setTimeout(function () {
				$('#navbarNav').toggleClass('open');
			}, 800);
		} else {

			$('body, html').css('overflow-y', 'hidden');
			$('#navbarNav').toggleClass('open');
		}

		$(this).toggleClass('open');
		$('.wrapper').toggleClass('slide');
		$('#global_header').toggleClass('slide');


	});

	$('.wrapper.slide').click(function () {
		$('.mobile_menu_icon').toggleClass('open');
		$('.wrapper').toggleClass('slide');
	});

	if ($(window).width() < 768) {
		mobileSubMenu();
	}

	/*****************************/

	// Reports Accordion

	$('.open_accordion').click(function(){
		$('.open_accordion').removeClass('open');
		if(!$(this).closest('.day').children('.picks_wrap').hasClass('show')) {
			$(this).addClass('open');
		} else {
			$(this).removeClass('open');
		}
	});

	/*****************************/

	// Submit picks form

	var pickCount = document.getElementsByClassName('pick_content').length;

	$('#add_pick').click(function(e){
		e.preventDefault();
		++pickCount;

		const html =
			"<div class='form-group my_row d-block d-sm-flex align-content-center pick_content'>" +
				"<div class='icon_wrap mt-auto mb-4 mb-sm-auto ml-auto mr-0'>" +
					"<h3>" + pickCount + "</h3>" +
				"</div>" +
				"<div class='info_wrap m-auto d-block d-sm-flex justify-content-between'>" +
					"<div class='column'>" +
						"<label for='sport" + pickCount + "' class='col-form-label'>Sport</label>" +
						"<select class='form-control' name='pick_" + pickCount + "[sport]' id='sport" + pickCount + "' required>" +
							"<option value=''></option>" +
							"<option value='NFL'>NFL</option>" +
							"<option value='NCAAF'>NCAAF</option>" +
							"<option value='NBA'>NBA</option>" +
							"<option value='NCAAB'>NCAAB</option>" +
							"<option value='MLB'>MLB</option>" +
							"<option value='NHL'>NHL</option>" +
							"<option value='GOLF'>GOLF</option>" +
						"</select>" +
					"</div>" +
					"<div class='column'>" +
						"<label for='team" + pickCount + "' class='col-form-label'>Team</label>" +
						"<input id='team" + pickCount + "' type='text' class='form-control' name='pick_" + pickCount + "[team]' value='' required autofocus />" +
					"</div>" +
					"<div class='column'>" +
						"<label for='line" + pickCount + "' class='col-form-label'>Line</label>" +
						"<input id='line" + pickCount + "' type='text' class='form-control' name='pick_" + pickCount + "[line]' value='' required autofocus />" +
					"</div>" +
					"<div class='column'>" +
						"<label for='time" + pickCount + "' class='col-form-label'>Game Time (EST)</label>" +
						"<input id='time" + pickCount + "' type='text' class='timepicker form-control' name='pick_" + pickCount +  "[game_time]' required autofocus/>" +
					"</div>" +
				"</div>" +
			"</div>";

		$('.picks_wrap').append(html);

		$("#time" + pickCount).timepicker({
			'minTime': '7:00am',
			'maxTime': '12:00am',
			'step' : '15',
		});

	});

	$('#remove_pick').click(function(e){
		e.preventDefault();

		if(pickCount !== 1) {
			--pickCount;
			$('.pick_content').last().remove();

		} else {
			alert("You Must Submit At Least 1 Pick");
		}
	});

	$('.timepicker').timepicker({
		'minTime': '7:00am',
		'maxTime': '12:00am',
		'step' : '15',
	});

	/*****************************/

	// More Info Button

		$('.more_info').click(function(e) {
			e.preventDefault();
			$('html,body').animate({scrollTop: $(this).offset().top}, 500)
		});

	/*****************************/

	/* FUNCTIONS */

	function mobileSubMenu() {
		$('.dropdown.top a').click(function() {
			if (!$(this).parent().hasClass('show')) {
				$(this).addClass('open');
				$(this).parent().addClass('show');
				$(this).next('.dropdown-menu').addClass('show');
			} else {
				$(this).removeClass('open');
				$(this).parent().removeClass('show');
				$(this).next('.dropdown-menu').removeClass('show');
			}
		});

		$('.dropdown.lower a').click(function() {
			if (!$(this).hasClass('open')) {
				$(this).addClass('open');
			} else {
				$(this).removeClass('open');
			}
		});
	}

	/*****************************/



});
