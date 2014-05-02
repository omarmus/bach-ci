<?php $this->load->view('components/header');?>
<?php $homepage = $subview == 'templates/homepage' ?>
<div id="banner" class="hidden-xs">
	<!-- www.TuTiempo.net - Ancho:298px - Alto:69px -->
	<div id="TT_vCtAbBYBtUBBzaFUKfSzDzDjzUnULzz3HifAnfhLp4p"><h2><a href="http://www.tutiempo.net">Clima en el mundo</a></h2></div>
	<script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_vCtAbBYBtUBBzaFUKfSzDzDjzUnULzz3HifAnfhLp4p"></script>
</div>	
<h1 class="fancy_title" style="display : <?php echo $homepage ? 'block' : 'none' ?>">Diseño e implementación de Turismo Digital y Virtual en Municipios del Departamento de La Paz</h1>
<div id="main-container">
	<?php $this->load->view($subview, $this->data); ?>
</div>
<?php $this->load->view('components/footer');?>