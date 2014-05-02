<div class="container article">
	<h2><?php echo $article->title ?></h2>
	<div class="row">
		<div class="col-md-9">
			<div class="section">
				<div class="fb-like facebook-like" data-colorscheme="dark" data-href="<?php echo base_url() . 'article/' . $article->id_article . '/' . $article->slug ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"> </div>
				<div class="thumbnail">
					<img src="<?php echo base_url() . 'assets/files/articles/photos/' . $primary_photo->filename ?>">
					<?php if (strlen($primary_photo->description)): ?>
						<div class="caption-primary"><?php echo $primary_photo->description ?></div>	
					<?php endif ?>
				</div>
				<div class="description"><?php echo $article->body ?></div>

				<div class="row photos" id="masorny">
					<?php if (count($files['PHOTO'])): ?>
						<?php foreach ($files['PHOTO'] as $photo): ?>
							<div class="col-md-3 col-sm-4 col-xs-6">
								<a href="#" class="thumbnail" data-role="<?php echo $photo->id_file ?>" title="<?php echo $photo->description ?>">
									<img class="img-responsive" src="<?php echo base_url() . 'assets/files/articles/photos/thumbnail/'. thumb_image($photo->filename); ?>">
								</a>
							</div>
						<?php endforeach ?>
					<?php else: ?>
						No tiene fotografías.
					<?php endif ?>
				</div>

				<div class="fb-comments" data-href="<?php echo base_url() . 'article/' . $article->id_article . '/' . $article->slug ?>" data-numposts="5" data-colorscheme="light"> </div>		
			</div>
		</div>
		<div class="col-md-3">
			<div class="articles row">
				<?php foreach ($atractivos as $atractivo): ?>
					<?php $link = base_url() . 'article/' . $atractivo['article']->id_article . '/' . $atractivo['article']->slug ?>
					<article class="col-md-12 col-sm-6" data-role="<?php echo $atractivo['article']->id_article ?>">
						<h4><a href="<?php echo $link ?>"><?php echo $atractivo['article']->title ?></a></h4>
						<a href="<?php echo $link ?>"><figure style="height: 150px; background-size: <?php echo $atractivo['primary_photo']->image_width > $atractivo['primary_photo']->image_height ? '100%' : '100% auto' ?>; background-image: url('<?php echo base_url() . 'assets/files/articles/photos/thumbnail/'. thumb_image($atractivo['primary_photo']->filename); ?>')"></figure></a>
						<div><?php echo character_limiter($atractivo['article']->body, 60) ?> <a href="<?php echo $link ?>">Leer más...</a></div>
					</article>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#masonry').masonry();
		$('#masorny .thumbnail').on('click', function(event) {
			event.preventDefault();
			show_loading();
			$.get(base_url_ + 'article/gallery/<?php echo $article->id_article ?>/' + $(this).data('role'), function(data) {
				hide_loading();
				$('#main-modal').modal();
				$('#main-modal-container').html(data);
			});
		});

	});
</script>