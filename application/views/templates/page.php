<div class="container article">
	<h2><?php echo $page->title ?></h2>
	<div class="row">
		<div class="col-md-9">
			<div class="section">
				<div class="fb-like facebook-like" data-colorscheme="dark" data-href="<?php echo base_url() . $page->slug ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"> </div>
			<?php if (count($primary_photo)): ?>
				<div class="thumbnail">
					<img src="<?php echo base_url() . 'assets/files/pages/photos/' . $primary_photo->filename ?>">
					<?php if (strlen($primary_photo->description)): ?>
						<div class="caption-primary"><?php echo $primary_photo->description ?></div>	
					<?php endif ?>
				</div>	
			<?php endif ?>

				<div class="description"><?php echo $page->body ?></div>

			<?php if ($tab_panel): ?>	
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" id="tab-files">
				<?php if (count($files['PHOTO'])): ?>
					<li class="active"><a href="#images" data-toggle="tab">Imágenes</a></li>
				<?php endif; ?>
				<?php if (count($files['VIDEO'])): ?>
					<li><a href="#videos" data-toggle="tab">Videos</a></li>
				<?php endif; ?>
				<?php if (count($files['AUDIO'])): ?>
					<li><a href="#audios" data-toggle="tab">Audios</a></li>
				<?php endif; ?>
				<?php if (count($files['DOCUMENT'])): ?>
					<li><a href="#documents" data-toggle="tab">Documentos</a></li>
				<?php endif; ?>
				<?php if (count($files['3D'])): ?>
					<li><a href="#3D" data-toggle="tab">Modelos 3D</a></li>
				<?php endif; ?>
				<?php if (count($files['APK'])): ?>
					<li><a href="#apps" data-toggle="tab">Aplicaciones</a></li>
				<?php endif; ?>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				<?php if (count($files['PHOTO'])): ?>
					<div class="tab-pane fade in active" id="images">
						<div class="row photos" id="masorny">
							<?php foreach ($files['PHOTO'] as $photo): ?>
								<div class="col-md-3 col-sm-4 col-xs-6">
									<a href="#" class="thumbnail" data-role="<?php echo $photo->id_file ?>" title="<?php echo $photo->description ?>">
										<img class="img-responsive" src="<?php echo base_url() . 'assets/files/pages/photos/thumbnail/'. thumb_image($photo->filename); ?>">
									</a>
								</div>
							<?php endforeach ?>
						</div>
						<script type="text/javascript">
							$(document).ready(function() {
								$('.photos .thumbnail').on('click', function(event) {
									event.preventDefault();
									show_loading();
									$.get(base_url_ + 'page/gallery/<?php echo $page->id_page ?>/' + $(this).data('role'), function(data) {
										hide_loading();
										$('#main-modal').modal();
										$('#main-modal-container').html(data);
									});
								});
							});
						</script>
					</div>
				<?php endif ?>
				<?php if (count($files['VIDEO'])): ?>
					<div class="tab-pane fade in active" id="videos">
						<div class="row">
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
						</div>
					</div>
				<?php endif ?>
				<?php if (count($files['AUDIO'])): ?>
					<div class="tab-pane fade" id="audios">
						<div class="row">
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
						</div>
					</div>
				<?php endif ?>
				<?php if (count($files['DOCUMENT'])): ?>
					<div class="tab-pane fade" id="documents">
						<div class="row">
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
						</div>
					</div>
				<?php endif ?>
				<?php if (count($files['3D'])): ?>
					<div class="tab-pane fade" id="3D">
						<div class="row">
							<?php foreach ($files['3D'] as $animation): ?>
								<div class="col-md-6">
									<iframe class="animation" src="<?php echo base_url() . 'assets/files/pages/3D/' . $animation->filename ?>" frameborder="0"></iframe>
									<?php if (strlen($animation->description)): ?>
										<p><?php echo $animation->description ?></p>
									<?php endif ?>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>
				<?php if (count($files['APK'])): ?>
					<div class="tab-pane fade" id="apps">
						<div class="row">
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
						</div>
					</div>
				<?php endif ?>
				</div>
			<?php endif ?>
				<div class="fb-comments" data-href="<?php echo base_url() . $page->slug ?>" data-numposts="5" data-colorscheme="light"> </div>		
			</div>
		</div>
		<div class="col-md-3">
			<div class="articles row">
				<?php foreach ($articles as $article): ?>
					<?php $link = base_url() . 'article/' . $article['article']->id_article . '/' . $article['article']->slug ?>
					<article class="col-md-12 col-sm-6" data-role="<?php echo $article['article']->id_article ?>">
						<h4><a href="<?php echo $link ?>"><?php echo $article['article']->title ?></a></h4>
						<a href="<?php echo $link ?>"><figure style="height: 150px; background-size: <?php echo $article['primary_photo']->image_width > $article['primary_photo']->image_height ? '100%' : '100% auto' ?>; background-image: url('<?php echo base_url() . 'assets/files/articles/photos/thumbnail/'. thumb_image($article['primary_photo']->filename); ?>')"></figure></a>
						<div><?php echo character_limiter($article['article']->body, 60) ?> <a href="<?php echo $link ?>">Leer más...</a></div>
					</article>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>