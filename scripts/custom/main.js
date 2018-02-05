/*
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/
(function($) {

	skel.breakpoints({
		wide: '(max-width: 1680px)',
		normal: '(max-width: 1280px)',
		narrow: '(max-width: 980px)',
		narrower: '(max-width: 840px)',
		mobile: '(max-width: 736px)',
		mobilep: '(max-width: 480px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body'),
			$header = $('#header'),
			$banner = $('#banner');

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on narrower.
			skel.on('+narrower -narrower', function() {
				$.prioritize(
					'.important\\28 narrower\\29',
					skel.breakpoint('narrower').active
				);
			});

		// Dropdowns.
			$('#site-navigation > .menu-mainnav-container > ul').dropotron({
				alignment: 'right'
			});

		// Off-Canvas Navigation.
		// Manually Placed Navigation Button and Navigation Panel in footer.php
		// This will allow for the wp_nav_menu to be called and dynamically generate the menu
		$('#navPanel').panel({
			delay: 500,
			hideOnClick: true,
			hideOnSwipe: true,
			resetScroll: true,
			resetForms: true,
			side: 'left',
			target: $body,
			visibleClass: 'navPanel-visible'
		});


		// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
		if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
			$('#navButton, #navPanel, #page-wrapper').css('transition', 'none');

		// Header.
		// If the header is using "alt" styling and #banner is present, use scrollwatch
		// to revert it back to normal styling once the user scrolls past the banner.
		// Note: This is disabled on mobile devices.
		if (!skel.vars.mobile
		&&	$header.hasClass('alt')
		&&	$banner.length > 0) {

			$window.on('load', function() {

				$banner.scrollwatch({
					delay:		0,
					range:		0.5,
					anchor:		'top',
					on:			function() { $header.addClass('alt reveal'); },
					off:		function() { $header.removeClass('alt'); }
				});

			});

		}

		// Copywrite Year
		var copyYear = document.getElementById('copyYear');
		copyYear.innerHTML = new Date().getFullYear();

		// Parsley Form
		/* date helper */
		const date = new Date();
		const formattedDate = `${date.getMonth() + 1}/${date.getDate()}/${date.getFullYear()}`;
		const dateLabel = document.querySelector('[for="date"]');
		const dateInput = document.querySelector('[name="date"]');
		if (dateLabel) {
			dateLabel.innerHTML += formattedDate;
			dateInput.value = formattedDate;
		}

		/* pagely file size and mime type extention */
		var app = app || {};

		// Utils
		(function ($, app) {
			'use strict';

			app.utils = {};

			app.utils.formDataSuppoerted = (function () {
				return !!('FormData' in window);
			}());

		}(jQuery, app));
		(function ($, app) {
			'use strict';
		window.Parsley
			.addValidator('filemaxmegabytes', {
				requirementType: 'string',
				validateString: function (value, requirement, parsleyInstance) {

					if (!app.utils.formDataSuppoerted) {
						return true;
					}

					var file = parsleyInstance.$element[0].files;
					var maxBytes = requirement * 1048576;

					if (file.length == 0) {
						return true;
					}

					return file.length === 1 && file[0].size <= maxBytes;

				},
				messages: {
					en: 'File is to big'
				}
			})
			.addValidator('filemimetypes', {
				requirementType: 'string',
				validateString: function (value, requirement, parsleyInstance) {

					if (!app.utils.formDataSuppoerted) {
						return true;
					}

					var file = parsleyInstance.$element[0].files;

					if (file.length == 0) {
						return true;
					}

					var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
					return allowedMimeTypes.indexOf(file[0].type) !== -1;

				},
				messages: {
					en: 'File mime type not allowed'
				}
			});
		}(jQuery, app));

		/* form pagination */
		$(function () {
			/* mulit-step form */
			var $sections = $('.form-section');

			function navigateTo(index) {
				// Mark the current section with the class 'current'
				$sections
					.removeClass('current')
					.eq(index)
					.addClass('current');

				// Show only the navigation buttons that make sense for the current section:
				$('.form-navigation .previous').toggle(index > 0);
				var atTheEnd = index >= $sections.length - 1;
				$('.form-navigation .next').toggle(!atTheEnd);
				$('.form-navigation [type=submit]').toggle(atTheEnd);
			}

			function curIndex() {
				// Return the current index by looking at which section has the class 'current'
				return $sections.index($sections.filter('.current'));
			}

			// Previous button is easy, just go back
			$('.form-navigation .previous').click(function () {
				navigateTo(curIndex() - 1);
			});

			// Next button goes forward iff current block validates
			$('.form-navigation .next').click(function () {
				$('#form').parsley().whenValidate({
					group: 'block-' + curIndex()
				}).done(function () {
					navigateTo(curIndex() + 1);
				});
			});

			// Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
			$sections.each(function (index, section) {
				$(section).find(':input').attr('data-parsley-group', 'block-' + index);
			});

			navigateTo(0); // Start at the beginning
		});

		// ajax submit is in separate js file ajax_formSubmit.js
	});

})(jQuery);