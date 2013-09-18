<?php 
	$settings = get_parameters();
	$system = array('SYSTEM_NAME', 'SYSTEM_EMAIL');
	$smtp = array('SMTP_HOST', 'SMTP_USER', 'SMTP_PASS');
?>
<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#general">General</a></li>
	<li><a href="#mail">Correo</a></li>
	<li><a href="#aparence">Apariencia</a></li>
	<li><a href="#users">Usuarios</a></li>
	<li><a href="#language">Lenguaje</a></li>
</ul>

<div class="tab-content settings">
	<div class="tab-pane active" id="general">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>System</strong></h3>
			</div>
			<div class="panel-body">
				<form class="form modal-body" onsubmit="return false">
				<?php foreach ($system as $item): ?>
					<div class="form-group">
						<label><?php echo $settings[$item]['Title'] ?></label>
						<?php echo form_input($item, set_value($item, $settings[$item]['Value']), 'class="form-control"'); ?>
					</div>
				<?php endforeach ?>
				</form>
			</div>
		</div>	
	</div>
	<div class="tab-pane" id="mail">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>SMTP </strong> <?php echo button_yes_no($settings['SMTP']['Value'], 'admin/setting/set_on_off/SMTP') ?></h3>
			</div>
			<div class="panel-body">
				<form class="form modal-body" onsubmit="return false">
				<?php foreach ($smtp as $item): ?>
					<div class="form-group">
						<label><?php echo $settings[$item]['Title'] ?></label>
						<?php echo form_input($item, set_value($item, $settings[$item]['Value']), 'class="form-control"'); ?>
					</div>
				<?php endforeach ?>
				</form>
			</div>
		</div>	
	</div>
	<div class="tab-pane" id="aparence">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Temas</strong></h3>
			</div>
			<div class="panel-body">

			</div>
		</div>
	</div>
	<div class="tab-pane" id="users">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Roles de usuario</strong></h3>
			</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>
	<div class="tab-pane" id="language">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Lenguajes del sistema</strong></h3>
			</div>
			<div class="panel-body">

				<div class="section-buttons">
					<?php echo button_add('Add new key', 'admin/setting/edit_lang'); ?>
					<?php echo button_delete('admin/setting/delete_selected'); ?>
					<?php echo button_modal('Generar archivos de traducción', 'admin/setting/generate', 'glyphicon-file'); ?>
				</div>

				<table id="main-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th class="edit">Edit</th>
							<th>Key</th>
							<th>English</th>
							<th>Spanish</th>
						</tr>
					</thead>
					<tbody>
					<?php if (count($languages)): foreach ($languages as $language): ?>
						<?php $pk = $language->getPrimaryKey() ?>
						<tr>
							<td><?php echo $pk; ?></td>
							<td class="edit"><?php echo button_edit('admin/setting/edit_lang/' . $pk) ?></td>
							<td><?php echo $pk; ?></td>
							<td><?php echo $language->getEnglish(); ?></td>
							<td><?php echo $language->getSpanish(); ?></td>
						</tr>
					<?php endforeach; endif ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})
</script>
