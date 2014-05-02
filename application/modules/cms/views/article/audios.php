<?php echo modal_header($article->title . ' <small>' . lang('audios') . ' ' . (count($audios) ? '<strong id="count-items">(' . count($audios) . ')</strong>' : '') . '</small>') ?>
<div class="multimedia">
	<?php echo form_open_multipart('', array('id' => 'form-audio'));?>
	<span class="btn btn-primary fileinput-button">
		<span><i class="glyphicon glyphicon-upload"></i> <?php echo lang('upload_audios') ?></span>
		<input type="file" name="audio[]" multiple="multiple" id="audio" size="20">
	</span>
	<?php if (count($audios)) : ?>
	<div class="pull-right edit-files">
		<?php echo button_default(lang('edit'), 'btn-edit-files', 'glyphicon-edit', 'UPDATE') ?>
		<span class="none">
			<?php echo button_default(lang('cancel'), 'btn-cancel-files', 'glyphicon-ban-circle', 'UPDATE') ?>
			<?php echo button_primary(lang('save_data'), 'btn-save-files', 'glyphicon-ok', 'UPDATE') ?>
		</span>
	</div>
	<?php endif ?>
	<?php echo form_close(); ?>
	<form id="form-audios" onsubmit="return validate_data(this, '<?php echo base_url() ?>cms/article/save_descriptions/', 'btn-save-files', null, save_textareas)">
		<div class="row" id="audios-container">
			<?php $pks = '' ?>
			<?php foreach ($audios as $audio): ?>
				<?php $pks .= $audio->id_file . ',' ?>
				<div class="col-md-12">
					<div class="thumbnail">
						<div class="img">
							<audio preload="auto">
								<source src="<?php echo base_url() . 'assets/files/articles/audios/'. $audio->filename; ?>" />
							</audio>
						</div>
						<div class="caption" id="buttons-audio">
							<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $audio->id_file ?>" title="Eliminar audio" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-trash"></span></button>						
						</div>
						<div class="description">
							<p><?php echo strlen($audio->description) ? $audio->description : 'Sin descripción' ?></p>
						</div>
						<textarea name="description-<?php echo $audio->id_file ?>" placeholder="Escribir descripción..."><?php echo $audio->description ?></textarea>
					</div>
				</div>
			<?php endforeach ?>
			<input type="hidden" name="pks" value="<?php echo rtrim($pks, ',') ?>">
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#audio').on('change', function (event) {
    	event.preventDefault();
    	$('#form-audio').submit();
    });

    $('#form-audio').on('submit', function (event) {
    	var form = this;
        event.preventDefault();
        show_loading('Subiendo audios...');
        $.ajaxFileUpload({
			url           : _base_url + 'cms/article/upload_audios/<?php echo $id_article ?>',
			secureuri     : false,
			fileElementId : 'audio',
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
           		$.get(_base_url + 'cms/article/get_files/<?php echo $id_article ?>/AUDIO', function(data) {
           			$('#main-modal .modal-content').html(data);
           		});
            }
        });
    });

    $('#buttons-audio .delete').on('click', function() {
    	if (confirm('Delete!')) {
    		var $this = $(this);
    		show_loading('Eliminando audio');
    		$.get(_base_url + 'cms/article/delete_file/' + $this.data('role'), function(data) {
    			hide_loading();
    			message_ok('Audio eliminado');
    			$this.parent().parent().parent().remove();
    			$('#count-items').html('(' + $('.multimedia .thumbnail').length + ')');
    		});
    	}
    });

    var $textareas = $('.multimedia textarea'),
    	$description = $('.multimedia .description');
    send_form($('#btn-save-files'), $('#form-audios'));
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

    $('.multimedia button').tooltip();

    audiojs.events.ready(function() {
    	var as = audiojs.createAll();
    });
</script>

<style type="text/css">
	.multimedia .thumbnail .img {height: auto;}
	.multimedia .thumbnail .caption {background-color: transparent; top: 6px; left: auto; right: 2px; width: 30px;}
	.multimedia .thumbnail .description > p {margin: 0; padding: 5px; font-size: 12px;}
</style>