var oTable;

$(document).ready(function() {
	oTable = $('#main-table').dataTable();
	$('.btn-delete').tooltip();
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
        "sLengthMenu": lang.datatable.rows,
        "sZeroRecords": "Nothing found - sorry",
        "sInfo": lang.datatable.info,
        "sInfoEmpty": lang.datatable.show_empty,
        "oPaginate": {
	        "sNext": "&raquo;",
	        "sPrevious": "&laquo;",
	        "sFirst" : lang.datatable.first,
	        "sLast" : lang.datatable.last
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
    		$($(that).parent().find('.row .col-md-9')[0]).html(now?'<span class="label label-warning"><strong>'+now+'</strong> ' + lang.row +(now>1?'s':'')+' ' + lang.selected + '.</span>':'');
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
		var message = lang.delete_item.replace(/%n%/gi, pks.length);
		message = message.replace(/%s%/gi, (pks.length > 1 ? 's' : ''));
		if (confirm(message)) {
			show_loading(lang.deleted_items);
			$.post(url, {pks: pks}, function (response) {
				if (response == 'OK') {
					hide_loading();
					message_ok(lang.deleted_records);
					deleteRows(oTable);
					$('#delete-rows').addClass('disabled');
					$(oTable.find('th')[0]).parent().removeClass('all-selected');
					$(oTable.parent().find('.row .col-md-9')[0]).html('');
					$('#nav-lateral .glyphicon-home').parent().focus();
					if (refresh) {
						setTimeout(function () {
							window.location = '';
						}, 500);
					}
				} else {
					message_error(response);
					show_loading(lang.refresh);
					setTimeout(function () {
						window.location = '';
					}, 4000);
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

function validate (form, url, callback_error, callback_ok) {
	var $form = $(form),
		$button = $form.find('input[type=submit], button[type=submit]').prop({disabled : true});

	if (form.body) {
		var code = $(form.body).code();
		if (code != '<p><br></p>') {
			form.body.value = code;
		}
	}
	$button.find('> span:first').hide();
	$button.find('> span:last').show();
	$.post(url, $form.serialize(), function (response) {
		hide_loading();
		if (response == "CREATE" || response == "CREATE-AJAX" || response == 'UPDATE' || response == "UPDATE-AJAX" || response == 'CREATE-AND-MAIL') {
			message_ok(response == "CREATE" || response == "CREATE-AJAX"? lang.create_success + "!": lang.update_success + "!", 500);
			if (response == 'CREATE-AND-MAIL') {
				message_mail();
			}
			if (callback_ok) {
	            callback_ok.apply(window);
	        }
			if (response != "CREATE-AJAX" && response != "UPDATE-AJAX") {
				setTimeout(function () {window.location = '';}, 1200);
			}
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

function validate_data (form, url, id, callback_error, callback_ok) {
	var $button = $('#' + id),
		$form = $(form);
	$button.prop({disabled : true}).children('span').hide().next().show();
	$.post(url, $form.serialize(), function (response) {
		if (response.length) {
			$form.html(response)
		}
		var error = $form.find('.input-error');
		if (error.length) {
			setTimeout(function () {$(error[0]).prev().focus()}, 500);
			$form.find('input').on('keypress', function () {
				$(this).next().fadeOut();
			});
			if (callback_error) {
	            callback_error.apply(window);
	        }
		} else {
			$button.parent().hide().prev().show();
			message_ok(lang.save_changes);

			if (callback_ok) {
	            callback_ok.apply(window);
	        }
		}
		$button.prop({disabled : false}).children('span').show().next().hide();
	});
	return false;
}

function refresh (time) {
	setTimeout(function () {
		window.location = '';
	}, time || 1200);
}

function message_ok (text, delay) {
	text = text || lang.message_ok + '.'; //'Operation has been successful.';
	setTimeout(function () {
		message(lang.success + '!', text, 'glyphicon-ok', 'n-success');
	}, delay || 0);
}

function message_error (text, delay) {
	text = text || lang.message_error + '.'; // There was an error
	setTimeout(function () {
		message(lang.error + '!', text, 'glyphicon-warning-sign', 'n-error');
	}, delay || 0);
}

function message_mail (text, delay) {
	text = text || lang.message_mail + '.'; // Sent mail
	setTimeout(function () {
		message(lang.mail + '!', text, 'glyphicon-envelope', 'n-mail');
	}, delay || 0);
}

function message (title, text, icon, class_name, sticky) {
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
	if (icon) {
		options = $.extend(options, {image: icon}); // (string | optional) the image to display on the left
	}

	$.gritter.add(options);
}

function show_loading (text) {
	$('#loading-ajax').fadeIn(200);
	$('#loading-ajax > label').html(text || lang.loading + '...')
}

function hide_loading () {
	$('#loading-ajax').fadeOut(200);
}

function button_on_off (input, url) {
	$.post(url, {state: $(input).children('input').val()});
}

function setCities (value, selected) {
	show_loading(lang.loading_city);
	$.get(_base_url + 'admin/profile/cities/' + value, function (response) {
		var obj = $('#cities');
		obj.empty();
		obj.append(new Option(lang.selected_city + '...', '0'));
		for (var i = 0; i < response.length; i++) {
			obj.append(new Option(response[i].text, response[i].value));
		};
		if (selected)
			obj.val(selected);
		hide_loading();
	}, 'json');
}

function events_buttons_edit ($buttons, callback_edit, callback_cancel) {
	$($buttons[0]).on('click', function() {
    	event_edit($(this), callback_edit);
    });
    $($buttons[1]).on('click', function() {
    	event_cancel($(this), callback_cancel);
    });
}

function event_edit ($this, callback_edit) {
	$this.hide().next().show();
	var $next = $this.parent().parent().next();
	$next.find('.form-control').show();
	$next.find('.input-group').css('display', 'table');
	$next.find('label.none').show();
	$next.find('strong.none').show();
	$next.find('.form-control-static').hide();
	$next.find('.input-error').show();

	if (callback_edit) {
        callback_edit.apply(window);
    }
}

function event_cancel ($this, callback_cancel) {
	$this.parent().hide().prev().show();
	var $next = $this.parent().parent().parent().next();
	$next.find('.form-control').hide();
	$next.find('.input-group').hide();
	$next.find('label.none').hide();
	$next.find('strong.none').hide();
	$next.find('.form-control-static').show();
	$next.find('.input-error').hide();

	if (callback_cancel) {
        callback_cancel.apply(window);
    }
}

function send_form ($button, $form) {
	$button.on('click', function() {
		$form.submit();
	});
}

function setEditor (elements) {
	$(elements).summernote({
		height: 180,
		codemirror: {
			theme: 'monokai'
		},
		toolbar: [
		    ['style', ['bold', 'italic', 'underline']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['insert', ['link']],
		    ['view', ['codeview']],
		    ['help', ['help']]
	    ]
	});
}

function setSimpleEditor (elements) {
	var $elements = $(elements);
	$elements.summernote({
		height: 100,
		toolbar: [
		    ['style', ['bold', 'italic', 'underline']],
		    ['para', ['ul', 'ol']],
		    ['insert', ['link']]
	    ],
	    onfocus: function(e) {
			var $html = $($.parseHTML($elements.code()));
			if ($html.hasClass('placeholder') || $html.find('.placeholder').length) {
				$elements.code('');
			}
		},
		onblur: function(e) {
			var html = $elements.code();
			if (html == '' || html == '<br>' || html == '<p><br></p>') {
				$elements.code('<span class="placeholder">' + lang.write_contents + '</span>');
			}
		},
		onkeyup: function(e) {
			var html = $elements.code();
			if (html == '' || html == '<br>' || html == '<p><br></p>') {
				$elements.code('<span class="placeholder">' + lang.write_contents + '</span>');
			}
		},
		onkeydown: function(e) {
			var $html = $($.parseHTML($elements.code()));
			if ($html.hasClass('placeholder') || $html.find('.placeholder').length) {
				$elements.code('');
			}
		}
	});
}

function textSelect(inp, s, e) {
    e = e || s;
    if (inp.createTextRange) {
        var r = inp.createTextRange();
        r.collapse(true);
        r.moveEnd('character', e);
        r.moveStart('character', s);
        r.select();
    }else if(inp.setSelectionRange) {
        inp.focus();
        inp.setSelectionRange(s, e);
    }
}

function setEndOfContenteditable(contentEditableElement)
{
    var range,selection;
    if(document.createRange)//Firefox, Chrome, Opera, Safari, IE 9+
    {
        range = document.createRange();//Create a range (a range is a like the selection but invisible)
        range.selectNodeContents(contentEditableElement);//Select the entire contents of the element with the range
        range.collapse(true);//collapse the range to the end point. false means collapse to end rather than the start
        selection = window.getSelection();//get the selection object (allows you to change selection)
        selection.removeAllRanges();//remove any selections already made
        selection.addRange(range);//make the range you have just created the visible selection
    }
    else if(document.selection)//IE 8 and lower
    { 
        range = document.body.createTextRange();//Create a range (a range is a like the selection but invisible)
        range.moveToElementText(contentEditableElement);//Select the entire contents of the element with the range
        range.collapse(true);//collapse the range to the end point. false means collapse to end rather than the start
        range.select();//Select the range (make it the visible selection
    }
}

/* Nano Templates (Tomasz Mazur, Jacek Becela) */
function nano(template, data) {
  return template.replace(/\{([\w\.]*)\}/g, function(str, key) {
    var keys = key.split("."), v = data[keys.shift()];
    for (var i = 0, l = keys.length; i < l; i++) v = v[keys[i]];
    return (typeof v !== "undefined" && v !== null) ? v : "";
  });
}

var normalize = (function() {
  var from = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç",
      to   = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
      mapping = {};
 
  for(var i = 0, j = from.length; i < j; i++ )
      mapping[ from.charAt( i ) ] = to.charAt( i );
 
  return function( str ) {
      var ret = [];
      for( var i = 0, j = str.length; i < j; i++ ) {
          var c = str.charAt( i );
          if( mapping.hasOwnProperty( str.charAt( i ) ) )
              ret.push( mapping[ c ] );
          else
              ret.push( c );
      }
      // return ret.join( '' );
      return ret.join( '' ).replace( /[^-A-Za-z0-9]+/g, '-' ).toLowerCase();
  }
 
})();