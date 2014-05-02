<div class="row">
	<div class="col-md-3">
		<div class="link-profile">
			<div class="statics">
				<label class="label label-danger"><span class="glyphicon glyphicon-star" style="color: yellow;"></span> <?php echo $total_articles ?> artículos publicados en total</label>
			</div>
			<div class="row">
				<div class="col-md-3">
					<a href="<?php echo base_url('profile')?>">
						<div style="<?php echo $userdata_['photo'] != "" ? "background-image: url('" . base_url() . 'assets/files/users/thumbnail/'. thumb_image($userdata_['photo']) . "')" : '' ?>">
							<?php if ($userdata_['photo'] == ""): ?>
								<img src="<?php echo base_url('assets/img/'. ($userdata_['gender'] == 'M' ? 'profile-m.jpg' : 'profile.png')) ?>" class="img-responsive" style="background-color: #ffffff;"/>
							<?php endif ?>
						</div>
					</a>
				</div>
				<div class="col-md-9">
					<strong><a href="<?php echo base_url('profile')?>"><?php echo $userdata_['first_name'] . ' ' . $userdata_['last_name'] ?></a></strong>
					<p style="font-size: 10px;">
						<span class="glyphicon glyphicon-ok"></span> <strong><?php echo $total_articles_user ?></strong> artículo<?php echo $total_articles_user > 1 ? 's' : '' ?> publicado<?php echo $total_articles_user > 1 ? 's' : '' ?>. <br>
						<span class="glyphicon glyphicon-star-empty"></span> <strong><?php echo count($articles_pending) ?></strong> artículo<?php echo count($articles_pending) > 1 ? 's' : '' ?> pendiente<?php echo count($articles_pending) > 1 ? 's' : '' ?> de revisión.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="row collapse-row">
			<div class="col-md-8">
				<div class="container-row">
					<div class="form-group">
						<form method="post" id="post-article">
							<?php $this->load->view('admin/dashboard/add_article', $this->data); ?>
						</form>
						<div>
							<div id="container-photos">
								<?php $this->load->view('admin/dashboard/list_photos', $this->data); ?>
							</div>
							<div id="container-videos">
								<?php $this->load->view('admin/dashboard/list_videos', $this->data); ?>
							</div>
							<div id="container-documents">
								<?php $this->load->view('admin/dashboard/list_documents', $this->data); ?>
							</div>
						</div>
						<div class="inline-block" id="photos-article">
							<?php $this->load->view('admin/dashboard/add_photos', $this->data); ?>
						</div>
						<div class="inline-block" id="videos-article">
							<?php echo button_modal('Video' ,'admin/dashboard/add_videos', 'glyphicon-facetime-video', NULL, NULL, NULL, 'btn-danger', count($files['VIDEO'])) ?>
						</div>
						<div class="inline-block" id="documents-article">
							<?php $this->load->view('admin/dashboard/add_documents', $this->data); ?>
						</div>
						<div class="pull-right"><?php echo button_submit('btn-publish', 'publish', 'publishing') ?></div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel info-articles">
					<div class="panel-heading btn-info">
						<h4 class="panel-title" style="font-size: 13px;"><strong><?php echo 'Mis artículos pendientes de revisión' ?></strong></h4>
					</div>
					<div class="list-group">
					<?php foreach ($articles_pending as $article): ?>
						<div class="list-group-item">
							<a href="#"  class="list-group-item" data-role="<?php echo $article->id_article ?>">
								<span class="glyphicon glyphicon-star-empty" style="color: #F0AD4E;"></span> <?php echo $article->title ?>
							</a>
							<button class="btn btn-danger btn-xs" data-role="<?php echo $article->id_article ?>"><span class="glyphicon glyphicon-trash"></span></button>
						</div>
					<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		
		<div id="masonry" class="row"></div>
		<div class="loading text-center"><img src="<?php echo base_url() ?>assets/img/spinner.gif"></div>
		<input type="hidden" id="pks" value="">
		<div class="row"><div class="col-md-6 col-md-offset-6" id="width">&nbsp;</div></div>
	</div>
</div>

