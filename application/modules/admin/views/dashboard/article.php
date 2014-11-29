<?php $photo_user = !is_null($article->id_photo) ? ('assets/files/users/thumbnail/'. thumb_image($article->filename)) : ('assets/img/' . ($article->gender == 'M' ? 'profile-m.jpg' : 'profile.png')); ?>
<?php $photos_exist = (boolean) count($files['PHOTO']) ?>
<?php $videos_exist = (boolean) count($files['VIDEO']) ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="Pulse ESC para cerrar" data-toggle="tooltip" data-placement="bottom">&times;</button>
    <h4 class="modal-title">
    	<span id="content-title"><?php echo $article->title ?></span>
    	<?php if (strlen($edit)) : ?>
    	<button class="btn btn-default btn-xs edit" id="edit-title" title="Editar título" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-pencil"></span></button>
    	<small class="pull-right" style="margin: 6px 10px 0 0;"><em>Vista previa - Modo edición</em></small>
    	<?php endif; ?>
    </h4>
<?php if (strlen($edit) == 0 && isset($favorite)): ?>
	<div class="btn-group">
    	<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
    		<i class="glyphicon glyphicon-chevron-down"></i>
    	</button>
    	<ul class="dropdown-menu" role="menu" id="options-favorite">
    		<li><a href="#" data-role="<?php echo $article->id_article ?>" class="<?php echo $favorite ? 'delete-favorite' : 'add-favorite' ?> action-favorite"><?php echo $favorite ? 'Quitar como favorito' : 'Marcar como favorito' ?></a></li>
    	</ul>
    </div>
<?php endif ?>

<?php if (isset($favorite) && $favorite): ?>
	<div class="favorite-item"></div>	
