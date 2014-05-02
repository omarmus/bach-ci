<?php echo modal_header($page->title . ' <small>' . lang('photos') . ' ' . (count($photos) ? '<strong id="count-items">(' . count($photos) . ')</strong>' : '') . '</small>') ?>
<div class="multimedia">
	<?php echo form_open_multipart('', array('id' => 'form-photo'));?>
	<span class="btn btn-primary fileinput-button">
		<span><i class="glyphicon glyphicon-upload"></i> <?php echo lang('upload_photos') ?></span>
		<input type="file" name="photo[]" multiple="multiple" id="photo" size="20">
	</span>
	<?php if (count($photos)) : ?>
	<div class="pull-right edit-files">
		<?php echo button_default(lang('edit'), 'btn-edit-files', 'glyphicon-edit', 'UPDATE') ?>
		<span class="none">
			<?php echo button_default(lang('cancel'), 'btn-cancel-files', 'glyphicon-ban-circle', 'UPDATE') ?>
			<?php echo button_primary(lang('save_data'), 'btn-save-files', 'glyphicon-ok', 'UPDATE') ?>
		</span>
	</div>
	<?php endif ?>
	<?php echo form_close(); ?>
	<form id="form-photos" onsubmit="return validate_data(this, '<?php echo base_url() ?>cms/page/save_descriptions/', 'btn-save-files', null, save_textareas)">
		<div class="row" id="photos-container">
			<?php $pks = '' ?>
			<?php foreach ($photos as $photo): ?>
				<?php $pks .= $photo->id_file . ',' ?>
				<div class="col-md-4">
					<div class="thumbnail">
						<div class="img" style="background-size: <?php echo $photo->image_width > $photo->image_height ? 'auto 100%' : '100% auto' ?>; background-image: url('<?php echo base_url() . 'assets/files/pages/photos/thumbnail/'. thumb_image($photo->filename); ?>')"></div>
						<div class="caption" id="buttons-photo">
							<div class="bg-buttons">
								<button type="button" class="preview btn btn-default btn-xs" data-role="<?php echo base_url() . 'assets/files/pages/photos/'. $photo->filename ?>" title="Vista previa" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-eye-open"></span></button>
								<a href="<?php echo base_url() . 'cms/page/download/' . $photo->filename ?>" class="btn btn-default btn-xs" title="Descargar" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-download"></span></a>
								<button type="button" class="portada btn btn-<?php echo $photo->primary == 'YES' ? 'primary' : 'default' ?> btn-xs" data-role="<?php echo $photo->id_file ?>" title="Establecer como portada" data-toggle="tooltip" data-placement="bottom">Portada</button>
								<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $photo->id_file ?>" title="Eliminar fotografía" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>						
							</div>
						</div>
						<div class="description">
							<p><?php echo strlen($photo->description) ? $photo->description : 'Sin descripción' ?></p>
						</div>
						<textarea name="description-<?php echo $photo->id_file ?>" placeholder="Escribir descripción..."><?php echo $photo->description ?></textarea>
					</div>
				</div>
			<?php endforeach ?>
			<input type="hidden" name="pks" value="<?php echo rtrim($pks, ',') ?>">
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#photo').on('change', function (event) {
    	event.preventDefault();
    	$('#form-photo').submit();
    });

    $('#form-photo').on('submit', function (event) {
    	var form = this;
        event.preventDefault();
        show_loading('Subiendo photos...');
        $.ajaxFileUpload({
			url           : _base_url + 'cms/page/upload_photos/<?php echo $id_page ?>',
			secureuri     : false,
			fileElementId : 'photo',
			dataType      : 'json',
			data          : {},
			success  : function (response) {
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
           		$.get(_base_url + 'cms/page/get_files/<?php echo $id_page ?>/PHOTO', function(data) {
           			$('#main-modal .modal-content').html(data);
           		});
            }
        });
    });

    $('#buttons-photo .delete').on('click', function() {
    	if (confirm('Delete!')) {
    		var $this = $(this);
    		show_loading('Eliminando foto');
    		$.get(_base_url + 'cms/page/delete_file/' + $this.data('role'), function(data) {
    			hide_loading();
    			message_ok('Foto eliminada');
    			$this.parent().parent().parent().parent().remove();
    			$('#count-items').html('(' + $('.multimedia .thumbnail').length + ')');
    		});
    	}
    });

    $('#buttons-photo .preview').on('click', function() {
    	$('#second-modal .modal-content').html('<div style="background: black;"><img style="margin: 0 auto;" class="img-responsive" src="' + $(this).data('role') +'"></div>');
    	$('#second-modal').modal();
    });

    var $buttons_portada = $('#buttons-photo .portada');
    $buttons_portada.on('click', function() {
		var $this = $(this);
		show_loading('Cambiando portada');
		$.get(_base_url + 'cms/page/set_primary_file/<?php echo $id_page ?>/' + $this.data('role') + '/PHOTO', function(data) {
			hide_loading();
			$buttons_portada.removeClass('btn-primary').addClass('btn-default');
			$this.addClass('btn-primary');
		});
    });

    var $textareas = $('.multimedia textarea'),
    	$description = $('.multimedia .description');
    send_form($('#btn-save-files'), $('#form-photos'));
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

    $('.multimedia .btn').tooltip();
</script>

<style type="text/css">
	.multimedia .thumbnail .description {
		bottom: 4px;
		color: #F0F0F0;
		display: none;
		font-size: 12px;
		left: 0;
		max-height: 40px;
		overflow: hidden;
		padding: 0;
		position: absolute;
		width: 100%;
	}
	.multimedia .thumbnail .description > p {
		background: rgba(0, 0, 0, 0.6);
		margin: 0 4px;
		padding: 5px;
	}
	.multimedia .thumbnail:hover .description {display: block;}
</style>