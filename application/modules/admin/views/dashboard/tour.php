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
							$.get(base_url + 'admin/dashboard/tour_view');
						}
					});				
				}
			},
			modal:true,
			expose: true
		});
	});
</script>
<style type="text/css">
	.joyride-tip-guide p {font-size: 12px;}
</style>
<ol id="joyRideTipContent" style="font-size: 12px;">
	<li data-text="Next">
		<h3>¡Bienvenido!</h3>
		<p>Bienvenido al <strong>Centro de Documentación Virtual</strong> destinada a bla bla bla...</p>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="" class="checked-tour"> No quiero volver a ver el tour.
			</label>
		</div>
	</li>
	<li data-id="t-tags" data-text="Next" data-options="tipLocation:bottom;">
		<h3>Categorías</h3>
		<p>Haga búsquedas de artículos por categorías</p>
	</li>
	<li data-id="t-index" data-button="Next" data-options="tipLocation:right;">
		<h3>Índice</h3>
		<p>Haga búsquedas por orden alfabético o por fecha</p>
	</li>
	<li data-id="t-favorites" data-button="Next" data-options="tipLocation:right">
		<h3>Mis favoritos</h3>
		<p>Lista de sus favoritos</p>
	</li>
	<li data-id="t-news" data-button="Next" data-options="tipLocation:right">
		<h3>Noticias</h3>
		<p>Sus datos personales</p>
	</li>
	<li data-id="article-publish-container" data-button="Next" class="" data-options="tipLocation:bottom">
		<h3>Publique su artículo</h3>
		<p>Publique su artículo acá, suba fotos, videos de youtube y sus documentos</p>
	</li>
	<li data-id="articles-pending-container" data-button="Next" class="notification-tour" data-options="tipLocation:left">
		<h3>Artículos pendientes</h3>
		<p>Acá se listarán todos sus artículos pendientes de revisión por el administrador, puede seguir editandolos hasta el momento de que le envie al administrador para su revisión.</p>
	</li>
	<li data-id="masonry" data-button="Next" class="search-tour" data-options="tipLocation:top">
		<h3>Artículos</h3>
		<p>Acá se muestran todos los artículos publicados.</p>
	</li>
	<li data-id="t-profile" data-button="Next" class="search-tour" data-options="tipLocation:bottom">
		<h3>Su perfil</h3>
		<p>Vea su perfil y cierre su sesión acá.</p>
	</li>
	<li data-id="container-search" data-button="Close" class="search-tour" data-options="tipLocation:bottom">
		<h3>Búsqueda</h3>
		<p>Busque artículos publicados y autores.</p>
	</li>
</ol>