<?php endif ?>
</div>
<div class="modal-body article">
	<div class="row">
	<?php if ($photos_exist || $videos_exist): ?>
		<div id="container-files" class="col-md-8">
			
		<?php if ($photos_exist && $videos_exist): ?>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="tab-files">
				<li class="active"><a href="#photos" data-toggle="tab"><i class="glyphicon glyphicon-camera"></i> Fotos</a></li>
				<li><a href="#videos" data-toggle="tab"><i class="glyphicon glyphicon-facetime-video"></i> Video</a></li>
			</ul>
		<?php endif ?>

			<!-- Tab panes -->
			<div class="tab-content">
				<?php if ($photos_exist): ?>
				<div class="tab-pane fade <?php echo ($photos_exist && $videos_exist) || ($photos_exist && !$videos_exist) ? 'in active' : '' ?>" id="photos">
					<div id="carousel-gallery" class="gallery carousel slide" data-ride="carousel">
					<?php if (count($files['PHOTO']) > 1): ?>	
						<!-- Indicators -->
						<ol class="carousel-indicators">
						<?php $c = 0 ?>
						<?php foreach ($files['PHOTO'] as $photo): ?>
							<?php 
								$active = $id_file == $photo->id_file || $id_file == 0 ? 'active' : '';
								$id_file != 0 || $id_file = -1;
							?>
							<li data-target="#carousel-gallery" data-slide-to="<?php echo $c++ ?>" class="<?php echo $active ?>"></li>
							<?php endforeach ?>
						</ol>
						<?php $id_file != -1 || $id_file = 0; ?>
					<?php endif ?>
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<?php foreach ($files['PHOTO'] as $photo): ?>
								<?php 
									$active = $id_file == $photo->id_file || $id_file == 0 ? 'active' : '';
									$id_file != 0 || $id_file = -1;
								?>
								<div class="item <?php echo $active ?>">
									<div>
										<div>
											<img data-height="<?php echo $photo->image_height ?>" data-width="<?php echo $photo->image_width ?>" src="<?php echo base_url() . 'assets/files/articles/photos/' . $photo->filename ?>" alt="">
											<div class="container-description">
												<?php if (strlen($photo->description)): ?>
													<div class="carousel-caption"><?php echo $photo->description ?></div>
												<?php endif ?>
											</div>
										</div>
									</div>
								<?php if (strlen($edit)) : ?>
									<div id="options-article" class="options-article">
										<button class="btn btn-default btn-xs edit-description edit" data-role="<?php echo $photo->id_file ?>" title="Editar descripción de la foto" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-pencil"></span></button> 
										<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $photo->id_file ?>" title="Eliminar fotografía" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>
									</div>
								<?php endif; ?>
								</div>  
							<?php endforeach ?>
						</div>
					<?php if (count($files['PHOTO']) > 1) : ?>
						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-gallery" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-gallery" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					<?php endif ?>
					</div>
				</div>
				<?php endif ?>
				<?php if ($videos_exist) : ?>
				<div class="tab-pane fade <?php echo (!$photos_exist && $videos_exist) ? 'in active' : '' ?>" id="videos">
					<div class="container-video">
						<div>
							<?php foreach ($files['VIDEO'] as $video): ?>
								<?php $url = str_replace(array('http:', 'https:'), '', str_replace(array('youtu.be/', 'www.youtube.com/watch?v='), 'www.youtube.com/embed/', $video->url)); ?>
								<div>
									<div class="responsive-container">
										<iframe src="<?php echo $url ?>?" frameborder="0" allowfullscreen></iframe>
										<?php if (strlen($edit)) : ?>
										<div id="video-article-edit" class="options-article">
											<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $video->id_video ?>" title="Eliminar video" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></button>
										</div>
									<?php endif; ?>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
		</div>
	<?php endif ?>
		<div class="col-md-4">
			<div id="container-description">
				<div class="info-article">
					<figure class="photo-user-article" style="background-image: url('<?php echo base_url($photo_user) ?>');"></figure>
					<p>
						<strong><a href="<?php echo base_url() ?>admin/profile/<?php echo $article->id_user ?>"><?php echo $article->first_name . ' ' . $article->last_name ?></a></strong><br>
						<em>Publicado el <a href="#" title="<?php echo datetime_literal($article->created) ?>" onclick="return false;"><?php echo date_literal($article->created) ?></a></em>
						<?php if (isset($number_visits)): ?>
						<br><em><a href="#" onclick="return false;">Visto <?php echo $number_visits ?> <?php echo $number_visits > 1 ? 'veces' : 'vez' ?></a></em>	
						<?php endif ?>
					</p>
				</div>
			<?php if ($article->id_page == 13): ?>
				<div class="categories">
					<em>
						Categoría(s):
						<span id="container-tags">
							<?php foreach ($tags as $tag): ?>
								<label class="label label-default"><?php echo $tag ?></label>
							<?php endforeach ?>
						</span>
					</em>
					<?php if (strlen($edit)) : ?>
					<button class="btn btn-default btn-xs edit pull-right" id="edit-categories" title="Editar categorias" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-pencil"></span></button> 
					<div class="content-edit" style="display: none;">
						<select name="tags[]" id="tags-article" data-placeholder="Seleccione o escriba una o varias categorías para el artículo" class="form-control chosen-select" multiple="multiple" style="margin-bottom: 5px;">
						<?php foreach ($tags_all as $key => $value): ?>
								<option value="<?php echo $key ?>" <?php echo isset($tags[$key]) ? 'selected' : '' ?>><?php echo $value ?></option>
							<?php endforeach ?>
						</select>
						<div>
							<button class="btn btn-default btn-xs">Cancelar</button>
							<button class="btn btn-primary btn-xs">Terminar edición</button>
						</div>
					</div>
					<?php endif; ?>
				</div>
			<?php endif ?>
				<div class="description" id="description-article">
					<?php if (strlen($edit)) : ?>
					<button class="btn btn-default btn-xs edit pull-right" id="edit-body" title="Editar descripción" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-pencil"></span></button> 
					<?php endif; ?>
					<span id="content-body"><?php echo $article->body ?></span>
				</div>
				<div class="documents" id="documents-article-modal">
					<div <?php echo strlen($edit) ? 'class="delete-documents"' : '' ?>>
						<?php foreach ($files['DOCUMENT'] as $document): ?>
							<div>
								<a class="btn btn-success" target="" href="<?php echo isset($favorite) ? base_url() . 'assets/files/articles/documents/' . $document->filename : "javascript:Alert('Debe registrarse e iniciar sesión para descargar los archivos')" ?>" title="Descargar <?php echo $document->filename ?>" data-toggle="tooltip" data-placement="left" data-role="<?php echo base_url() . 'assets/files/articles/documents/' . $document->filename ?>">
									<?php $extension = explode('.', $document->filename) ?>
									<img class="pull-left" src="<?php echo base_url() . 'assets/img/docs/' . $imgs[$extension[count($extension)-1]] ?>"> 
									<strong><?php echo ellipsize($document->filename, 30, 1) ?></strong>
									<span class="glyphicon glyphicon-download"></span>
								</a>
							<?php if (strlen($edit)) : ?>
								<button type="button" class="delete btn btn-danger btn-xs" data-role="<?php echo $document->id_file ?>" title="Eliminar documento" data-toggle="tooltip" data-placement="right"><i class="glyphicon glyphicon-trash"></i></button>
							<?php endif; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if (strlen($edit)): ?>
