<?php echo modal_header($page->title . ' <small>' . lang('videos') . ' ' . (count($videos) ? '<strong id="count-items">(' . count($videos) . ')</strong>' : '') . '</small>') ?>
<div class="multimedia">

	<form class="form-horizontal" id="form-video" role="form">
		<div class="form-group">
			<label class="control-label col-sm-2" for="url-video">URL</label>
			<div class="col-sm-7">
				<input type="text" name="url" class="form-control" id="url-video">
			</div>
			<div class="col-sm-3">
				<input type="hidden" name="id_page" value="<?php echo $id_page ?>">
				<button type="submit" class="btn btn-primary"><?php echo lang('add_video') ?></button>
			</div>
		</div>
	</form>
	<?php if (count($videos)) : ?>
	<div class="buttons-edit">
		<div class="pull-right edit-files">
			<?php echo button_default(lang('edit'), 'btn-edit-files', 'glyphicon-edit', 'UPDATE') ?>
			<span class="none">
				<?php echo button_default(lang('cancel'), 'btn-cancel-files', 'glyphicon-ban-circle', 'UPDATE') ?>
				<?php echo button_primary(lang('save_data'), 'btn-save-files', 'glyphicon-ok', 'UPDATE') ?>
			</span>
		</div>
	</div>
	<?php endif ?>
	<form id="form-videos" onsubmit="return validate_data(this, '<?php echo base_url() ?>cms/page/save_descriptions_video/', 'btn-save-files', null, save_textareas)">
		<div class="row" id="videos-container">
			<?php $pks = '' ?>
			<?php foreach ($videos as $video): ?>
				<?php $pks .= $video->id_video . ',' ?>
				<div class="col-md-6">
					<div class="thumbnail">
						<div class="img">
						<?php if ($video->type == 'YOUTUBE'): ?>
							<?php $url = str_replace(array('http:', 'https:'), '', str_replace(array('youtu.be/', 'www.youtube.com/watch?v='), 'www.youtube.com/embed/', $video->url)) ?>
							<iframe src="<?php echo $url ?>" width="260" height="190" frameborder="0" allowfullscreen></iframe>
						<?php else: ?>
							<?php $url = str_replace(array('http:', 'https:'), '', str_replace('vimeo.com/', 'player.vimeo.com/video/', $video->url)) ?>
							<iframe src="<?php echo $url ?>" width="260" height="190" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<?php endif ?>
						</div>
						<div class="caption" id="buttons-video">
							<button type="button" class="portada btn btn-<?php echo $video->primary == 'YES' ? 'primary' : 'default' ?> btn-xs" data-role="<?php echo $video->id_video ?>" title="Establecer como portada" data-toggle="tooltip" data-placement="bottom">Portada</button>
							<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $video->id_video ?>" title="Eliminar video" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>						
						</div>
						<div class="description">
							<p><?php echo strlen($video->description) ? $video->description : 'Sin descripción' ?></p>
						</div>
						<textarea name="description-<?php echo $video->id_video ?>" placeholder="Escribir descripción..."><?php echo $video->description ?></textarea>
					</div>
				</div>
			<?php endforeach ?>
			<input type="hidden" name="pks" value="<?php echo rtrim($pks, ',') ?>">
		</div>
	</form>
</div>

<script type="text/javascript">

	$('#form-video').on('submit', function(event) {
		event.preventDefault();
		show_loading('Agregando video');
		var $form = $(this);
		$.post(base_url + 'cms/page/upload_video/<?php echo $id_page ?>', $(this).serialize(), function(data) {
			hide_loading();
			$form.find('.input-error').remove();
			if (data.status == 'OK') {
				message_ok('Video subido');
				$('#main-modal .modal-content').html(data.html);
			} else {
				$('#url-video').parent().append(data.html);
			}			
		}, 'json');
	});

    $('#buttons-video .delete').on('click', function() {
    	if (confirm('Delete!')) {
    		var $this = $(this);
    		show_loading('Eliminando video');
    		$.get(base_url + 'cms/page/delete_video/' + $this.data('role'), function(data) {
    			hide_loading();
    			message_ok('Video eliminado');
    			$this.parent().parent().parent().remove();
    			$('#count-items').html('(' + $('.multimedia .thumbnail').length + ')');
    		});
    	}
    });

    var $buttons_portada = $('#buttons-video .portada');
    $buttons_portada.on('click', function() {
		var $this = $(this);
		show_loading('Cambiando portada');
		$.get(base_url + 'cms/page/set_primary_video/<?php echo $id_page ?>/' + $this.data('role'), function(data) {
			hide_loading();
			$buttons_portada.removeClass('btn-primary').addClass('btn-default');
			$this.addClass('btn-primary');
		});
    });

    var $textareas = $('.multimedia textarea');
    var $description = $('.multimedia .description');
    send_form($('#btn-save-files'), $('#form-videos'));
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
</script>

<style type="text/css">
	.multimedia .thumbnail .img {height: 190px; }
	.form-horizontal .form-group > div, .form-horizontal .form-group label {padding: 0 2px; }
	.form-horizontal label.control-label {padding-top: 7px; padding-right: 10px; }
	.form-horizontal .form-group {margin: 0 -25px; }
	.multimedia .thumbnail .caption {left: 50%; margin-left: -45px; padding: 2px 4px 7px 3px; width: auto; }
	.edit-files {margin: 15px 10px 0 10px;}
	.buttons-edit {overflow: hidden;}
	.multimedia .thumbnail .description > p {margin: 0; padding: 5px; font-size: 12px;}
</style>