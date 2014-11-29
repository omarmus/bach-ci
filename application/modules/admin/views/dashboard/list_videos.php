<?php if (count($files['VIDEO'])): ?>
<div class="multimedia row">
	<?php foreach ($files['VIDEO'] as $video): ?>
		<div class="col-md-10 col-md-offset-1">
			<div class="thumbnail video">
				<div class="img">
					<?php $url = str_replace(array('http:', 'https:'), '', str_replace(array('youtu.be/', 'www.youtube.com/watch?v='), 'www.youtube.com/embed/', $video->description)) ?>
					<div class="responsive-container">
						<iframe src="<?php echo $url ?>?controls=0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="caption" id="buttons-video">
					<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $video->id_tmp_file ?>" title="Eliminar video" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>						
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		delete_files_events('container-videos');
	});
</script>
<?php endif ?>
