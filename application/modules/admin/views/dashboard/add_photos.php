<?php echo form_open_multipart('', array('id' => 'form-photo'));?>
<span class="btn btn-success fileinput-button">
	<span><i class="glyphicon glyphicon-camera"></i> <?php echo lang('photos') ?></span>
	<input type="file" name="photo[]" multiple="multiple" id="add-photo" size="20">
</span>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function() {

		var $add_photo = $('#add-photo'),
			$form_photo = $('#form-photo');

 		$add_photo.on('change', function (event) {
	    	event.preventDefault();
	    	$form_photo.submit();
	    });

 		$form_photo.on('submit', function (event) {
 			event.preventDefault();

 			var form = this,
 				$add_video = $('#videos-article > .btn'),
 				$add_document = $('#add-document').parent(),
 				$btn_publish = $('#btn-publish');
 			
 			$add_photo.parent().addClass('disabled');
 			$add_video.addClass('disabled');
 			$add_document.addClass('disabled');
 			$btn_publish.addClass('disabled');

 			show_loading('Subiendo photos...');
 			$.ajaxFileUpload({
 				url           : _base_url + 'admin/dashboard/upload_photos',
 				secureuri     : false,
 				fileElementId : 'add-photo',
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
 						$.get(_base_url + 'admin/dashboard/load_add_files/PHOTO', function(response) {
 							$add_video.removeClass('disabled');
 							$add_document.removeClass('disabled');
 							$btn_publish.removeClass('disabled');
		    				$('#photos-article').html(response);
		    			});
 					} else {
 						show_loading('Actualizando photos');
 						$.get(_base_url + 'admin/dashboard/load_list_files/PHOTO', function(response) {
 							hide_loading();
		    				$('#container-photos').html(response);
		    				$.get(_base_url + 'admin/dashboard/load_add_files/PHOTO', function(response) {
		    					$add_video.removeClass('disabled');
	 							$add_document.removeClass('disabled');
	 							$btn_publish.removeClass('disabled');
			    				$('#photos-article').html(response);
			    			});
		    			});
 					}
 				}
 			});
 		});
	});
</script>