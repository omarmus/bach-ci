<?php echo modal_header('Rechazar artículo') ?>
<div class="modal-body">
	<form>
		<div class="form-group" style="width: 100%">
			<label>Razón del rechazo</label>
			<textarea name="" id="comments" class="form-control"></textarea>
		</div>
	</form>
</div>
<div class="modal-footer">
	<?php echo button_submit('btn-inactived-article', 'rechazar', 'rechazando', 'btn-primary') ?>
</div>	
<style type="text/css">
	#second-modal .modal-dialog {margin-top: 150px; width: 500px;}
</style>
<script type="text/javascript">
	$('#btn-inactived-article').on('click', function() {
		var $this = $(this);
		$this.prop({disabled : true});
		$this.find('> span:first').hide();
		$this.find('> span:last').show();
		show_loading('Rechazando artículo');
		$.get(base_url + 'admin/dashboard/set_inactive/' + <?php echo $id_article ?>, function(data) {
			hide_loading();
			hide_modal('second-modal');
			hide_modal();
			$list_pending.find('a.list-group-item').each(function () {
				var $this = $(this),
					id_article = $this.data('role');
				if (id_article == <?php echo $id_article ?>) {
					$this.parent().remove();
				}
			});
			setTimeout(function () {
				message_mail('Se envió un mail al autor de la publicación.');
			}, 500);
		});		
	});
</script>