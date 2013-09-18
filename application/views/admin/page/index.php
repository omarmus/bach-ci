<form class="filter" method="post">
	<div>
		<label>Name/URI</label>		
		<input type="text" name="Name" value="<?php echo $this->input->post('Name') ?>" class="form-control">
	</div>
	<div>
		<label>Type</label>
		<?php echo form_dropdown('Type', array_merge(array(0 => 'ALL'), get_type_page()), $this->input->post('Type'), 'class="form-control"'); ?>
	</div>
	<div style="display: none">
		<label>Module</label>
		<?php echo form_dropdown('Module', $list_modules, $this->input->post('Module'), 'class="form-control"'); ?>
	</div>
	<div style="display: none">
		<label>Section</label>
		<?php echo form_dropdown('Section', array(0 => 'Select section'), $this->input->post('Section'), 'class="form-control"'); ?>
	</div>

	<?php echo button_filter() ?>
	
	<?php if (isset($filter)) : ?>
		<?php echo button_end_filter() ?>
	<?php endif ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add('Add a page', 'admin/page/edit'); ?>
	<?php echo button_modal('Order page', 'admin/page/order', 'glyphicon-list', NULL, 'UPDATE') ?>
	<?php echo button_delete('admin/page/delete_selected', TRUE); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit">Edit</th>
			<th class="edit">Permissions</th>
			<th>Name</th>
			<th>URI</th>
			<th>Type</th>
			<th>Parent</th>
			<th class="state">View menu</th>
			<th class="state">Active</th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($pages)): foreach ($pages as $page): ?>
		<tr>
			<td><?php echo $page->id_page ?></td>
			<td class="edit"><?php echo button_edit('admin/page/edit/' . $page->id_page, 'load_sections') ?></td>
			<td class="edit"><?php echo button_modal('' ,'admin/page/get_permissions/' . $page->id_page, 'glyphicon-lock', 'set_permissions_session', 'UPDATE') ?></td>
			<td><?php echo $page->title; ?></td>
			<td><?php echo $page->slug; ?></td>
			<td>
				<span class="label label-<?php echo $page->module == '' ? 'primary' : ( $page->section == '' ? 'success' : 'info') ?>">
					<?php echo $page->module == '' ? 'Module' : ( $page->section == '' ? 'Section' : 'Subsection'); ?>
				</span>
			</td>
			<td><?php echo $page->module == '' ? '' : ( $page->section == '' ? $page->module : $page->section) ?></td>
			<td class="edit"><?php echo $page->section != '' ? '<strong>' . $page->visible .'</strong>' : button_yes_no($page->visible, 'admin/page/set_yes_no/'. $page->id_page) ?></td>
			<td class="edit"><?php echo button_on_off($page->state, 'admin/page/set_on_off/'. $page->id_page) ?></td>
		</tr>
	<?php endforeach; endif ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 2, 7, 8 ] }
			],
		});
	});	

	function page_type (input) {
		$('#container-module')[input.value == 'section' || input.value == 'subsection' ? 'show' : 'hide']();
		$('#container-section')[input.value == 'subsection' ? 'show' : 'hide']();
		$('#view-menu').prop({
			disabled : input.value == 'subsection', 
			checked : input.value != 'subsection'
		}).parent()[input.value == 'subsection' ? 'hide' : 'show']();
	}

	function get_sections (input, value) {
		$.post(_base_url + 'admin/page/get_sections', {idModule : input.value}, function (response) {
			var select = $('#container-section select');
			select.empty();
			for (var i = 0; i < response.length; i++) {
				select.append(new Option(response[i].text, response[i].value));
			};
			if (value) {
				select.val(value);
			}			
		}, 'json');
	}

	function load_sections () {
		$('#container-module select').change();
	}

	function set_permissions_session () {
		$('#main-modal').on('hidden.bs.modal', function () {
			$.post(_base_url + 'admin/page/set_permissions_session');
		});
	}

	function validate_page (form, url) {
		show_loading();
		$(form).find('input[type=submit], button[type=submit]').prop({disabled : true});
		$.post(url, $(form).serialize(), function (response) {
			hide_loading();
			if (response == "UPDATE") {
				hide_modal();
				message_ok("Update success!", 500);
				setTimeout(function () {window.location = '';}, 1000);
			} else {
				if (!isNaN(response)) {
					hide_modal();
					message_ok("Create success!", 500);
					setTimeout(function () {
						show_modal(_base_url + 'admin/page/get_permissions/' + response, function () {
							$('#main-modal').on('hidden.bs.modal', function () {
							  window.location = '';
							});
						});
					}, 500);
				} else {
					var error = $('#main-modal .modal-content').html(response).find('.input-error').get(0);
					setTimeout(function () {$(error).prev().focus()}, 300);
					$('#main-modal').find('input').on('keypress', function () {
						$(this).next().fadeOut();
					});
					load_sections();
				}
			}
		});
		return false;
	}
</script>