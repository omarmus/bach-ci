<?php if (count($files['PHOTO'])): ?>
<div class="multimedia row">
	<?php foreach ($files['PHOTO'] as $photo): ?>
		<div class="col-md-3">
			<div class="thumbnail">
				<div class="img" style="background-size: <?php echo $photo->image_width > $photo->image_height ? 'auto 100%' : '100% auto' ?>; background-image: url('<?php echo base_url() . 'assets/files/articles/photos/thumbnail/'. thumb_image($photo->filename); ?>')"></div>
				<div class="caption">
					<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $photo->id_tmp_file ?>" title="Eliminar fotografía" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		delete_files_events('container-photos');
	});
</script>
<?php endif ?>
	