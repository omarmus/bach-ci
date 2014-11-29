<?php echo form_open_multipart('', array('id' => 'form-photo' . $edit));?>
<span class="btn btn-default fileinput-button">
	<span><i class="glyphicon glyphicon-camera"></i> <?php echo lang('photos') ?></span>
	<input type="file" name="photo[]" multiple="multiple" id="add-photo<?php echo $edit ?>" size="20">
</span>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function() {

		var $add_photo = $('#add-photo<?php echo $edit ?>'),
			$form_photo = $('#form-photo<?php echo $edit ?>');

 		$add_photo.on('change', function (event) {
	    	event.preventDefault();
	    	$form_photo.submit();
	    });

 		$form_photo.on('submit', function (event) {
 			event.preventDefault();

 			var form = this,
 				$add_video = $('#videos-article<?php echo $edit ?> > .btn'),
 				$add_document = $('#add-document<?php echo $edit ?>').parent(),
 				$btn_publish = $('#btn-publish<?php echo $edit ?>');
 			
 			$add_photo.parent().addClass('disabled');
 			$add_video.addClass('disabled');
 			$add_document.addClass('disabled');
 			$btn_publish.addClass('disabled');

 			show_loading('Subiendo photos...');
 			$.ajaxFileUpload({
 				url           : base_url + 'admin/dashboard/upload_photos<?php echo strlen($edit) ? '_edit/' . $id_article : '' ?>',
 				secureuri     : false,
 				fileElementId : 'add-photo<?php echo $edit ?>',
 				dataType      : 'json',
 				data          : {},
 				success  : function (response) {
 					var errors = [],
 					success = [],
 					length = response.length;
 					for (var i = 0; i < length; i++) {
 						response[i].status == 'error' ? errors.push(response[i]) : success.push(response[i]);
 					};
 					if (errors.length) {
 						hide_loading();
 						for (var i = 0; i < errors.length; i++) {
 							message_error(errors[i].msg);
 						}
 						$.get(base_url + 'admin/dashboard/load_add_files/PHOTO', function(response) {
 							$add_video.removeClass('disabled');
 							$add_document.removeClass('disabled');
 							$btn_publish.removeClass('disabled');
		    				$('#photos-article<?php echo $edit ?>').html(response);
		    			});
 					} else {
 						show_loading('Actualizando photos');
					<?php if (strlen($edit)): ?>
						$('#main-modal .modal-content').load(base_url + 'admin/dashboard/get_article/<?php echo $id_article ?>', function () {
							hide_loading();
							draw_article();
						});
	 				<?php else: ?>
		 				$.get(base_url + 'admin/dashboard/load_list_files/PHOTO', function(response) {
		 					hide_loading();
		 					$('#container-photos<?php echo $edit ?>').html(response);
		 					set_height_container();
		 					$.get(base_url + 'admin/dashboard/load_add_files/PHOTO', function(response) {
		 						$add_video.removeClass('disabled');
		 						$add_document.removeClass('disabled');
		 						$btn_publish.removeClass('disabled');
		 						$('#photos-article<?php echo $edit ?>').html(response);
		 					});
		 				});
	 				<?php endif ?>
 					}
 				}
 			});
 		});
	});
</script>
