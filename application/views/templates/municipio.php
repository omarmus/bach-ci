<div class="container article page">
	<h2>Municipio de <?php echo $page->title ?></h2>
	<div class="row">
		<div class="col-md-12">
			<div class="section">
				<div id="carousel-municipio" class="carousel slide banner-municipio hidden-xs" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<?php for ($i=0; $i < count($atractivos)/2; $i += 2): ?>
						<li data-target="#carousel-municipio" data-slide-to="<?php echo $i/2 ?>" class="<?php echo $i ? '' : 'active' ?>"></li>
					<?php endfor ?>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
					<?php for ($i=0; $i <= count($atractivos)/2; $i += 2) : ?>
						<div class="item <?php echo $i ? '' : 'active' ?>">
							<div class="row">
								<div class="col-md-6">
									<img src="<?php echo base_url() . 'assets/files/articles/photos/' . $atractivos[$i]['primary_photo']->filename ?>" alt="">
									<?php if (strlen($atractivos[$i]['primary_photo']->description)): ?>
									<div class="carousel-caption left">
										<h3><?php echo $atractivos[$i]['primary_photo']->description ?></h3>
									</div>
									<?php endif ?>
								</div>
								<div class="col-md-6 hidden-sm">
									<img src="<?php echo base_url() . 'assets/files/articles/photos/' . $atractivos[$i+1]['primary_photo']->filename ?>" alt="">
									<?php if (strlen($atractivos[$i+1]['primary_photo']->description)): ?>
									<div class="carousel-caption">
										<h3><?php echo $atractivos[$i+1]['primary_photo']->description ?></h3>
									</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					<?php endfor; ?>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-municipio" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-municipio" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
				
				<div class="fb-like facebook-like" data-colorscheme="dark" data-href="<?php echo base_url() . $page->slug ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
				<div class="description"><?php echo $page->body ?></div>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" id="tab-files">
					<li class="active"><a href="#videos" data-toggle="tab">Videos</a></li>
					<li><a href="#audios" data-toggle="tab">Audios</a></li>
					<li><a href="#documents" data-toggle="tab">Documentos</a></li>
					<li><a href="#3D" data-toggle="tab">Modelos 3D</a></li>
					<li><a href="#apps" data-toggle="tab">Aplicaciones</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade in active" id="videos">
						<div class="row">
							<?php if (count($files['VIDEO'])): ?>
								<?php foreach ($files['VIDEO'] as $video): ?>
									<div class="col-md-4">
										<div class="responsive-container">
											<?php if ($video->type == 'YOUTUBE'): ?>
												<?php $url = str_replace(array('http:', 'https:'), '', str_replace(array('youtu.be/', 'www.youtube.com/watch?v='), 'www.youtube.com/embed/', $video->url)) ?>
												<iframe src="<?php echo $url ?>" frameborder="0" allowfullscreen></iframe>
											<?php else: ?>
												<?php $url = str_replace(array('http:', 'https:'), '', str_replace('vimeo.com/', 'player.vimeo.com/video/', $video->url)) ?>
												<iframe src="<?php echo $url ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
											<?php endif ?>
										</div>
										<?php if (strlen($video->description)): ?>
											<p><?php echo $video->description ?></p>
										<?php endif ?>
									</div>
								<?php endforeach ?>
							<?php else: ?>
								No tiene videos.
							<?php endif ?>
						</div>
					</div>
					<div class="tab-pane fade" id="audios">
						<div class="row">
							<?php if (count($files['AUDIO'])): ?>
								<?php foreach ($files['AUDIO'] as $audio): ?>
									<div class="col-md-6">
										<div class="thumbnail">
											<div class="audio">
												<audio preload="auto">
													<source src="<?php echo base_url() . 'assets/files/pages/audios/'. $audio->filename; ?>" />
												</audio>
												</div>
												<?php if (strlen($audio->description)): ?>
													<p><?php echo $audio->description ?></p>
												<?php endif ?>
											</div>
										</div>
									<?php endforeach ?>
							<?php else: ?>
								No tiene audios.
							<?php endif ?>
						</div>
					</div>
					<div class="tab-pane fade" id="documents">
						<div class="row">
							<?php if (count($files['DOCUMENT'])): ?>
								<?php foreach ($files['DOCUMENT'] as $document): ?>
									<div class="col-md-3 col-sm-6">
										<div class="thumbnail" data-toggle="tooltip" data-placement="bottom" title="">
											<div class="doc text-center">
												<?php $extension = explode('.', $document->filename) ?>
												<img  src="<?php echo base_url() . 'assets/img/docs/' . $imgs[$extension[count($extension)-1]] ?>">
												<div class="caption-doc"><?php echo $document->filename ?> </div>
											</div>
											<div class="">
												<p class="text-center"><a href="<?php echo base_url() . 'assets/files/pages/documents/' . $document->filename ?>"><em>Descargar</em></a></p>
												<?php if (strlen($document->description)): ?>
													<p><?php echo $document->description ?></p>
												<?php endif ?>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							<?php else: ?>
								No tiene documentos.
							<?php endif ?>
						</div>
					</div>
					<div class="tab-pane fade" id="3D">
						<div class="row">
							<?php if (count($files['3D'])): ?>
								<?php foreach ($files['3D'] as $animation): ?>
									<div class="col-md-6">
										<iframe class="animation" src="<?php echo base_url() . 'assets/files/pages/3D/' . $animation->filename ?>" frameborder="0"></iframe>
										<?php if (strlen($animation->description)): ?>
											<p><?php echo $animation->description ?></p>
										<?php endif ?>
									</div>
								<?php endforeach ?>
							<?php else: ?>
								No tiene modelos 3D
							<?php endif ?>
						</div>
					</div>
					<div class="tab-pane fade" id="apps">
						<div class="row">
							<?php if (count($files['APK'])): ?>
								<?php foreach ($files['APK'] as $document): ?>
									<div class="col-md-3 col-sm-6">
										<div class="thumbnail" data-toggle="tooltip" data-placement="bottom" title="">
											<div class="doc text-center">
												<?php $extension = explode('.', $document->filename) ?>
												<img  src="<?php echo base_url() . 'assets/img/docs/' . $imgs[$extension[count($extension)-1]] ?>">
												<div class="caption-doc"><?php echo $document->filename ?> </div>
											</div>
											<div class="">
												<p class="text-center"><a href="<?php echo base_url() . 'assets/files/pages/documents/' . $document->filename ?>"><em>Descargar</em></a></p>
												<?php if (strlen($document->description)): ?>
													<p><?php echo $document->description ?></p>
												<?php endif ?>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							<?php else: ?>
								No tiene aplicaciones.
							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="fb-comments" data-href="<?php echo base_url() . $page->slug ?>" data-numposts="5" data-colorscheme="light"> </div>		
			</div>
		</div>
	</div>