<script type="text/js-tmpl" id="article-tmpl">
    <article class="col-md-6 col-sm-6 col-xs-12" >
        <div>
        	<div class="info-article">
        		<figure class="photo-user-article" style="background-image: url('<?php echo base_url() ?>{photo_user}');"></figure>
        		<p>
        			<strong><a href="<?php echo base_url() ?>admin/profile/{id_user}">{name_user}</a></strong> a publicado un artículo<br>
        			<em><a href="#" title="{date}" onclick="return false;">{date_literal}</a></em>
        		</p>
        	</div>
            <div class="details-article" data-role="{id_article}">
            	<div>
            	    <h3>{title}</h3>
            	    {body}
            	</div>
            	{image}
            </div>
        </div>  
    </article>
</script>

<script type="text/js-tmpl" id="image-tmpl">
	<img class="img-responsive" src="<?php echo base_url() ?>{photo}" style="height: {height}px">
</script>

<script type="text/js-tmpl" id="video-tmpl">
	<div class="video-youtube">
		<iframe src="{url}?controls=0" width="{width}" height="{height}" frameborder="0" allowfullscreen></iframe>
	</div>
</script>

<script type="text/js-tmpl" id="loading-tmpl">
	<div class="loading text-center"><img src="<?php echo base_url() ?>assets/img/spinner.gif"></div>
</script>

