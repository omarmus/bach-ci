<?php if (count($files['DOCUMENT'])): ?>
<div class="multimedia row">
	<?php foreach ($files['DOCUMENT'] as $document): ?>
		<div class="col-md-6">
			<div class="thumbnail document">
				<div class="img">
					<?php $extension = explode('.', $document->filename) ?>
					<img class="pull-left" src="<?php echo base_url() . 'assets/img/docs/' . $imgs[$extension[count($extension)-1]] ?>"> 
					<?php echo $document->filename ?>
				</div>
				<div class="caption">
					<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $document->id_tmp_file ?>" title="Eliminar documento" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>						
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		delete_files_events('container-documents');
	});
</script>
<?php endif ?>
