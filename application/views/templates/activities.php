<div class="container">
	<h2>Actividades turísticas</h2>
	<div id="masonry" class="row" >
	<?php foreach ($articles as $article): ?>
		<article class="col-md-4 col-sm-6" data-role="<?php echo $article['article']->id_article ?>">
			<div>	
				<?php if (count($article['primary_photo'])): ?>
					<figure>
						<img class="img-responsive" src="<?php echo base_url() . 'assets/files/articles/photos/' . $article['primary_photo']->filename ?>">
						<?php if (strlen($article['primary_photo']->description)): ?>
							<figcaption><h4><?php echo $article['primary_photo']->description ?></h4></figcaption>
						<?php endif ?>
					</figure>
				<?php endif ?>
				<div>
					<h3><?php echo $article['article']->title ?></h3>
					<?php echo $article['article']->body ?>
				</div>
			</div>	
		</article>
	<?php endforeach ?>
	</div>
</div>