<style type="text/css">
	.input-error {margin-bottom: 5px;}
	.placeholder {color: #999;}
	.inline-block {display: inline-block; vertical-align: top;}
	.multimedia {margin: 0;}
	.multimedia.row > div {padding: 0 2px;}
	.multimedia .thumbnail {padding: 2px; margin-bottom: 5px;}
	.multimedia .thumbnail .img {height: 90px;}
	.multimedia .thumbnail.video .img {height: auto;}
	.multimedia .thumbnail.document .img {font-size: 10px; height: 22px; line-height: 12px;}
	.multimedia .thumbnail.document img {height: 22px;}
	.multimedia .thumbnail .caption {display: block; text-align: right; top: 2px;}
	.multimedia .thumbnail .caption button {margin-right: 2px;}
	.multimedia .thumbnail .caption .bg-buttons {background-color: transparent;}
	.multimedia .thumbnail.video .caption button {margin: 4px 6px 0 0;}
	.statics label {display: block; font-size: 12px; line-height: 25px; margin-bottom: 10px; width: 100%; } 
	.info-articles .list-group {overflow: auto; height: 200px;}
	.info-articles .list-group > div {position: relative; padding: 0;}
	.info-articles .list-group a {font-size: 12px;}
	.info-articles .list-group .btn {display: none; position: absolute; top: 8px; right: 8px; z-index: 10;}
	.info-articles .list-group > div:hover .btn {display: block;}
</style>
<script type="text/javascript">
	var processing = true,
 		$tmpl_article = null,
 		$tmpl_image = null,
 		$container = null,
 		$loading = null,
 		$loading_ajax = null,
 		ini = 0;

	$(document).ready(function() {

		var $form = $('#post-article'),
			$btn_submit = $('#btn-publish'),
			$loading_ajax = $('#loading-tmpl').html();

 		$form.on('submit', function(event) {
 			event.preventDefault();

 			var form = this;
 			$btn_submit.prop({disabled : true});
 			$btn_submit.find('> span:first').hide();
			$btn_submit.find('> span:last').show();
 		
 			$.post(_base_url + 'admin/dashboard/save_article', $form.serialize(), function(response) {
 				$btn_submit.prop({disabled : false});
 				$btn_submit.find('> span:first').show();
				$btn_submit.find('> span:last').hide();
 				$form.html(response);

 				var id_article = $('#id-article').val();
 				if (!isNaN(parseInt(id_article))) {
 					$('#container-photos, #container-videos, #container-documents').html('');
 					$('#title, #body').val('');

 					show_modal(_base_url + 'admin/dashboard/get_article/' + id_article);		
 				} else {
 					if (id_article != '') {
 						message_error(id_article);
 						setTimeout(function () {
 							window.location = '';
 						}, 3000);
 					}
 					var error = $form.html(response).find('.input-error').get(0);
 					setTimeout(function () {$(error).prev().focus()}, 300);
 					$form.find('input, textarea').on('keypress', function () {
 						$(this).next().fadeOut();
 					});
 				}
 			});
 		});

 		$btn_submit.on('click', function() {
 			$form.submit();
 		});

		$tmpl_article = $('#article-tmpl').html();
		$tmpl_image = $('#image-tmpl').html();
		$tmpl_video = $('#video-tmpl').html();
 		$container = $('#masonry');
 		$pks = $('#pks');
 		$loading = $('.loading'),
 		$link_profile = $('.link-profile');

		get_articles();

		$(window).on('scroll', function(event) {
			event.preventDefault();
			var scrollTop = $(window).scrollTop();
			if (processing && scrollTop >= ($(document).height() - $(window).height())*.9){
				processing = false;
			    get_articles();
			}
			$link_profile.css({position: scrollTop > 40 ? 'fixed' : 'static', top: '60px', width : scrollTop > 40 ? $link_profile.width() : 'auto'});
		});

		$('#main-modal').on('shown.bs.modal', function () {
			var width_container = $('#container-files').width(),
				height_documents = $('#documents-article-modal').height();

			$('#description-article').height($('#container-description').height() - height_documents - 65);

			$('#carousel-gallery img').each(function() {
				var $this = $(this),
					height = $this.data('height'),
					width = $this.data('width');
				if (width > width_container && (width_container * height / width) < 450) {
					$this.width('100%');
				}
			});

			$('.documents button').tooltip();
		});

		$('#main-modal').on('hidden.bs.modal', function () {
			$('#main-modal .modal-content').html('');
		});

		$('.info-articles a.list-group-item').on('click', function(event) {
			event.preventDefault();
			show_modal(_base_url + 'admin/dashboard/get_article/' + $(this).data('role'));
		});

		$('.info-articles .btn').on('click', function() {
			var $this = $(this);
			if (confirm('Desea eliminar el artículo')) {
				show_loading('Eliminando artículo');
				$.get(_base_url + 'admin/dashboard/delete_article/' + $(this).data('role'), function(data) {
					hide_loading();
					$this.parent().remove();
				});
			}
		});
	});

	function delete_files_events (id) {
		$('#' + id + ' .delete').on('click', function() {
			var $this = $(this);
			show_loading('Eliminando');
			$.get(_base_url + 'admin/dashboard/delete_file/' + $this.data('role'), function(data) {
				hide_loading();
				$this.parent().parent().parent().remove();
				if (id == 'container-videos') {
					$('#videos-article button').prop({disabled: false});
				};
			});
	    });
	}

	function get_articles () {
		$loading.show();
		$.post(_base_url + 'admin/dashboard/get_articles', {pks : $pks.val(), id_page : 13, ini : ini}, function(data) {
			$loading.hide();
			ini += 10;
	    	processing = data.articles.length ? true : false;
	    	var elements = '';
	    	var articles = data.articles;
	    	for (var i = 0; i < articles.length; i++) {
	    		var image = '';
	    		if (articles[i].photo.length) {
	    			image = nano($tmpl_image, {
		    			photo : articles[i].photo,
		    			height : parseInt(_width * articles[i].height / articles[i].width)
		    		});
	    		} else {
	    			if (articles[i].video.length) {
	    				image = nano($tmpl_video, {
	    					url : articles[i].video,
	    					width : _width - 2,
	    					height : parseInt(_width * 480 / 720)
	    				});
	    			}
	    		}
	    		var article = {
		    		id_article : articles[i].id_article,
		    		title : articles[i].title,
		    		body : articles[i].body,
		    		date : articles[i].date,
		    		date_literal : articles[i].date_literal,
		    		name_user : articles[i].name_user,
		    		photo_user : articles[i].photo_user,
		    		id_user : articles[i].id_user,
		    		image : image
		    	};
		    	elements += nano($tmpl_article, article);
	    	};
	    	var $elements = $( $.parseHTML(elements) );
	    	set_event_articles($elements);
	        $container.append( $elements );
	        $pks.val() == '' ? $container.masonry() : $container.masonry( 'appended' , $elements );
	    	$pks.val($pks.val() + data.pks);
		}, 'json');
	}

	function set_event_articles ($elements) {
		$elements.find('.details-article').on('click', function() {
			show_modal(_base_url + 'admin/dashboard/get_article/' + $(this).data('role'));
		});
	}
</script>

<?php if ($tour == 'YES') : ?>
<?php $this->load->view('admin/dashboard/tour', $this->data); ?>
<?php endif ?>
