<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2>Calendario</h2>
			<div class="section calendar-container">
				<?php echo $this->calendar->generate($year, $month, $days); ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.calendar .event').on('click', function(event) {
			event.preventDefault();
			show_loading();
			$.get(base_url_ + 'article/get_event/' + $(this).data('role'), function(data) {
				hide_loading();
				$('#main-modal').modal();
				$('#main-modal-container').html(data);
			});
		});
	});
</script>