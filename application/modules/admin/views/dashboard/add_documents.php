<?php echo form_open_multipart('', array('id' => 'form-document'));?>
<span class="btn btn-warning fileinput-button">
	<span><i class="glyphicon glyphicon-list-alt"></i> <?php echo lang('documents') ?></span>
	<input type="file" name="document[]" multiple="multiple" id="add-document" size="20">
</span>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function() {

		var $add_document = $('#add-document'),
			$form_document = $('#form-document');

 		$add_document.on('change', function (event) {
	    	event.preventDefault();
	    	$form_document.submit();
	    });

 		$form_document.on('submit', function (event) {
 			event.preventDefault();

 			var form = this,
 				$add_video = $('#videos-article > .btn'),
 				$add_photo = $('#add-photo').parent(),
 				$btn_publish = $('#btn-publish');
 			
 			$add_document.parent().addClass('disabled');
 			$add_video.addClass('disabled');
 			$add_photo.addClass('disabled');
 			$btn_publish.addClass('disabled');

 			show_loading('Subiendo documentos...');
 			$.ajaxFileUpload({
 				url           : _base_url + 'admin/dashboard/upload_documents',
 				secureuri     : false,
 				fileElementId : 'add-document',
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
 						$.get(_base_url + 'admin/dashboard/load_add_files/DOCUMENT', function(response) {
 							$add_video.removeClass('disabled');
 							$add_photo.removeClass('disabled');
 							$btn_publish.removeClass('disabled');
		    				$('#documents-article').html(response);
		    			});
 					} else {
 						show_loading('Actualizando documentos');
 						$.get(_base_url + 'admin/dashboard/load_list_files/DOCUMENT', function(response) {
 							hide_loading();
		    				$('#container-documents').html(response);
		    				$.get(_base_url + 'admin/dashboard/load_add_files/DOCUMENT', function(response) {
		    					$add_video.removeClass('disabled');
	 							$add_photo.removeClass('disabled');
	 							$btn_publish.removeClass('disabled');
			    				$('#documents-article').html(response);
			    			});
		    			});
 					}
 				}
 			});
 		});
	});
</script>