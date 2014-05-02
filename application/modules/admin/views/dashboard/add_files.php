<?php echo form_open_multipart('', array('id' => 'form-document'));?>
<span class="btn btn-warning fileinput-button">
	<span><i class="glyphicon glyphicon-list-alt"></i> <?php echo lang('files') ?></span>
	<input type="file" name="document[]" multiple="multiple" id="add-document" size="20">
</span>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function() {

	    $('#add-document').on('change', function (event) {
	    	event.preventDefault();
	    	$('#form-document').submit();
	    });

	    $('#form-document').on('submit', function (event) {
	    	var form = this;
	    	event.preventDefault();
	    	show_loading('Subiendo documento');
	    	$.ajaxFileUpload({
	    		url           : _base_url + 'cms/article/upload_documents',
	    		secureuri     : false,
	    		fileElementId : 'add-document',
	    		dataType      : 'json',
	    		data          : {},
	    		success  : function (response) {
	    			hide_loading();
	    			hide_loading();
	    			var errors = [],
	    			success = [],
	    			length = response.length;
	    			for (var i = 0; i < length; i++) {
	    				response[i].status == 'error' ? errors.push(response[i]) : success.push(response[i]);
	    			};
	    			if (errors.length) {
	    				for (var i = 0; i < errors.length; i++) {
	    					message_error(errors[i].msg);
	    				};
	    			} else {
	    				message_ok(success[0].msg);
	    			}
	    			// $.get(_base_url + 'cms/article/get_files/1/DOCUMENT', function(data) {
	    			// 	$('#main-modal .modal-content').html(data);
	    			// });
	    		}
	    	});
	    });
	});
</script>