$(function() {
	$('select').change(function() {
		var select_id = $(this).attr('id');
		if(select_id == 'Sollicitant.fysiekeEigenschappen.bril') {
			$('tr.ogen').toggle();
		} else if(select_id == 'Sollicitant.militairGeschiedenis.militairGeweest') {
			$('tr.militair').toggle();
		}
	});
	
	if(typeof String.prototype.trim !== 'function') {
		String.prototype.trim = function() {
			return this.replace(/^\s+|\s+$/g, ''); 
		}
	}
	/*
	 =Checkbox
	 ------------------------------------------------------------ */
	$("input[type=checkbox]:checked").parent().addClass("is-checked");
	$("input[type=checkbox]").click(function() {
		$(this).parent().toggleClass("is-checked");
	}).focus(function() {
		$(this).parent().addClass('tab-focus').addClass('custom-focus');
	}).blur(function() {
		$(this).parent().removeClass('tab-focus').removeClass('custom-focus');
	});

	/*
	 =Toggle info
	 ------------------------------------------------------------ */
	$(".data-toggle-info").hide();
	$(".data-toggle-container input[type=radio]").click(function() {
		var d = $(this).data("toggle");
		d === "show" ? $(".data-toggle-info").show() : $(".data-toggle-info").hide()
	});

	// btn show/hide fieldset form filter
	$('a.btn-show-hide.is-inactive').siblings('p').hide();
	$('a.btn-show-hide').click(function(e){
	    e.preventDefault();
		$(this).siblings('p').slideToggle(40);
		$(this).toggleClass('is-inactive');
	});
	
	/*
	 =Extra infovelden
	 ------------------------------------------------------------ */
	$('.extra-info').hide();
	$('.custom-radiobutton').click(function() {
		if ($(this.checked)) {
			$('.extra-info').toggle();
		}
	});


	//Tab focus nav-primary
	$(function() {
		$('.lvl-0').setup_navigation();
	});

	$.fn.setup_navigation = function(settings) {
		settings = jQuery.extend({
			menuHoverClass: 'show-menu'
		}, settings);

		$(this).find('> li > a').hover(function() {
			$(this).closest('ul').find('.' + settings.menuHoverClass).removeClass(settings.menuHoverClass);
		});
		$(this).find('> li > a').focus(function() {
			$(this).closest('ul').find('.' + settings.menuHoverClass).removeClass(settings.menuHoverClass);
			$(this).next('ul').addClass(settings.menuHoverClass);
		});
		// Hide menu if click occurs outside of navigation
		// Hide menu if click or focus occurs outside of navigation
		$(this).find('a').last().keydown(function(e) {
			if (e.keyCode == 9) {
				// If the user tabs out of the navigation hide all menus
				$('.' + settings.menuHoverClass).removeClass(settings.menuHoverClass);
			}
		});
		$(document).click(function() {
			$('.' + settings.menuHoverClass).removeClass(settings.menuHoverClass);
		});
		$(this).click(function(e) {
			e.stopPropagation();
		});
	};
	
	// modal form vizier inloggen - reset password show/hide
	$('#login-option-reset-password').hide();
	$('#login-reset-password').click(function(e) {
		$("#login-option-email").hide();
		$("#login-option-reset-password").toggle();
		$("#login-reset-email").focus();
		$("#login-reset-email").val('');
//		$('#loginform').attr('action', pctx + '/wachtwoord-vergeten');
		e.preventDefault();
	});
	// modal form vizier inloggen - cancel reset password
	$('#login-reset-password-cancel').click(function(e) {
		$("#login-option-email").toggle();
		$("#login-option-reset-password").hide();
//		$('#loginform').attr('action', pctx + '/j_spring_security_check');
		e.preventDefault();
	});

});

var entityMap = {
	'&': '&amp;',
	'<': '&lt;',
	'>': '&gt;',
	'"': '&quot;',
	"'": '&#39;',
	'/': '&#x2F;',
	'`': '&#x60;',
	'=': '&#x3D;'
};

function escapeHtml (string) {
	return String(string).replace(/[&<>"'`=\/]/g, function (s) {
		return entityMap[s];
	});
}

function closeModal() {
	$('body').removeClass('modal-is-open');
}

function openModal(href, params, templateParams) {
	var url = href;

	if (params && typeof params === 'object') {
		url = href + '?' + $.param(params);
	}

	$.ajax({
		type: "GET",
		url: url,
		contentType:"application/json; charset=utf-8",
		dataType:"html",
		success: function(response) {
			if (templateParams) {
				var tempFn = doT.template(response);
				response = tempFn(templateParams);
			}

			var $response = $(response);
			$('.js-modal-content').html($response);

			// re-init selects
			$('.modal').find('select').select();

			// re-init form validation
			if($('.js-form-validate-modal').length){
				$('.js-form-validate-modal').parsley({
					successClass: 'is-succes',
					errorClass: 'is-error',
					errorsWrapper: '<ul class="form__error__list"></ul>'
				});

				$.listen('parsley:field:validate', function () {
					validateMsg();
				});

				$('.js-form-submit-modal').on('click', function () {
					$('.js-form-validate-modal').parsley().validate();
					validateMsg();
				});

				var validateMsg = function () {
					if (true === $('.js-form-validate-modal').parsley().isValid()) {
						$('.form .js-error').addClass('is-hidden');
					} else {
						$('.form .js-error').removeClass('is-hidden');
					}
				};
			}

		}
	});

	$('body').addClass('modal-is-open');
}

function openMessageModal(templateParams) {
	return openModal(pctx + '/public/modal/generiek_melding', null, templateParams || {});
}

function openErrorModal(templateParams) {
	return openModal(pctx + '/public/modal/generiek_foutmelding', null, templateParams || {});
}

$.fn.nowAndOn = function() {
	this.on.apply(this, arguments);

	var fnArg = null;
	for (var i = 0; i < arguments.length; i++) {
		if (typeof arguments[i] === 'function') {
			fnArg = arguments[i];
		}
	}

	if (fnArg !== null) {
		fnArg.call(this);
	}
};