<?php echo modal_header('<small>' . ($video_exist ? 'Ya tiene un video agregado' : 'Ingresa una URL') . '</small>') ?>
<style type="text/css">
	#form-video<?php echo $edit ?> label {font-size: 12px; padding: 0 0 0 20px; text-align: right;}
	#form-video<?php echo $edit ?> button {margin-right: 15px;}
	<?php if (strlen($edit)): ?>
		#second-modal .modal-dialog {margin-top: 210px; width: 500px;}
	<?php endif ?>
</style>
<?php if ($video_exist) {die();} ?>
<div class="modal-body">
	<form class="row" id="form-video<?php echo $edit ?>" role="form">
		<div class="form-group" style="width: 100%">
			<label class="control-label col-md-4" for="url-video<?php echo $edit ?>">Pega una URL de YouTube aquí:</label>
			<div class="col-md-8">
				<input type="text" name="url" class="form-control" id="url-video<?php echo $edit ?>">
			</div>
		</div>
		<div class="form-group col-md-12" style="width: 100%">
			<button type="submit" class="btn btn-primary pull-right"><?php echo lang('add_video') ?></button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#form-video<?php echo $edit ?>').on('submit', function(event) {
		event.preventDefault();
		
		var $form = $(this),
			$url_video = $('#url-video<?php echo $edit ?>');
			
		$url_video.on('keyup', function() {
			$(this).next().fadeOut();
		});

		show_loading('Agregando video');
		$.post(base_url + 'admin/dashboard/upload_video<?php echo strlen($edit) ? '_edit/' . $id_article : '' ?>', $(this).serialize(), function(data) {
			hide_loading();
			$form.find('.input-error').remove();
			if (data.status == 'OK') {
				show_loading('Actualizando video');
			<?php if (strlen($edit)): ?>
				hide_modal('second-modal');
				$('#main-modal .modal-content').load(base_url + 'admin/dashboard/get_article/<?php echo $id_article ?>', function () {
					hide_loading();
					draw_article();
				});
			<?php else: ?>
				hide_modal();
				$.get(base_url + 'admin/dashboard/load_list_files/VIDEO', function(response) {
					hide_loading();
					$('#container-videos<?php echo $edit ?>').html(response);
					set_height_container();
					$('#videos-article button').prop({disabled: true});
				});
			<?php endif ?>
			} else {
				$url_video.parent().append(data.html);
			}			
		}, 'json');
	});
</script>
