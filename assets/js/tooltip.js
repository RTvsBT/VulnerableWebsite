$(document).ready(function() {
	$('.info').each(function(ele) {
		if($(this).data('title') === "")
			return;

		var data = $(this).data('title');
		data = data.replace(/\&/g, '&amp;');
		data = data.replace(/\>/g, '&gt;');
		data = data.replace(/\</g, '&lt;');
		data = data.replace(/\{\|\}/g, '<br />');

		$(this).CreateBubblePopup({
			innerHtml: data,
			themeName: 'azure',
			themePath: pctx + '/static/jQuery/plugins/bubble/jquerybubblepopup-themes/',
			selectable: true
		});
	});
});

function escapeXml(string) {
	if(string == undefined || string == null || typeof string != "string"){
		return "";
	}
	var newstring;

	newstring = string.replace(/\&/g, '&amp;');
	newstring = newstring.replace(/\>/g, '&gt;');
	newstring = newstring.replace(/\</g, '&lt;');

	return newstring;
}

function showLoading() {
	$('#loading').show();
}

function hideLoading() {
	$('#loading').hide();
}