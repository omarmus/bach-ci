<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/joyride/joyride-2.1.css') ?>">
<script type="text/javascript" src="<?php echo base_url('assets/lib/joyride/jquery.joyride-2.1.js') ?>" ></script>
<script type="text/javascript">
	$(document).ready(function() {
		var $tour = $('#joyRideTipContent');
		$tour.joyride({
			autoStart : true,
			postStepCallback : function (index, tip) {
				if (index == 0) {
					$('.checked-tour').each(function (index) {
						if (this.checked) {
							$tour.joyride('destroy');
							$.get(_base_url + 'admin/dashboard/tour_view');
						}
					});				
				}
			},
			modal:true,
			expose: true
		});
	});
</script>
<ol id="joyRideTipContent">
	<li data-text="Next">
		<h3>Bienvenido al Sistema</h3>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="" class="checked-tour"> No quiero volver a ver el tour.
			</label>
		</div>
	</li>
	<li data-id="filter" data-text="Next" data-options="tipLocation:bottom;">
		<h3>Filtros</h3>
		<p>Filtre sus aspectos</p>
	</li>
	<li data-id="calendar" data-button="Next" data-options="tipLocation:right;">
		<h3>Calendario</h3>
		<p>Su calendario de actividades</p>
	</li>
	<li data-id="list-aspects" data-button="Next" data-options="tipLocation:right">
		<h3>Porcentajes</h3>
		<p>Porcentajes de sus aspectos</p>
	</li>
	<li data-id="data-profile" data-button="Next" data-options="tipLocation:right">
		<h3>Datos de usuario</h3>
		<p>Sus datos personales</p>
	</li>
	<li data-id="my-profile" data-button="Next" class="" data-options="tipLocation:left">
		<h3>Su perfil</h3>
		<p>Opciones de su perfil</p>
	</li>
	<li data-id="number-notification" data-button="Next" class="notification-tour">
		<h3>Notificaciones</h3>
		<p>Vea acá sus notificaciones</p>
	</li>
	<li data-id="main-search" data-button="Close" class="search-tour">
		<h3>Buscador</h3>
		<p>Buscador del sitio</p>
	</li>
</ol>