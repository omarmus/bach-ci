<div class="container">
	<h2><?php echo $page->title ?></h2>
<?php if (FALSE && strlen($page->body)): ?>
	<div class="row">
		<div class="col-md-12">
			<div class="section">
				<div class="description"><?php echo $page->body ?></div>
			</div>
		</div>
	</div>
<?php endif ?>
</div>

<div class="container">
	<div id="masonry" class="row">
		<?php foreach ($atractivos as $item): ?>
			<article class="col-md-3 col-sm-4 col-xs-12" data-role="<?php echo $item['article']->id_article ?>">
				<div>
					<?php $image = count($item['primary_photo']) ? 'assets/files/articles/photos/' . $item['primary_photo']->filename : 'assets/img/titulo-sub.png' ?>
					<img class="img-responsive" src="<?php echo base_url() . $image?>">
					<div><?php echo character_limiter($item['article']->body, 200) ?></div>
				</div>  
			</article>
		<?php endforeach ?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#masonry').masonry();
		set_event_articles($('#masonry > article'));
	});
</script>