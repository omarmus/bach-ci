<?php echo form_open_multipart('', array('id' => 'form-document' . $edit));?>
<span class="btn btn-default fileinput-button">
	<span><i class="glyphicon glyphicon-list-alt"></i> <?php echo lang('documents') ?></span>
	<input type="file" name="document[]" multiple="multiple" id="add-document<?php echo $edit ?>" size="20">
</span>
<?php echo form_close(); ?>
<script type="text/javascript">
	$(document).ready(function() {

		var $add_document = $('#add-document<?php echo $edit ?>'),
			$form_document = $('#form-document<?php echo $edit ?>');

 		$add_document.on('change', function (event) {
	    	event.preventDefault();
	    	$form_document.submit();
	    });

 		$form_document.on('submit', function (event) {
 			event.preventDefault();

 			var form = this,
 				$add_video = $('#videos-article<?php echo $edit ?> > .btn'),
 				$add_photo = $('#add-photo<?php echo $edit ?>').parent(),
 				$btn_publish = $('#btn-publish<?php echo $edit ?>');
 			
 			$add_document.parent().addClass('disabled');
 			$add_video.addClass('disabled');
 			$add_photo.addClass('disabled');
 			$btn_publish.addClass('disabled');

 			show_loading('Subiendo documentos...');
 			$.ajaxFileUpload({
 				url           : base_url + 'admin/dashboard/upload_documents<?php echo strlen($edit) ? '_edit/' . $id_article : '' ?>',
 				secureuri     : false,
 				fileElementId : 'add-document<?php echo $edit ?>',
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
 						$.get(base_url + 'admin/dashboard/load_add_files/DOCUMENT', function(response) {
 							$add_video.removeClass('disabled');
 							$add_photo.removeClass('disabled');
 							$btn_publish.removeClass('disabled');
		    				$('#documents-article<?php echo $edit ?>').html(response);
		    			});
 					} else {
 						show_loading('Actualizando documentos');
	    			<?php if (strlen($edit)): ?>
						$('#main-modal .modal-content').load(base_url + 'admin/dashboard/get_article/<?php echo $id_article ?>', function () {
							hide_loading();
							draw_article();
						});
	 				<?php else: ?>
		 				$.get(base_url + 'admin/dashboard/load_list_files/DOCUMENT', function(response) {
 							hide_loading();
		    				$('#container-documents<?php echo $edit ?>').html(response);
		    				set_height_container();
		    				$.get(base_url + 'admin/dashboard/load_add_files/DOCUMENT', function(response) {
		    					$add_video.removeClass('disabled');
	 							$add_photo.removeClass('disabled');
	 							$btn_publish.removeClass('disabled');
			    				$('#documents-article<?php echo $edit ?>').html(response);
			    			});
		    			});
	 				<?php endif ?>
 					}
 				}
 			});
 		});
	});
</script>