</div>
<div class="container">
	<h2>Atractivos turísticos del municipio de <?php echo $page->title ?></h2>
	<div id="masonry" class="row"></div>
	<div class="loading text-center"><img src="<?php echo base_url() ?>assets/img/spinner.gif"></div>
	<input type="hidden" id="pks" value="">
</div>
<script type="text/javascript">
 	var processing = true,
 		$tmpl_article = null,
 		$container = null,
 		$pks = null,
 		$loading = null;

	$(document).ready(function() {
		$tmpl_article = $('#article-tmpl').html(),
 		$container = $('#masonry'),
 		$pks = $('#pks'),
 		$loading = $('.loading');

		get_articles();

		$(window).on('scroll', function(event) {
			event.preventDefault();
			if (processing && $(window).scrollTop() >= ($(document).height() - $(window).height())*.9){
				processing = false;
			    get_articles();
			}
		});

		audiojs.events.ready(function() {
	    	var as = audiojs.createAll();
	    });
	});

	function get_articles () {
		$loading.show();
		$.post(base_url_ + 'article/get_articles', {pks : $pks.val(), id_page : <?php echo $page->id_page ?>}, function(data) {
			$loading.hide();
	    	processing = data.articles.length ? true : false;
	    	var elements = '';
	    	var articles = data.articles;
	    	for (var i = 0; i < articles.length; i++) {
	    		var article = {
		    		id_article : articles[i].id_article,
		    		photo : articles[i].photo,
		    		body : articles[i].body
		    	};
		    	elements += nano($tmpl_article, article);
	    	};
	    	var $elements = $( elements );
	    	set_event_articles($elements);
	        $container.append( $elements );
	        $pks.val() == '' ? $container.masonry() : $container.masonry( 'appended' , $elements );
	        console.log($pks.val(), data.pks, $pks.val() + data.pks);
	    	$pks.val($pks.val() + data.pks);
		}, 'json');
	}
</script>