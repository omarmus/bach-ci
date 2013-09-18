var oTable;

$(document).ready(function() {
	oTable = $('#main-table').dataTable();
});

$('header .dropdown-menu').filter(function () {
	if ($(this).find('li').length == 0) {
		$(this).parent().hide();
	}
});

// Data table
$.extend( true, $.fn.dataTable.defaults, {
	"sDom": "<'row'<'col-xs-6 col-md-9'><'col-xs-6 col-md-3'l>r>t<'row'<'col-xs-6 col-md-4'i><'col-xs-6 col-md-8'p>>",
	"bFilter": false,
	"sPaginationType": "full_numbers",
	"aoColumnDefs" : [
		{"bVisible": false, "aTargets": [ 0 ]}, 
		{"bSortable": false, "aTargets": [ 1 ] }
	],
	// "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"oLanguage": {
        "sLengthMenu": "Rows _MENU_",
        "sZeroRecords": "Nothing found - sorry",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
        "sInfoEmpty": "Showing 0 to 0 of 0 records",
        "oPaginate": {
	        "sNext": "&raquo;",
	        "sPrevious": "&laquo;"
	    }
    },
    "fnInitComplete" : function() {
    	var that = this,
			firstTH = $(that).find('th')[0],
			th = document.createElement('th');
    	th.innerHTML = "<i></i>";
    	th.className = "check-all";
    	th.onclick = function () {
    		var toggle = (that.$('tr').length == that.$('tr.active').length?'remove':'add') + 'Class';
    		$(firstTH).parent()[toggle]('all-selected');
    		that.$('tr')[toggle]('active');
    		var now = that.$('tr.active').length;
    		$('#delete-rows')[(now?'remove':'add') + 'Class']('disabled');
    		$($(that).parent().find('.row .col-md-9')[0]).html(now?'<span class="label label-warning"><strong>'+now+'</strong> row'+(now>1?'s':'')+' selected.</span>':'');
    	}
		$(firstTH).parent().prepend(th);
		if (that.$('tr').length == 0) {
			$(that).find('td').prop('colspan', $(that).find('td').prop('colspan') + 1);
		}
		that.$('tr').each(function () {
			var firstTD = this;
	    	var td = document.createElement('td');
	    	td.className = "check-item";
	    	td.innerHTML = '<i></i>';
	    	td.onclick = function () {
	    		$(firstTD).toggleClass('active');
	    		var now = that.$('tr.active').length;
	    		$(firstTH).parent()[(that.$('tr').length == now?'add':'remove') + 'Class']('all-selected');
	    		$('#delete-rows')[(now?'remove':'add') + 'Class']('disabled');
	    		$($(that).parent().find('.row .col-md-9')[0]).html(now?'<span class="label label-warning"><strong>'+now+'</strong> row'+(now>1?'s':'')+' selected.</span>':'');
	    	}
	    	$(firstTD).prepend(td);
		})
    }
});

function delete_selected (oTable, url, refresh) {
	var pks = getPks(oTable);
	if (pks.length) {
		if (confirm("You are about to delete a record. This cannot be undone. Are you sure?")) {
			$.post(url, {pks: pks}, function (response) {
				deleteRows(oTable);
				message_ok('Delete!');
				$('#delete-rows').addClass('disabled');
				$(oTable.find('th')[0]).parent().removeClass('all-selected');
				$(oTable.parent().find('.row .col-md-9')[0]).html('');
				if (refresh) {
					setTimeout(function () {
						window.location = '';
					}, 500);
				}
			});
		}
	}
}

function deleteRows(oTable){
	var anSelected = oTable.$('tr.active');
	if (anSelected.length) {
		anSelected.each(function (index) {
			deleteRow(oTable, this);
		})
	}
}

function deleteRow (oTable, td) {
	oTable.fnDeleteRow( td )
}

function getPks(oTable) {
	var pks = [];
	oTable.$('tr.active').each(function () {
		pks.push(oTable.fnGetData(this)[0]);
	});
	return pks;
}