<div class="modal-footer">
	<div class="pull-left">
		<div class="inline-block" id="photos-article-edit">
			<?php $this->load->view('admin/dashboard/add_photos', $this->data); ?>
		</div>
		<div class="inline-block" id="videos-article-edit">
			<?php echo button('Video' ,'add-video-edit', 'glyphicon-facetime-video', NULL, 'btn-default', count($files['VIDEO'])) ?>
		</div>
	<?php if ($article->id_page == 13): ?>
		<div class="inline-block" id="documents-article-edit">
			<?php $this->load->view('admin/dashboard/add_documents', $this->data); ?>
		</div>
	<?php endif ?>
	</div>
	<?php if ($article->id_page == 13): ?>
		<?php echo button_submit('btn-sending', 'send_pending', 'sending') ?>
	<?php endif ?>
</div>	
<?php endif ?>
<?php if ($article->state == 'INACTIVE'): ?>
<div class="modal-footer">
	<?php echo button(lang('rechazar'), 'btn-inactived-article-panel', 'glyphicon-arrow-left', NULL, 'btn-warning') ?>
	<?php echo button_submit('btn-actived-article', 'aprobed_article', 'aprobed', 'btn-success') ?>
</div>	
<?php endif ?>
<style type="text/css">
<?php if ($photos_exist || $videos_exist): ?>
	.modal-dialog {width: 960px;}
<?php else : ?>
	.article .col-md-4 {width: 100%;}
