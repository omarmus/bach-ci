$(document).ready(function(){
	$(".fancy_title").lettering();

	$('#tab-files a').click(function (e) {
		e.preventDefault();
		$(this).tab('show')
	});

});

function set_event_articles ($elements) {
	$elements.on('click', function() {
		show_loading();
		$.get(base_url_ + 'article/get_article/' + $(this).data('role'), function(data) {
			hide_loading();
			$('#main-modal').modal();
			$('#main-modal-container').html(data);
			FB.XFBML.parse();
		});
	});
}

function show_loading () {
	var loading = document.createElement('div');
    loading.className = loading.id = "panel-shadow";
    var img = document.createElement('img');
    img.src = base_url_ + 'assets/img/spinner.gif';
    loading.appendChild(img);
    document.body.appendChild(loading);
}

function hide_loading () {
	document.body.removeChild(document.getElementById('panel-shadow'));
}

function nano(template, data) {
  return template.replace(/\{([\w\.]*)\}/g, function(str, key) {
    var keys = key.split("."), v = data[keys.shift()];
    for (var i = 0, l = keys.length; i < l; i++) v = v[keys[i]];
    return (typeof v !== "undefined" && v !== null) ? v : "";
  });
}