function addRow(oTable, data) {
    oTable.fnAddData(data);
}

function show_modal (url, callback_function) {
	show_loading();
	$('#main-modal .modal-content').load(url, function () {
		hide_loading();
		var input = $('#main-modal').modal().find('input[type=text]').get(0);
		if (input) {
			setTimeout(function () {input.focus()}, 500);
		}
		if (callback_function) {
            callback_function.apply(window);
        }
	});
}

function hide_modal() {
	$('#main-modal').modal('hide');
}

function validate (form, url, callback_error) {
	show_loading();
	$(form).find('input[type=submit], button[type=submit]').prop({disabled : true});
	$.post(url, $(form).serialize(), function (response) {
		hide_loading();
		if (response == "CREATE" || response == 'UPDATE' || response == 'CREATE-AND-MAIL') {
			hide_modal();
			message_ok(response == "CREATE"?"Create success!":"Update success!", 500);
			if (response == 'CREATE-AND-MAIL') {
				message_mail();
			}
			setTimeout(function () {window.location = '';}, 1200);
		} else {
			var error = $('#main-modal .modal-content').html(response).find('.input-error').get(0);
			setTimeout(function () {$(error).prev().focus()}, 300);
			$('#main-modal').find('input').on('keypress', function () {
				$(this).next().fadeOut();
			});
			if (callback_error) {
	            callback_error.apply(window);
	        }
		}
	});
	return false;
}

function validate_data (form, url) {
	show_loading();
	$.post(url, $(form).serialize(), function (response) {
		hide_loading();
		hide_modal();
		var error = $(form).html(response).find('.input-error');
		if (error.length) {
			setTimeout(function () {$(error[0]).prev().focus()}, 500);
			$(form).find('input').on('keypress', function () {
				$(this).next().fadeOut();
			});
		} else {
			message_ok("Save changes!");
		}
	});
	return false;
}

function message_ok (text, delay) {
	text = text || 'Operation has been successful.';
	setTimeout(function () {
		message('Success!', text, _base_url + 'img/glyphicons/glyphicons_206_ok_2.png', 'n-success');
	}, delay || 0);
}

function message_error (text, delay) {
	text = text || 'There was an error.';
	setTimeout(function () {
		message('Error!', text, _base_url + 'img/glyphicons/glyphicons_207_remove_2.png', 'n-error');
	}, delay || 0);
}

function message_mail (text, delay) {
	text = text || 'Sent mail!.';
	setTimeout(function () {
		message('Mail!', text, _base_url + 'img/glyphicons/glyphicons_129_message_new.png', 'n-mail');
	}, delay || 0);
}

function message (title, text, img, class_name, sticky) {
	var options = {
		title: title || 'Message', // (string | mandatory) the heading of the notification
		text: text || '', // (string | mandatory) the text inside the notification
		sticky: sticky || false, // (bool | optional) if you want it to fade out on its own or just sit there
		time: 3000,// (int | optional) the time you want it to be alive for before fading out
		class_name: class_name || '', // for light notifications (can be added directly to $.gritter.add too)
		position: 'top-right', // possibilities: bottom-left, bottom-right, top-left, top-right
		fade_in_speed: 80, 
		fade_out_speed: 80
	}
	if (img) {
		options = $.extend(options, {image: img}); // (string | optional) the image to display on the left
	}
	$.gritter.add(options);
}

function show_loading (text) {
	$('#loading-ajax').fadeIn(200);
	$('#loading-ajax > label').html(text || 'Loading...')
}

function hide_loading () {
	$('#loading-ajax').fadeOut(200);
}

function button_on_off (input, url) {
	$.post(url, {state: $(input).children('input').val()});
}

/* Nano Templates (Tomasz Mazur, Jacek Becela) */
function nano(template, data) {
  return template.replace(/\{([\w\.]*)\}/g, function(str, key) {
    var keys = key.split("."), v = data[keys.shift()];
    for (var i = 0, l = keys.length; i < l; i++) v = v[keys[i]];
    return (typeof v !== "undefined" && v !== null) ? v : "";
  });
}