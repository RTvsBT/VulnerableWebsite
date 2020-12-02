function isBSNValid(value) {
	checksum = 0;
	if (isNaN(value) || value.length !== 9) {
		return false;
	} else {
		for (i = 0; i < 8; i++) {
			checksum += (value.charAt(i) * (9 - i));
		}
		checksum -= value.charAt(8);
		if (checksum % 11 !== 0) {
			return false;
		}
	}
	return true;
}

$(document).ready(function() {

	//============================================================================================

	// Overwrite email to allow trim
	$.validator.addMethod("email", function(value, element) {
		value = value.trim();
		$(element).val(value);
		return this.optional(element) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value);
	}, "Please enter a valid email.");

	$('.custom-datepicker input[id^="dat"]').click(function() {
		datePickerController.show($(this).attr('id'));
	});
	$('.custom-datepicker2 input[id^="dat"]').click(function() {
		datePickerController.show($(this).attr('id'));
	});
	
	// Mask voor alle voorletters velden
	$(".voorletters")
		.mask("a?.a.a.a.a")
		.blur(function() {
			$(this).val($(this).val().toUpperCase());
		})

	function checkForSelectChanges() {
		$('select').each(function(index, ele) {
			if ($(ele).hasClass('is-error')) {
				$('a.selectBox', $(ele).parent()).addClass('is-error');
			} else
				$('a.selectBox', $(ele).parent()).removeClass('is-error');
		});

		setTimeout(checkForSelectChanges, 100);
	}
	function checkForRadioAndCheckboxChanges() {
		$('input[type=radio], input[type=checkbox]').each(function(index, ele) {
			if ($(ele).hasClass('is-error')) {
				$(ele).parent().addClass('is-error');
			} else
				$(ele).parent().removeClass('is-error');
		});

		setTimeout(checkForRadioAndCheckboxChanges, 100);
	}
	function checkForFileChanges() {
		$('input[type=file]').each(function(index, ele) {
			if ($(ele).hasClass('is-error')) {
				$(ele).closest('.form-upload').addClass('is-error');
			} else
				$(ele).closest('.form-upload').removeClass('is-error');
		});
		setTimeout(checkForFileChanges, 100);
	}
	checkForRadioAndCheckboxChanges();
	checkForSelectChanges();
	checkForFileChanges();

	if ($('#afterlist').text().trim().length > 0)
		$('#aftererror').show();

	$('input[type=file]').change(function() {
		$('.form-upload__input', $(this).closest('.form-upload')).text($(this).val().substr(12,500));
	});

	// MESSAGES
	$.extend($.validator.messages, {
		required: 'Dit veld is vereist',
		remote: "Dit veld is niet correct ingevuld.",
		email: "Vul een geldig email adres in.",
		url: "Vul een geldige webiste in.",
		nldate: "Vul een geldige datum in (dd-mm-jjjj).",
		dateISO: "Vul een geldige datum in.",
		number: "Vul een geldig nummer in.",
		digits: "vul alleen nummers in.",
		creditcard: "Vul een geldig creditcardnummer in.",
		equalTo: "Wachtwoord is niet hetzelfde.",
		accept: "Voor documenten worden alleen Word(.doc), OpenOffice(.odt) en PDF bestanden geaccepteerd.",
		maxlength: jQuery.validator.format("Vul een maximale geldige lengte in van {0} characters."),
		minlength: jQuery.validator.format("Vul een minimale geldige lengte in van {0} characters."),
		rangelength: jQuery.validator.format("Vul een geldige waarde met de lengte in tussen {0} en {1} characters."),
		range: jQuery.validator.format("Vul een geldige waarde in tussen {0} en {1}."),
		max: jQuery.validator.format("Vul een geldige waarde in die maximaal {0} is."),
		min: jQuery.validator.format("Vul een geldige waarde in die minimaal {0} is."),
		iban: "voer een geldig IBAN nummer in"
	});

	// DEFAULTS
	$.validator.setDefaults({
		errorContainer: "#error-box-list",
		errorLabelContainer: "#error-box-list",
		wrapper: "li",
		errorClass: 'is-error',
		showErrors: function() {
			var errors = this.numberOfInvalids();
			if (errors > 0) {
				var message = errors === 1 ? 'Controleer het volgende veld:' : 'Controleer de volgende ' + errors + ' velden:';
				$("div#error-box #generalmessage").text(message);
				$("div#error-box").show();
			} else {
				$("div#error-box").hide();
			}
			this.defaultShowErrors();
		}
	});

	// reset date field
	$.validator.addMethod('date', function(value, element) {
		if (value.length === 0)
			return true;
		return value.match(/^\d{2}-\d{2}-\d{4}$/);
	}, 'Vul een geldige datum in (dd-mm-jjjj).');
	$.validator.addMethod("tijd", function(value, element) {
		if (value.length === 0)
			return true;
		return value.match(/^\d{1,2}:\d{2}$/);
	}, "vul een geldige tijd in (uu:mm).");
	$.validator.addMethod("notempty", function(value, element) {
		if (value.length === 0 || value === "" || value === 0 || value.match(/^0[\.]0*$/ || value === null || value === undefined))
			return false;
		return true;
	}, "Veld mag niet leeg zijn of een alleen 0 bevatten");

	$.validator.addMethod("numbersanity", function(value, element) {
		if (value.length === 0)
			return true;

		var same = value.charAt(0);
		var samestill = true;
		var followingup = true;
		for (var i = 1; i < value.length; i++) {
			if (samestill && value.charAt(i) !== same)
				samestill = false;

			if (followingup && value.charAt(i) !== (parseInt(same) + parseInt(1)))
				followingup = false;
			same = value.charAt(i);
		}

		if (samestill || followingup)
			return false;
		return true;

	}, 'Vul alstublieft een geldige waarde in');

	$.validator.addMethod("bsn", function(value, element) {
		if (value.length === 0)
			return true;

		return isBSNValid(value);
	}, "Dit lijkt geen correct burgerservicenummer te zijn.");

	$.validator.addMethod("nofuture", function(value, element) {
		if (value.length === 0)
			return true;

		var parts = value.match(/(\d{2})\-(\d{2})\-(\d{4})/);
		var date = new Date(parts[3], parts[2]-1, parts[1]);
		return (date < new Date());
	}, "De datum mag niet in de toekomst liggen.");

	$.ajaxSetup({
		beforeSend: function(xhr) {
			var token = $("meta[name='_csrf']").attr("content");
			var header = $("meta[name='_csrf_header']").attr("content");
			xhr.setRequestHeader(header, token);
		}
	});

	$('[data-href]').click(function(){
		var href = $(this).data('href');
		if (href) {
			window.location.href = $(this).data('href');
		}
	});

	function isValidIBANNumber(input) {
		var CODE_LENGTHS = {
			AD: 24, AE: 23, AT: 20, AZ: 28, BA: 20, BE: 16, BG: 22, BH: 22, BR: 29,
			CH: 21, CR: 21, CY: 28, CZ: 24, DE: 22, DK: 18, DO: 28, EE: 20, ES: 24,
			FI: 18, FO: 18, FR: 27, GB: 22, GI: 23, GL: 18, GR: 27, GT: 28, HR: 21,
			HU: 28, IE: 22, IL: 23, IS: 26, IT: 27, JO: 30, KW: 30, KZ: 20, LB: 28,
			LI: 21, LT: 20, LU: 20, LV: 21, MC: 27, MD: 24, ME: 22, MK: 19, MR: 27,
			MT: 31, MU: 30, NL: 18, NO: 15, PK: 24, PL: 28, PS: 29, PT: 25, QA: 29,
			RO: 24, RS: 22, SA: 24, SE: 24, SI: 19, SK: 24, SM: 27, TN: 24, TR: 26
		};
		var iban = String(input).toUpperCase().replace(/[^A-Z0-9]/g, ''), // keep only alphanumeric characters
				code = iban.match(/^([A-Z]{2})(\d{2})([A-Z\d]+)$/), // match and capture (1) the country code, (2) the check digits, and (3) the rest
				digits;
		// check syntax and length
		if (!code || iban.length !== CODE_LENGTHS[code[1]]) {
			return false;
		}
		// rearrange country code and check digits, and convert chars to ints
		digits = (code[3] + code[1] + code[2]).replace(/[A-Z]/g, function (letter) {
			return letter.charCodeAt(0) - 55;
		});
		// final check
		return mod97(digits) === 1;
	}
	function mod97(string) {
		var checksum = string.slice(0, 2), fragment;
		for (var offset = 2; offset < string.length; offset += 7) {
			fragment = String(checksum) + string.substring(offset, offset + 7);
			checksum = parseInt(fragment, 10) % 97;
		}
		return checksum;
	}

	window.ParsleyValidator.addValidator('iban', {
		requirementType: 'string',
		validateString: function(value, requirement) {
			return isValidIBANNumber(value);
		},
		messages: {
			nl : "Dit is geen geldig IBAN.",
			en : "This is not a valid IBAN.",
		}
	});
	window.ParsleyValidator.addValidator('bsn', {
		requirementType: 'string',
		validateString: function(value, requirement) {
			if (value.length != 9)
				return $.Deferred().reject("Een bsn bestaat uit 9 cijfers.");
			return isBSNValid(value);
		},
		messages: {
			nl : "Dit is geen geldig BSN.",
			en : "This is not a valid BSN.",
		}
	});

	window.ParsleyValidator.addValidator('maxFileSize', {
		requirementType: 'integer',
		validateString: function(_value, maxSize, parsleyInstance) {
			if (!window.FormData) {
				alert('Please upgrade your browser!');
				return true;
			}
			var files = parsleyInstance.$element[0].files;
			return files.length != 1  || files[0].size <= maxSize * 1024 * 1024;
		},
		messages: {
			nl: 'Dit bestand mag niet groter zijn dan %s Mb',
			en: 'This file should not be larger than %s Mb',
			fr: 'Ce fichier est plus grand que %s Mb.'
		}
	});
});
