<div class="modal-header">
	<h4 class="modal-title">
		<div class="pull-left title"><?php echo $article->title ?></div>
		<div class="pull-right options-buttons">
			<div class="fb-like facebook-like" data-colorscheme="dark" data-href="<?php echo base_url() . 'article/' . $article->id_article . '/' . $article->slug ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"> </div>
			<a href="<?php echo base_url() . 'article/' . $article->id_article . '/' . $article->slug ?>" class="btn btn-default btn-sm" title="Ir al atractivo" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-eye-open"></span></a>
			<button type="button" class="btn-comments btn btn-default btn-sm" title="Ver comentarios" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-list-alt"></span></button>
			<button type="button" class="btn btn-danger btn-xs" title="Cerrar" data-toggle="tooltip" data-placement="bottom" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
		</div>
	</h4>
</div>
<div class="modal-body">
	<div class="thumbnail">
		<div class="row">
			<div class="col-md-9">
			<div class="img" style="height: 300px; background-repeat: no-repeat; background-size: <?php echo $primary_photo->image_width > $primary_photo->image_height ? 'auto 100%' : '100% auto' ?>; background-image: url('<?php echo base_url() . 'assets/files/articles/photos/'. $primary_photo->filename ?>')"></div>
				<div class="description"><?php echo $primary_photo->description ?></div>
			</div>
			<div class="col-md-3 hidden-sm hidden-xs">
				<?php $total = 0 ?>
				<?php foreach ($photos as $photo): ?>
					<?php if ($photo->id_file != $primary_photo->id_file) : ?>
						<div class="img" style="height: 100px; background-size: <?php echo $photo->image_width > $photo->image_height ? 'auto 100%' : '100% auto' ?>; background-image: url('<?php echo base_url() . 'assets/files/articles/photos/thumbnail/'. thumb_image($photo->filename); ?>')"></div>
						<?php $total++; ?>
					<?php endif ?>
				<?php endforeach ?>
				<?php for ($i = $total+1; $i <= 3; $i++) : ?>
					<div class="text-center" style="height: 100px; background: rgba(0, 0, 0, .8)">
						<img style="width: 100px; margin-top: 35px;" src="<?php echo base_url() ?>assets/img/titulo-sub.png">
					</div>
				<?php endfor ?>
			</div>
		</div>
	</div>
	<div class="body-text"><?php echo $article->body ?></div>
	<div class="comments" id="comments">
		<div class="fb-comments" data-href="<?php echo base_url() . 'article/' . $article->id_article . '/' . $article->slug ?>" data-numposts="5" data-colorscheme="light"> </div>
	</div>
</div>
<script type="text/javascript">
	var $comments = $('#comments');
	$('.options-buttons .btn').tooltip();
	$('.options-buttons .btn-comments').on('click', function() {
		var $this = $(this);
		$comments.slideToggle(function () {
			if ($comments.css('display') == 'none') {
				$this.removeClass('btn-primary').addClass('btn-default').prop('title', 'Ver comentarios');
			} else {
				$this.removeClass('btn-default').addClass('btn-primary').prop('title', 'Ocultar comentarios');
			}
		});
	});
</script>