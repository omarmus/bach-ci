<?php echo modal_header('<small>' . ($video_exist ? 'Ya tiene un video agregado' : 'Ingresa una URL') . '</small>') ?>
<?php if ($video_exist) {die();} ?>
<div class="modal-body">
	<form class="row" id="form-video" role="form">
		<div class="form-group" style="width: 100%">
			<label class="control-label col-md-4" for="url-video">Pega una URL de YouTube aquí:</label>
			<div class="col-md-8">
				<input type="text" name="url" class="form-control" id="url-video">
			</div>
		</div>
		<div class="form-group col-md-12" style="width: 100%">
			<button type="submit" class="btn btn-primary pull-right"><?php echo lang('add_video') ?></button>
		</div>
	</form>
</div>
<style type="text/css">
	#form-video label {font-size: 12px; padding: 0 0 0 20px; text-align: right;}
	#form-video button {margin-right: 15px;}
</style>
<script type="text/javascript">
	$('#form-video').on('submit', function(event) {
		event.preventDefault();
		
		var $form = $(this),
			$url_video = $('#url-video');
			
		$url_video.on('keyup', function() {
			$(this).next().fadeOut();
		});

		show_loading('Agregando video');
		$.post(_base_url + 'admin/dashboard/upload_video', $(this).serialize(), function(data) {
			hide_loading();
			$form.find('.input-error').remove();
			if (data.status == 'OK') {
				hide_modal();
				show_loading('Actualizando videos');
				$.get(_base_url + 'admin/dashboard/load_list_files/VIDEO', function(response) {
					hide_loading();
					$('#container-videos').html(response);
					$('#videos-article button').prop({disabled: true});
				});
			} else {
				$url_video.parent().append(data.html);
			}			
		}, 'json');
	});
</script>
