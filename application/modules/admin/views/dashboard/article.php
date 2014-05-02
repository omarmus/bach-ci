<?php $photo_user = !is_null($article->id_photo) ? ('assets/files/users/thumbnail/'. thumb_image($article->filename)) : ('assets/img/' . ($article->gender == 'M' ? 'profile-m.jpg' : 'profile.png')); ?>
<?php $photos_exist = (boolean) count($files['PHOTO']) ?>
<?php $videos_exist = (boolean) count($files['VIDEO']) ?>
<?php echo modal_header($article->title) ?>
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
											<?php if (strlen($photo->description)): ?>
												<div class="carousel-caption">
													<h3><?php echo $photo->description ?></h3>
												</div>
											<?php endif ?>
										</div>
									</div>
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
					</p>
				</div>
				<div class="description" id="description-article"><?php echo $article->body ?></div>
				<div class="documents" id="documents-article-modal">
					<div>
						<?php foreach ($files['DOCUMENT'] as $document): ?>
							<button class="btn btn-success" title="Descargar <?php echo $document->filename ?>" data-toggle="tooltip" data-placement="left">
								<?php $extension = explode('.', $document->filename) ?>
								<img class="pull-left" src="<?php echo base_url() . 'assets/img/docs/' . $imgs[$extension[count($extension)-1]] ?>"> 
								<strong><?php echo ellipsize($document->filename, 30, 1) ?></strong>
								<span class="glyphicon glyphicon-download"></span>
							</button>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ($edit): ?>
<div class="modal-footer">
	<div class="inline-block" id="photos-article">
		<?php $this->load->view('admin/dashboard/add_photos', $this->data); ?>
	</div>
	<div class="inline-block" id="videos-article">
		<?php echo button_modal('Video' ,'admin/dashboard/add_videos', 'glyphicon-facetime-video', NULL, NULL, NULL, 'btn-danger', count($files['VIDEO'])) ?>
	</div>
	<div class="inline-block" id="documents-article">
		<?php $this->load->view('admin/dashboard/add_documents', $this->data); ?>
	</div>
    <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> <?php echo 'Enviar para revisión' ?></button>
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
	.modal-header {padding: 10px;}
	.article.modal-body {height: <?php echo ($photos_exist && $videos_exist) ? '482' : '450' ?>px; font-size: 14px; padding: 0 15px; margin-top: -1px;}
	.article .row > div {padding: 0;}
	.article .description {overflow: auto; text-align: justify;}
	.article .info-article {margin: 0 0 10px; padding: 0 10px 5px 0; font-size: .9em;}
	.article .info-article p {font-size: 12px;}
	.article .carousel-inner > .item, .container-video {background-color: #181818; height: 450px; text-align: center;}
	.article .carousel-inner > .item > div, .container-video > div {display: table; height: 100%; width: 100%;}
	.article .carousel-inner > .item > div > div, .container-video > div > div {display: table-cell; height: 450px; vertical-align: middle;}
	.article .carousel-inner > .item > div > div > img {display: inline-block; max-height: 100%;}
	.article .col-md-4 > div {margin: 5px 10px 10px; position: relative; height: <?php echo ($photos_exist && $videos_exist) ? '467' : '435' ?>px;}
	.article .documents {position: absolute; bottom: 0; width: 100%;}
	.article .documents .btn {display: table; font-size: 12px; margin-top: 5px; padding: 2px 40px 2px 5px; position: relative; text-align: left; vertical-align: middle; white-space: normal; width: 100%; }
	.article .documents .btn img {height: 30px; margin: 5px 5px 0 0;}
	.article .documents .btn span {font-size: 20px; margin-top: -10px; position: absolute; right: 10px; top: 50%; }
	.article .documents .btn strong {display: table-cell; height: 40px; vertical-align: middle; }
	.modal-footer {padding: 10px;}
</style>