<?php endif ?>
	h4.modal-title {color: crimson;}
	#tab-files a {padding: 5px 40px;}
	.modal-header {padding: 10px; position: relative;}
	.modal-footer {margin: 0;}
	.modal-header .close {margin: 3px 4px 0 0;}
	.modal-header .dropdown-menu {left: auto; margin: 0; right: 0;}
	.modal-header .btn-group {position: absolute; right: 33px; top: 15px;}
	.modal-header .btn-group.open .dropdown-toggle {box-shadow: none;}
	.modal-header .open .dropdown-toggle.btn-default {background-color: transparent;}
	.modal-header .btn.btn-default.btn-xs {border: none; color: #CCCCCC;}
	.modal-header .btn.btn-default.btn-xs:hover {border: none; color: #888888; background-color: transparent;}
	.article.modal-body {height: <?php echo ($photos_exist && $videos_exist) ? '482' : '450' ?>px; font-size: 14px; padding: 0 15px; margin-top: -1px;}
	.article .row > div {padding: 0;}
	.article .description {overflow: auto; text-align: justify;}
	.article .info-article {margin: 0; padding: 2px 10px 5px 0; font-size: .9em;}
	.article .info-article p {font-size: 12px; margin: 0; line-height: 14px;}
	.article .categories {margin-bottom: 10px; padding: 3px 0; line-height: 17px; overflow: hidden;}
	.article .carousel-inner > .item, .container-video {background-color: #181818; height: 450px; text-align: center;}
	.article .carousel-inner > .item > div, .container-video > div {display: table; height: 100%; width: 100%;}
	.article .carousel-inner > .item > div > div, .container-video > div > div {display: table-cell; height: 450px; vertical-align: middle;}
	.article .carousel-inner > .item > div > div > img {display: inline-block; max-height: 100%;}
	.article .col-md-4 > div {margin: 5px 10px 10px; position: relative; height: <?php echo ($photos_exist && $videos_exist) ? '467' : '435' ?>px;}
	.article .documents {position: absolute; bottom: 0; width: 100%;}
	.article .documents .btn {display: table; font-size: 12px; margin-top: 5px; padding: 2px 40px 2px 5px; position: relative; text-align: left; vertical-align: middle; white-space: normal; width: 100%;}
	.article .documents .btn img {height: 30px; margin: 5px 5px 0 0;}
	.article .documents .btn span {font-size: 20px; margin-top: -10px; position: absolute; right: 10px; top: 50%;}
	.article .documents .btn strong {display: table-cell; height: 40px; vertical-align: middle;}
	.article .chosen-container-multi {width: 100% !important;}
	.article .chosen-container-multi .chosen-choices {border: none; padding: 0 5px;}
	.article .search-field input {width: 287px !important;}
	.modal-footer {padding: 5px;}
	.article .carousel-inner .item .options-article, .container-video .options-article {position: absolute; top: 20px; right: 20px; display: block; height: auto; width: auto; z-index: 100;}
	.article .documents .delete-documents > div {position: relative;}
	.article .documents .delete-documents .btn.delete {display: block; margin: 0; padding: 2px 5px; position: absolute; right: 10px; top: 10px; width: auto;}
	.content-edit {background-color: #ffffff; display: none; border: 1px solid #ccc;}
	.content-edit textarea {width: 100%; height: auto; border: none; resize: none; padding: 5px;}
	.content-edit input {border: none; width: 440px;}
	.content-edit > div:last-child {text-align: right; background-color: #f0f0f0; border-top: 1px solid #ccc; padding: 5px;}
	.description .edit {margin-left: 10px;}
	.content-edit.horizontal {width: auto;}
	.content-edit.horizontal > div {border-left: 1px solid #CCCCCC; border-top: medium none; display: inline-block; height: 26px; padding: 2px 5px 3px; vertical-align: top;}
	.content-edit.horizontal .btn {vertical-align: top;}
	.container-description .carousel-caption {background: none repeat scroll 0 0 rgba(0, 0, 0, 0.6); bottom: 0; left: 0; margin: 0; padding: 10px; text-align: left; width: 100%;}
	.carousel-control.right, .carousel-control.left {background-image: none;}
	.carousel-indicators {bottom: 30px;}
</style>
<script type="text/javascript">

	var tmpl_edit = $('#tmpl-edit').html(),
		tmpl_edit_horizontal = $('#tmpl-edit-horizontal').html();

	$('.documents button, .delete, .close, .edit').tooltip();

	var $options_article = $('#options-favorite');
	$options_article.find('.add-favorite').on('click', function(event) {
		event.preventDefault();
		add_favorite(this);
	});
	$options_article.find('.delete-favorite').on('click', function(event) {
		event.preventDefault();
		events_delete_favorite(this);
	});

<?php if (strlen($edit)) : ?>
	$("#tags-article").chosen();

	$('#options-article .delete, #documents-article-modal .delete').on('click', function() {
		show_loading('Eliminando');
		$.get(base_url + 'admin/dashboard/delete_file_article/' + $(this).data('role'), function(data) {
			show_loading('Actualizando');
			$('#main-modal .modal-content').load(base_url + 'admin/dashboard/get_article/<?php echo $article->id_article ?>', function () {
				hide_loading();
			});
		});
	});

	$('#video-article-edit .delete').on('click', function() {
		show_loading('Eliminando video');
		$.get(base_url + 'admin/dashboard/delete_video_article/' + $(this).data('role'), function(data) {
			show_loading('Actualizando');
			$('#main-modal .modal-content').load(base_url + 'admin/dashboard/get_article/<?php echo $article->id_article ?>', function () {
				hide_loading();
				set_max_description();
			});
		});
	});

	edit_field('title', true);
	edit_field('body');

	$('#add-video-edit').on('click', function() {
		show_loading();
		$('#second-modal .modal-content').load(base_url + 'admin/dashboard/add_videos/<?php echo $article->id_article ?>', function () {
			hide_loading();
			var input = $('#second-modal').modal().find('input[type=text]').get(0);
			if (input) {
				setTimeout(function () {input.focus()}, 500);
			}
		});
	});

	$('#btn-sending').on('click', function() {
		var $this = $(this);
		$this.prop({disabled : true});
		$this.find('> span:first').hide();
		$this.find('> span:last').show();

		$.get(base_url + 'admin/dashboard/verify_article/<?php echo $article->id_article ?>', function(data) {
			if (data == 'OK') {
				if (confirm('Se procederá a enviar su artículo para su revisión y aprobación. Recuerde que ya no podrá editar este artículo una vez se haya enviado. ¿Está seguro de enviarlo?')) {
					show_loading('Enviando artículo');
					$.get(base_url + 'admin/dashboard/set_verify/<?php echo $article->id_article ?>', function(data) {
						message_ok('¡Artículo enviado!');
						hide_loading();
						hide_modal();
						$articles_pending.find('a.list-group-item').each(function () {
							var $this = $(this),
								id_article = $this.data('role');
							if (id_article == <?php echo $article->id_article ?>) {
								$this.parent().remove();
							}
						});
					});
				} else {
					$this.prop({disabled : false});
					$this.find('> span:first').show();
					$this.find('> span:last').hide();
				}
			} else {
				Alert('Debe adjuntar por lo menos un documento, foto o video antes de poder enviarlo.');
				$this.prop({disabled : false});
				$this.find('> span:first').show();
				$this.find('> span:last').hide();
			}
		});	
	});

	$('#btn-actived-article').on('click', function() {
		var $this = $(this);
		$this.prop({disabled : true});
		$this.find('> span:first').hide();
		$this.find('> span:last').show();
		show_loading('Aprobando artículo');
		$.get(base_url + 'admin/dashboard/set_active/' + <?php echo $article->id_article ?>, function(data) {
			hide_loading();
			hide_modal();
			$list_pending.find('a.list-group-item').each(function () {
				var $this = $(this),
					id_article = $this.data('role');
				if (id_article == <?php echo $article->id_article ?>) {
					$this.parent().remove();
				}
			});
		});		
	});

	$('#btn-inactived-article-panel').on('click', function() {
		show_loading();
		$('#second-modal .modal-content').load(base_url + 'admin/dashboard/return_article/<?php echo $article->id_article ?>', function () {
			hide_loading();
			$('#second-modal').modal();
			setTimeout(function () {$('#comments').focus()}, 500);
		});
	});

	$('.edit-description').on('click', function() {
		var $this = $(this),
			$content = $this.parent().prev().find('.carousel-caption'),
			$container = $($.parseHTML(nano(tmpl_edit, {value : $content.html()}))),
			$button_cancel = $container.find('.btn-default'),
			$button_save = $container.find('.btn-primary'),
			$input = $container.find('textarea');

		$input.autoResize({limit: (height_description - 40)});
		$this.hide().parent().prepend($container);
		$content.hide();
		$container.css({display: 'inline-block', verticalAlign : 'top', height : 'auto'});

		$input.on('keyup', function() {
			$button_save.prop('disabled', $input.val().length == 0);
		});

		$button_cancel.on('click', function() {
			$content.show();
			$container.hide();
			$this.show();
			$input.val($content.html());
		});

		$button_save.on('click', function() {
			show_loading('Guardando cambios');
			$button_save.prop('disabled', true);
			$button_cancel.prop('disabled', true);
			$.post(base_url + 'admin/dashboard/save_description_file', {id_file: $this.data('role'), value: $input.val()}, function(data) {
				hide_loading();
				$this.show();
				$button_save.prop('disabled', false);
				$button_cancel.prop('disabled', false);
				$content.show();
				$container.hide();
				if ($content.length) {
					$content.html($input.val());
				} else {
					$this.parent().prev().find('.container-description').html('<div class="carousel-caption">' + $input.val() + '</div>');
				}
			});
		});		
	});

	$('#edit-categories').on('click', function() {
		var $this = $(this),
			$categories = $this.prev(),
			$parent = $this.parent(),
			$input = $parent.find('.content-edit'),
			$button_cancel = $input.find('.btn-default'),
			$button_save = $input.find('.btn-primary');

		$this.hide();
		$parent.css('overflow', 'visible');
		$categories.hide();
		$input.show();

		$button_cancel.off().on('click', function() {
			$this.show();
			$parent.css('overflow', 'hidden');
			$categories.show();
			$input.hide();
		});

		$button_save.off().on('click', function() {
			show_loading('Guardando cambios');
			$button_save.prop('disabled', true);
			$button_cancel.prop('disabled', true);
			var $tags = $('#tags-article');
			$.post(base_url + 'admin/dashboard/save_categories_article', {id_article: <?php echo $article->id_article ?>, tags: $tags.val()}, function(data) {
				hide_loading();
				$button_save.prop('disabled', false);
				$button_cancel.prop('disabled', false);
				$this.show();
				$parent.css('overflow', 'hidden');
				$categories.show();
				$input.hide();

				var categories = '',
					tags = $tags.val(),
					length = tags.length;
	    		for (var i = 0; i < length; i++) {
	    			categories += nano(tmpl_tag, {
	    				id : tags[i], 
	    				tag : $tags.find('option[value='+tags[i]+']').text()
	    			});
	    		}
	    		$('#container-tags').html(categories);
			});
		});
		
	});

	function edit_field (field, horizontal) {
		$('#edit-' + field).on('click', function() {
			var $this = $(this),
				$content = $('#content-' + field),
				$container = $($.parseHTML(nano(horizontal ? tmpl_edit_horizontal : tmpl_edit, {value : $content.html()}))),
				$button_cancel = $container.find('.btn-default'),
				$button_save = $container.find('.btn-primary'),
				$input = $container.find(horizontal ? 'input' : 'textarea');

			horizontal || $input.autoResize({limit: (height_description - 40)});
			$this.hide().parent().append($container);
			$content.hide();
			$container.css('display', horizontal ? 'inline-block' : 'block');

			$input.on('keyup', function() {
				$button_save.prop('disabled', $input.val().length == 0);
			});

			$button_cancel.on('click', function() {
				$content.show();
				$container.hide();
				$this.show();
				$input.val($content.html());
			});

			$button_save.on('click', function() {
				show_loading('Guardando cambios');
				$button_save.prop('disabled', true);
				$button_cancel.prop('disabled', true);
				$.post(base_url + 'admin/dashboard/save_field_article', {id_article: <?php echo $article->id_article ?>, field : field, value: $input.val()}, function(data) {
					hide_loading();
					$this.show();
					$button_save.prop('disabled', false);
					$button_cancel.prop('disabled', false);
					$content.show();
					$container.hide();
					$content.html($input.val());
					if (field == 'title') {
						$articles_pending.find('a.list-group-item').each(function () {
							var $this = $(this),
								id_article = $this.data('role');
							if (id_article == <?php echo $article->id_article ?>) {
								$this.children('strong').html($input.val());
							}
						});
					}
				});
			});
		});
	}
<?php endif; ?>
</script>

<script type="text/tmpl-js" id="tmpl-edit">
	<div class="content-edit">
		<textarea>{value}</textarea>
		<div>
			<button class="btn btn-default btn-xs">Cancelar</button>
			<button class="btn btn-primary btn-xs">Terminar edición</button>
		</div>
	</div>
</script>

<script type="text/tmpl-js" id="tmpl-edit-horizontal">
	<div class="content-edit horizontal">
		<input type="text" value="{value}">
		<div>
			<button class="btn btn-default btn-xs">Cancelar</button>
			<button class="btn btn-primary btn-xs">Terminar edición</button>
		</div>
	</div>
</script>