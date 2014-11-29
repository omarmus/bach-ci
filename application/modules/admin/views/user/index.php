<form class="filter" method="post">
	<div>
		<label><?php echo lang('last_first_name') ?></label>		
		<input type="text" name="name" value="<?php echo $this->input->post('name') ?>" class="form-control">
	</div>
	<div>
		<label><?php echo lang('state') ?></label>
		<?php echo form_dropdown('state', array_merge(array('-' => strtoupper(lang('all'))), get_states_user()), $this->input->post('state'), 'class="form-control"'); ?>
	</div>
	<div>
		<label><?php echo lang('rol') ?></label>
		<?php echo form_dropdown('id_rol', $roles, $this->input->post('id_rol'), 'class="form-control"'); ?>
	</div>
	<?php echo button_filter() ?>
	<?php echo button_end_filter() ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_user'), 'admin/user/edit', 'lg'); ?>
	<?php echo button_delete('admin/user/delete_selected'); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th class="edit"><?php echo lang('password') ?></th>
			<th><?php echo lang('last_first_name') ?></th>
			<th><?php echo lang('email') ?></th>
			<th><?php echo lang('username') ?></th>
			<th><?php echo lang('rol') ?></th>
			<th><?php echo lang('state') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($users)): foreach ($users as $user): ?>
		<?php if ($user->id_rol < 3 && ID_ROL > 1) continue;  ?>
		<tr>
			<td><?php echo $user->id_user ?></td>
			<td class="edit"><?php echo button_edit('admin/user/edit/' . $user->id_user, 'lg') ?></td>
			<td class="edit"><?php echo button_modal('' ,'admin/user/password/' . $user->id_user, 'glyphicon-lock', NULL, 'UPDATE') ?></td>
			<td><a href="<?php echo base_url() . 'admin/profile/' . $user->id_user ?>"><?php echo $user->last_name . ' ' . $user->first_name ?></a></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->name_role; ?></td>
			<td><?php echo state_label($user->state); ?></td>
		</tr>
	<?php endforeach; endif ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 2, 7 ] }
			]
		});
	});

	function toggle_password (input) {
		$('#main-modal .password')[input.checked ? 'hide' : 'show']();
	}

	function reset_password (id_user) {
		show_loading('Enviando mail...');
		$.post(base_url + 'admin/user/reset_password/' + id_user, function (response) {
			hide_loading();
			if (response.state == 'OK') {
				hide_modal();
				message_mail('Mail sent!', 300);
			} else {
				message_error('Error al enviar el mail');
			};
		}, 'json');
	}
</script>