<div class="modal-header">
	<h4 class="modal-title">
		<div class="pull-left title"><?php echo $article->title ?></div>
		<div class="pull-right options-buttons">
			<button type="button" class="btn btn-danger btn-xs" title="Cerrar" data-toggle="tooltip" data-placement="bottom" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
		</div>
	</h4>
</div>
<div class="modal-body">
	<?php if (count($primary_photo)): ?>
	<div class="thumbnail">
		<div class="row">
			<div class="col-md-12">
				<div class="img" style="height: 400px; background-size: <?php echo $primary_photo->image_width > $primary_photo->image_height ? 'auto 100%' : '100% auto' ?>; background-image: url('<?php echo base_url() . 'assets/files/articles/photos/'. $primary_photo->filename ?>')"></div>
				<?php if (strlen($primary_photo->description)): ?>
				<div class="description"><?php echo $primary_photo->description ?></div>	
				<?php endif ?>				
			</div>
		</div>
	</div>
	<?php endif ?>
	<div><strong><em><?php echo date('l d F Y', strtotime($article->pubdate))  ?></em></strong></div>
	<div class="body-text"><?php echo $article->body ?></div>
</div>