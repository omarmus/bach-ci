<?php echo modal_header($article->title . ' <small>' . lang('documents') . ' ' . (count($documents) ? '<strong id="count-items">(' . count($documents) . ')</strong>' : '') . '</small>') ?>
<?php $imgs = get_icons() ?>
<div class="multimedia">
	<?php echo form_open_multipart('', array('id' => 'form-document'));?>
	<span class="btn btn-primary fileinput-button">
		<span><i class="glyphicon glyphicon-upload"></i> <?php echo lang('upload_documents') ?></span>
		<input type="file" name="document[]" multiple="multiple" id="document" size="20">
	</span>
	<?php if (count($documents)) : ?>
	<div class="pull-right edit-files">
		<?php echo button_default(lang('edit'), 'btn-edit-files', 'glyphicon-edit', 'UPDATE') ?>
		<span class="none">
			<?php echo button_default(lang('cancel'), 'btn-cancel-files', 'glyphicon-ban-circle', 'UPDATE') ?>
			<?php echo button_primary(lang('save_data'), 'btn-save-files', 'glyphicon-ok', 'UPDATE') ?>
		</span>
	</div>
	<?php endif ?>
	<?php echo form_close(); ?>
	<form id="form-documents" onsubmit="return validate_data(this, '<?php echo base_url() ?>cms/article/save_descriptions/', 'btn-save-files', null, save_textareas)">
		<div class="row" id="documents-container">
			<?php $pks = '' ?>
			<?php foreach ($documents as $document): ?>
				<?php $pks .= $document->id_file . ',' ?>
				<div class="col-md-3">
					<div class="thumbnail" data-toggle="tooltip" data-placement="bottom" title="<?php echo $document->filename ?>">
						<div class="img text-center">
							<?php $extension = explode('.', $document->filename) ?>
							<img  src="<?php echo base_url() . 'assets/img/docs/' . $imgs[$extension[count($extension)-1]] ?>">
						</div>
						<div class="caption" id="buttons-document">
							<a target="_blank" href="http://docs.google.com/viewer?url=<?php echo urlencode(base_url() . 'assets/files/articles/documents/'. $document->filename) ?>" type="button" class="preview btn btn-default btn-xs" title="Vista previa" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-eye-open"></span></a>
							<a href="<?php echo base_url() . 'assets/files/articles/documents/'. $document->filename ?>" class="btn btn-default btn-xs" title="Descargar" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-download"></span></a>
							<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $document->id_file ?>" title="Eliminar documento" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>						
						</div>
						<div class="description">
							<p><?php echo strlen($document->description) ? $document->description : 'Sin descripción' ?></p>
						</div>
						<textarea name="description-<?php echo $document->id_file ?>" placeholder="Escribir descripción..."><?php echo $document->description ?></textarea>
					</div>
				</div>
			<?php endforeach ?>
			<input type="hidden" name="pks" value="<?php echo rtrim($pks, ',') ?>">
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#document').on('change', function (event) {
    	event.preventDefault();
    	$('#form-document').submit();
    });

    $('#form-document').on('submit', function (event) {
    	var form = this;
        event.preventDefault();
        show_loading('Subiendo documento');
        $.ajaxFileUpload({
			url           : base_url + 'cms/article/upload_documents/<?php echo $id_article ?>',
			secureuri     : false,
			fileElementId : 'document',
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
           		$.get(base_url + 'cms/article/get_files/<?php echo $id_article ?>/DOCUMENT', function(data) {
           			$('#main-modal .modal-content').html(data);
           		});
            }
        });
    });

    $('#buttons-document .delete').on('click', function() {
    	if (confirm('Delete!')) {
    		var $this = $(this);
    		show_loading('Eliminando documento');
    		$.get(base_url + 'cms/article/delete_file/' + $this.data('role'), function(data) {
    			hide_loading();
    			message_ok('Documento eliminado');
    			$this.parent().parent().parent().remove();
    			$('#count-items').html('(' + $('.multimedia .thumbnail').length + ')');
    		});
    	}
    });

    $('#buttons-document .preview').on('click', function() {
    	
    });

    var $textareas = $('.multimedia textarea'),
    	$description = $('.multimedia .description');
    send_form($('#btn-save-files'), $('#form-documents'));
	events_buttons_edit($('.edit-files button'), function () {
		$textareas.show();
		$description.addClass('hidden');
	}, hide_textareas);

	function hide_textareas () {
    	$textareas.hide();
    	$description.removeClass('hidden');
    }

    function save_textareas () {
    	hide_textareas();
    	$textareas.each(function() {
    		var $this = $(this);
    		$this.prev().children('p').html($this.val() != '' ? $this.val() : 'Sin descripción');
    	});
    }

    $('.multimedia .btn, .multimedia .thumbnail').tooltip();
</script>

<style type="text/css">
	.multimedia .img img {height: 50px; margin-top: 10px; padding: 0 20px; }
	.multimedia .thumbnail .img {height: 70px;}
	.multimedia .thumbnail .caption {background: rgba(0, 0, 0, .6); padding: 3px; top: 0;}
	.multimedia .thumbnail .description > p {margin: 0; padding: 5px; font-size: 12px;}
</style>