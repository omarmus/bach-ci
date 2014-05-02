<?php 
	$settings = get_parameters();
?>
<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#general"><?php echo lang('general') ?></a></li>
	<li><a href="#mail"><?php echo lang('mail') ?></a></li>
	<!-- <li><a href="#aparence">Apariencia</a></li> -->
	<li><a href="#users"><?php echo lang('users') ?></a></li>
	<li><a href="#language"><?php echo lang('languages') ?></a></li>
</ul>

<div class="tab-content settings">
	<div class="tab-pane active" id="general">
		<div class="panel panel-default">
			<div class="panel-heading clearfix title-panel">
				<div class="pull-left">
					<h3 class="panel-title"><strong><?php echo lang('system') ?></strong></h3>
				</div>
				<div class="pull-right edit-general">
					<?php echo button_default(lang('edit'), 'btn-edit-general', 'glyphicon-edit', 'UPDATE') ?>
					<span class="none">
						<?php echo button_default(lang('cancel'), 'btn-cancel-general', 'glyphicon-ban-circle', 'UPDATE') ?>
						<?php echo button_primary(lang('save_data'), 'btn-save-general', 'glyphicon-ok', 'UPDATE') ?>
					</span>
				</div>
			</div>
			<div class="panel-body">
				<form class="form modal-body" id="form-general" onsubmit="return validate_data(this, '<?php echo base_url() ?>admin/setting/update_general', 'btn-save-general')">
					<?php $this->load->view('admin/setting/setting_general'); ?>
				</form>
			</div>
		</div>	
	</div>
	<div class="tab-pane" id="mail">
		<div class="panel panel-default">
			<div class="panel-heading clearfix title-panel">
				<div class="pull-left">
					<h3 class="panel-title"><strong><?php echo lang('smtp_configuration') ?> </strong></h3>
				</div>
				<div class="pull-right edit-mail">
					<?php echo button_default(lang('edit'), 'btn-edit-mail', 'glyphicon-edit', 'UPDATE') ?>
					<span class="none">
						<?php echo button_default(lang('cancel'), 'btn-cancel-mail', 'glyphicon-ban-circle', 'UPDATE') ?>
						<?php echo button_primary(lang('save_data'), 'btn-save-mail', 'glyphicon-ok', 'UPDATE') ?>
					</span>
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="smpt-title"><?php echo lang('smtp_active') ?></label> 
					<?php echo button_yes_no($settings['SMTP']['value'], 'admin/setting/set_on_off/SMTP') ?>
				</div>
				<form class="form modal-body" id="form-mail" onsubmit="return validate_data(this, '<?php echo base_url() ?>admin/setting/update_mail', 'btn-save-mail')">
					<?php $this->load->view('admin/setting/setting_mail'); ?>
				</form>
			</div>
		</div>	
	</div>
	<!-- <div class="tab-pane" id="aparence">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Temas</strong></h3>
			</div>
			<div class="panel-body">

			</div>
		</div>
	</div> -->
	<div class="tab-pane" id="users">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo lang('user_roles') ?></strong></h3>
			</div>
			<div class="panel-body">
				<div class="section-buttons">
					<?php echo button_add(lang('add_role'), 'admin/setting/edit_role'); ?>
				</div>
				<table id="main-table-role" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="edit"><?php echo lang('edit') ?></th>
							<th class="edit"><?php echo lang('delete') ?></th>
							<th><?php echo lang('role') ?></th>
							<th><?php echo lang('description') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($roles)): foreach ($roles as $rol): ?>
							<?php $pk = $rol->id_rol ?>
							<tr>
								<td class="edit"><?php echo button_edit('admin/setting/edit_role/' . $pk) ?></td>
								<td class="edit">
									<?php echo button_danger('', '', 'glyphicon-trash', 'DELETE') ?>
									<input type="hidden" value="<?php echo $pk ?>">
								</td>
								<td><?php echo $rol->name; ?></td>
								<td><?php echo $rol->description; ?></td>
							</tr>
						<?php endforeach; endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="language">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo lang('system_languages') ?></strong></h3>
			</div>
			<div class="panel-body">
				<form class="filter" method="post">
					<div>
						<label><?php echo lang('key') ?></label>		
						<input type="text" name="key" value="<?php echo $this->input->post('key') ?>" class="form-control">
					</div>
					<div>
						<label><?php echo lang('english') ?>/<?php echo lang('spanish') ?></label>		
						<input type="text" name="description" value="<?php echo $this->input->post('description') ?>" class="form-control">
					</div>
					<?php echo button_filter() ?>
					<?php echo button_end_filter() ?>
					<input type="hidden" name="filter" value="OK">
				</form>

				<div class="section-buttons">
					<?php echo button_add(lang('add_key'), 'admin/setting/edit_lang'); ?>
					<?php echo button_delete('admin/setting/delete_lang'); ?>
				</div>
				<table id="main-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th class="edit"><?php echo lang('edit') ?></th>
							<th><?php echo lang('key') ?></th>
							<th><?php echo lang('english') ?></th>
							<th><?php echo lang('spanish') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($languages)): foreach ($languages as $language): ?>
							<?php $pk = $language->id_lang ?>
							<tr>
								<td><?php echo $pk; ?></td>
								<td class="edit"><?php echo button_edit('admin/setting/edit_lang/' . $pk) ?></td>
								<td><strong><?php echo $language->key; ?></strong></td>
								<td><?php echo $language->english; ?></td>
								<td><?php echo $language->spanish; ?></td>
							</tr>
						<?php endforeach; endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});

		<?php if ($this->session->flashdata('language') == 'YES' || isset($_POST['filter'])) : ?>
			$('#myTab a[href="#language"]').tab('show');
		<?php endif; ?>

		<?php if ($this->session->flashdata('role') == 'YES') : ?>
			$('#myTab a[href="#users"]').tab('show');
		<?php endif; ?>

		send_form($('#btn-save-general'), $('#form-general'));
	    events_buttons_edit($('.edit-general button'));

		send_form($('#btn-save-mail'), $('#form-mail'))
	    events_buttons_edit($('.edit-mail button'));

	    $('#main-table-role .btn-danger').on('click', function() {
	    	if (confirm('¿Deséa eliminar rol?')) {
	    		var $this = $(this),
	    		pk = $this.next().val();

	    		$.get(_base_url + 'admin/setting/delete_role/' + pk, function() {
	    			$this.parent().parent().remove();
	    			message_ok('¡Rol eliminado!');
	    		});
	    	}
	    });
	});
</script>
