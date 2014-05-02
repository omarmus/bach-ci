<?php echo modal_header(lang('order_pages')) ?>
<div class="modal-body">
	<p class="alert alert-info"><?php echo lang('drag_order') ?></p>
	<div id="order-result" class="modal-container"></div>
</div>
<?php echo modal_footer('save-order') ?>

<script type="text/javascript">
	show_loading('<?php echo lang('load_pages') ?>...');
	$.post('<?php echo base_url('admin/page/order_ajax') ?>', function (response) {
		hide_loading();
		$('#order-result').html(response);
	});

	$('#save-order').on('click', function (event) {
		event.preventDefault();
		var oSortable = $('.sortable').nestedSortable('toArray');
		
		show_loading('<?php echo lang('ordinand') ?>...');
		$.post(_base_url + 'admin/page/order_ajax', { sortable: oSortable }, function (response) {
			hide_loading();
			hide_modal();
			message_ok('<?php echo lang('ordering') ?>', 1000);
			setTimeout(function () {window.location = '';}, 1000);
		});
	});
</script>