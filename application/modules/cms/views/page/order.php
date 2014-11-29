<?php echo modal_header(lang('order_pages')) ?>
<div class="modal-body">
	<p class="alert alert-info"><?php echo lang('drag_order') ?></p>
	<div id="order-result" class="modal-container"></div>
</div>
<?php echo modal_footer('save-order') ?>

<script type="text/javascript">
	show_loading('<?php echo lang('load_pages') ?>...');
	$.post('<?php echo base_url('cms/page/order_ajax') ?>', function (response) {
		hide_loading();
		$('#order-result').html(response);
	});

	$('#save-order').on('click', function () {
		var $sortable = $('.sortable'),
			pages_cms = $($sortable[0]).nestedSortable('toArray'),
			pages_app = $($sortable[1]).nestedSortable('toArray');

		show_loading('<?php echo lang('ordinand') ?>...');
		$.post(base_url + 'cms/page/order_ajax', { pages_cms: pages_cms, pages_app: pages_app }, function (response) {
			hide_loading();
			hide_modal();
			message_ok('<?php echo lang('ordering') ?>', 1000);
			setTimeout(function () {window.location = '';}, 1000);
		});
	});
</script>