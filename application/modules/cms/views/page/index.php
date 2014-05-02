<form class="filter" method="post">
	<div>
		<label><?php echo lang('name') ?>/<?php echo lang('uri') ?></label>		
		<input type="text" name="name" value="<?php echo $this->input->post('name') ?>" class="form-control">
	</div>
	<div>
		<label><?php echo lang('type') ?></label>
		<?php echo form_dropdown('type', array_merge(array(0 => strtoupper(lang('all'))), get_type_page_cms()), $this->input->post('type'), 'class="form-control"'); ?>
	</div>
	<?php echo button_filter() ?>
	<?php echo button_end_filter() ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_page'), 'cms/page/edit'); ?>
	<?php echo button_modal(lang('order_pages'), 'cms/page/order', 'glyphicon-list', NULL, 'UPDATE') ?>
	<?php echo button_link(lang('templates'), 'cms/template', 'glyphicon-list-alt', NULL, 'READ') ?>
	<?php echo button_delete('cms/page/delete_selected'); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th class="edit"><?php echo lang('multimedia') ?></th>
			<th><?php echo lang('name') ?></th>
			<th><?php echo lang('template') ?></th>
			<th><?php echo lang('parent') ?></th>
			<th><?php echo lang('type') ?></th>
			<th class="state"><?php echo lang('view_menu') ?></th>
			<th class="state"><?php echo lang('active') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($pages)): foreach ($pages as $page): ?>
		<tr>
			<td><?php echo $page['id_page'] ?></td>
			<td class="edit"><?php echo button_edit('cms/page/edit/' . $page['id_page']) ?></td>
			<td class="edit">
				<div class="file-buttons">
					<?php echo button_modal('' ,'cms/page/get_files/' . $page['id_page'] . '/PHOTO', 'glyphicon-picture', '', 'UPDATE', array('title' => lang('photos'), 'orientation' => 'bottom')) ?>
					<?php echo button_modal('' ,'cms/page/videos/' . $page['id_page'], 'glyphicon-facetime-video', '', 'UPDATE', array('title' => lang('videos'), 'orientation' => 'bottom')) ?>
					<?php echo button_modal('' ,'cms/page/get_files/' . $page['id_page'] . '/AUDIO', 'glyphicon-headphones', '', 'UPDATE', array('title' => lang('audios'), 'orientation' => 'bottom')) ?>
					<?php echo button_modal('' ,'cms/page/get_files/' . $page['id_page'] . '/DOCUMENT', 'glyphicon-folder-open', '', 'UPDATE', array('title' => lang('documents'), 'orientation' => 'bottom')) ?>
				</div>
			</td>
			<td><?php echo $page['title']; ?></td>
			<td><?php echo $page['template'] ?></td>
			<td><?php echo $page['parent']['title'] == '' ? '' : $page['parent']['title'] ?></td>
			<td>
				<span class="label label-<?php echo $page['type'] == 'CMS' ? 'warning' : 'info' ?>"><?php echo $page['type'] ?></span>&nbsp;
				<span class="label label-<?php echo $page['parent'] == '' ? 'primary' : 'success' ?>">
					<em><?php echo $page['parent'] == '' ? lang('section') : lang('subsection') ; ?></em>
				</span>
			</td>
			<td class="edit"><?php echo button_yes_no($page['visible'], 'cms/page/set_visible/'. $page['id_page']) ?></td>
			<td class="edit"><?php echo button_yes_no($page['state'], 'cms/page/set_state/'. $page['id_page']) ?></td>
		</tr>
	<?php endforeach; endif ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 2, 7, 8 ]}
			]
		});

		$('#main-modal').on('shown.bs.modal', function (e) {
			set_events();
		});

		$('.file-buttons > button').tooltip();
	});

	function set_events () {
		setEditor('#body');
		var uri = document.getElementById('uri-page');
		$('#title-page').on('keyup', function() {
			uri.value = normalize(this.value);
		});
		var $cms = $('#template-cms').html(),
		$app = $('#template-app').html(),
		$page_cms = $('#page-cms').html(),
		$page_app = $('#page-app').html(),
		$select = $('#template-select'),
		$select_parent = $('#id-parent'),
		$type = $('#template-type');

		$type.on('change', function() {
			$select.html(this.value == 'CMS' ? $cms : $app);
			$select_parent.html(this.value == 'CMS' ? $page_cms : $page_app);	
		});
	}
</script>