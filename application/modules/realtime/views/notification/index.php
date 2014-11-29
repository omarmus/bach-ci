<div id="notification">
	<div class="header">
		<strong>Notificaciones</strong>
		<a href="#" class="pull-right">Marcar como leidos</a>
	</div>
	<div class="notification">
		<div id="container-notifications"></div>
	</div>
</div>

<script type="text/tmpl-js" id="tmpl-notification">
	<article data-role="{id}">
		<h6>{title}</h6>
		<div>{message}</div>
		<span class="glyphicon {icon}"></span> 
		<span class="date" title="{date}">{date_literal}</span>
	</article>
</script>

<script type="text/tmpl-js" id="tmpl-details-notification">
	<div class="details-notification" id="details-{id}" data-role="{id}">
		<div>
			<h5><strong>{title}</strong></h5>
			<div>{message}</div>
			<span class="glyphicon {icon}"></span> 
			<span class="date" title="{date}">{date_literal}</span>
		</div>
		<span></span>
	</div>
</script>

<script type="text/javascript">

 	var $notifications = null,
 		tmpl_notification = null,
 		tmpl_details_notification = null;

	$(document).ready(function() {
		$notifications = $('#container-notifications');
		tmpl_notification = $('#tmpl-notification').html();
		tmpl_details_notification = $('#tmpl-details-notification').html();
		get_notifications(<?php echo ID_USER ?>);

		$('#wrap').on('click', function() {
			$('.details-notification').hide();
		});
	});

	$(window).on('scroll', function(event) {
		event.preventDefault();
		$('.details-notification').hide();
	});

	function get_notifications (id_receiver) {
		$.get(base_url + 'realtime/notification/get_notifications/' + id_receiver, function(response) {
			var notifications = '';
			for (var i = response.length - 1; i >= 0 ; i--) {
				notifications += nano(tmpl_notification, {
					id : response[i].id_notification,
					title : response[i].title,
					message : response[i].message,
					date : response[i].date,
					date_literal : response[i].date_literal,
					icon : response[i].icon
				});
			};
			var $elements = $($.parseHTML('<div>' + notifications + '</div>'));
			set_events_notification($elements);
			$notifications.prepend($elements);
		}, 'json');
	}

	function set_events_notification ($elements) {
		$elements.find('article').on('click', function() {
			open_details_notification(this);
		})
		// .on('mouseover', function() {
		// 	open_details_notification(this);
		// });
	}

	function open_details_notification (obj) {
		var $this = $(obj),
				position = get_absolute_element_position(obj);
			$('.details-notification').hide();
			var id = $this.data('role');
			if ($('#details-' + id).length) {
				$('#details-' + id).css({top : position.top + $(window).scrollTop(), left: position.left - 400, display : 'block'});
			} else {
				$.get(base_url + 'realtime/notification/get_notification/' + id, function(response) {
					var $details = $($.parseHTML(nano(tmpl_details_notification, {
						id : response.id_notification,
						title : response.title,
						message : response.message,
						date : response.date,
						date_literal : response.date_literal,
						icon : response.icon
					})));
					$details.css({top : position.top + $(window).scrollTop(), left: position.left - 400, display : 'block'});
					$('body').append($details);
				}, 'json');
			}
	}

	function save_notification (id_receiver, type, title, message) {
		$.post(base_url + 'realtime/notification/save', {id_receiver : id_receiver, type : type, title : title, message : message}, function(data) {
			console.log('Create notification!');
		});
	}

	function get_absolute_element_position(element) {
		if (typeof element == "string")
			element = document.getElementById(element)

		if (!element) return { top:0,left:0 };

		var y = 0;
		var x = 0;
		while (element.offsetParent) {
			x += element.offsetLeft;
			y += element.offsetTop;
			element = element.offsetParent;
		}
		return {top : y, left : x};
	}
</script>
<style type="text/css">
	#realtime {
		background-color: #EEEEEE;
		border-left: 1px solid #CCCCCC;
		box-shadow: 1px 1px 0 0 #FFFFFF inset;
		font-size: 12px;
		height: 100%;
		padding: 51px 0 0;
		position: fixed;
		right: 0;
		top: 0;
		width: 200px;
		z-index: 105;
	}
	#notification .date {
		color : #888888;
		font-size: 11px;
	}
	#notification {
		width: 100%;
		height: 50%;
		border-bottom: 1px solid #DDDDDD;
	}
	#realtime .header {
		background-color: #FFFFFF;
		border-bottom: 1px solid #DDDDDD;
		height: 27px;
		padding: 4px 5px;
		position: relative;
		z-index: 10;
	}
	#notification .header a {font-size: 11px; margin-top: 2px;}
	#notification article {
		padding: 8px 10px 5px;
		position: relative;
		margin-top: 0px;
	}
	#notification article:hover {
		cursor: pointer;
		background-color: #E7E7E7;
	}
	#notification article:before {
		content: "";
		width: 190px;
		border-bottom: 1px solid #DDDDDD;
		position: absolute;
		bottom: 0;
		left: 10px;
	}
	#notification article:hover:before {
		left: 0;
		width: 100%;
	}
	#notification article:hover:after {
		content: "";
		width: 100%;
		border-bottom: 1px solid #DDDDDD;
		position: absolute;
		top: -1px;
		left: 0;
	}
	#notification h6 {font-weight: bold; margin: 0;}
	#realtime .notification {
		height: 100%;
		margin: -27px auto 0;
		min-height: 100%;
		padding: 27px 0 0;
	}
	#realtime .notification > div {
		overflow-y: auto; 
		overflow-x: hidden; 
		height: 100%;
	}
	.details-notification {
		position: absolute;
		width: 400px;
		top: 0;
		left: 0;
		z-index: 110;
	}
	.details-notification > div {
		background-color: #FFFFFF;
		box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
		width: 388px;
		border: 1px solid #AAAAAA;
		padding: 10px;
	}
	.details-notification > span {
		border-bottom: 9px solid transparent;
		border-left: 9px solid #aaaaaa;
		border-top: 9px solid transparent;
		display: block;
		height: 0;
		position: absolute;
		right: 4px;
		top: 10px;
		width: 0;
	}
	.details-notification > span:before {
		border-bottom: 8px solid transparent;
		border-left: 8px solid #ffffff;
		border-top: 8px solid transparent;
		content: "";
		display: block;
		height: 0;
		left: -9px;
		position: absolute;
		top: -8px;
		width: 0;
	}
	.details-notification h5 {
		margin: 0 0 5px;
	}
	.details-notification .date {
		color: #888;
		font-size: 12px;
	}
</style>