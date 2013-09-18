<?php echo modal_header('Order Page') ?>
<div class="modal-body">
	<p class="alert alert-info">Drag to order pages and then click 'Save'</p>
	<div id="order-result" class="modal-container"></div>
</div>
<?php echo modal_footer('save-order') ?>

<script type="text/javascript">
	$.post('<?php echo site_url('admin/page/order_ajax') ?>', function (response) {
		$('#order-result').html(response);
	});

	$('#save-order').on('click', function (event) {
		event.preventDefault();
		var oSortable = $('.sortable').nestedSortable('toArray');
		show_loading('Ordenando...');
		$.post(_base_url + 'admin/page/order_ajax', { sortable: oSortable }, function (response) {
			console.log(response);
			hide_loading();
			hide_modal();
			message_ok('Order!', 1000);
			setTimeout(function () {window.location = '';}, 1000);
		});
	});
</script>