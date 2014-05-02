<?php $profile = isset($profile) && $profile; ?>
<?php $photo_default = $user->gender == 'M' ? 'profile-m.jpg' : 'profile.png'; ?>
<div class="row profile-form">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body" id="container-photo">
				<?php $this->load->view('admin/profile/add_photo', $this->data); ?>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<?php if (!$profile): ?>
		<ul class="nav nav-tabs" id="my-profile">
			<li class="active"><a href="#data"><strong class="title-profile"><?php echo $user->first_name . ' ' . $user->last_name ?></strong></a></li>
			<li><a href="#password"><?php echo lang('my_password') ?></a></li>
			<li><a href="#settings"><?php echo lang('my_preferences') ?></a></li>
		</ul>	
		<?php endif ?>
		<div class="tab-content settings">
			<div class="tab-pane active" id="data">
				<div class="panel panel-default">
					<div class="panel-heading clearfix title-panel">
						<div class="pull-left">
							<h3 class="panel-title title-edit">
								<em>
									<small>
										<strong>Usuario creado el</strong> <?php echo datetime_literal($user->created) ?><br>
										<strong>Ultima actualización</strong> <?php echo datetime_literal($user->modified) ?>
									</small>
								</em>
							</h3>
						</div>
						<?php if (TRUE || ID_USER < 3 ): ?>
						<div class="pull-right edit-data">
							<?php echo button_default(lang('edit'), 'btn-edit-data', 'glyphicon-edit', 'UPDATE') ?>
							<span class="none">
								<?php echo button_default(lang('cancel'), 'btn-cancel-data', 'glyphicon-ban-circle', 'UPDATE') ?>
								<?php echo button_primary(lang('save_data'), 'btn-save-data', 'glyphicon-ok', 'UPDATE') ?>
							</span>
						</div>
						<?php endif ?>
					</div>
					<div class="panel-body">
						<form class="form modal-body" id="form-data" onsubmit="return validate_data(this, '<?php echo base_url() ?>admin/profile/update_data/<?php echo $user->id_user ?>', 'btn-save-data')" >
							<?php $this->load->view('admin/profile/profile_data'); ?>
						</form>	
					</div>
				</div>
			</div>
			<?php if (!$profile): ?>
			<div class="tab-pane" id="password">
				<div class="panel panel-default">
					<div class="panel-heading clearfix title-panel">
						<div class="pull-left">
							<h3 class="panel-title"><em><small><strong>Ultima actualización</strong> <?php echo datetime_literal($user->modified) ?></small></em></h3>
						</div>
						<div class="pull-right edit-password">
							<?php echo button_default(lang('edit'), 'btn-edit-password', 'glyphicon-edit', 'UPDATE') ?>
							<span class="none">
								<?php echo button_default(lang('cancel'), 'btn-cancel-password', 'glyphicon-ban-circle', 'UPDATE') ?>
								<?php echo button_primary(lang('save_data'), 'btn-save-password', 'glyphicon-ok', 'UPDATE') ?>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<form class="form modal-body" id="form-password" onsubmit="return validate_data(this, '<?php echo base_url() ?>admin/profile/update_password', 'btn-save-password')">
							<?php $this->load->view('admin/profile/profile_password'); ?>
						</form>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="settings">
				<div class="panel panel-default">
					<div class="panel-heading clearfix title-panel">
						<div class="pull-left">
							<h3 class="panel-title"><em><small><strong>Ultima actualización</strong> <?php echo datetime_literal($user->modified) ?></small></em></h3>
						</div>
						<div class="pull-right edit-setting">
							<?php echo button_default(lang('edit'), 'btn-edit-setting', 'glyphicon-edit', 'UPDATE') ?>
							<span class="none">
								<?php echo button_default(lang('cancel'), 'btn-cancel-setting', 'glyphicon-ban-circle', 'UPDATE') ?>
								<?php echo button_primary(lang('save_data'), 'btn-save-setting', 'glyphicon-ok', 'UPDATE') ?>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<form class="form modal-body" id="form-setting" onsubmit="return validate_data(this, '<?php echo base_url() ?>admin/profile/update_setting', 'btn-save-setting', null, refresh)">
							<?php $this->load->view('admin/profile/profile_settings'); ?>
						</form>
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		$('#my-profile a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});

		send_form($('#btn-save-data'), $('#form-data'));
		events_buttons_edit($('.edit-data button'));

		send_form($('#btn-save-password'), $('#form-password'));
		events_buttons_edit($('.edit-password button'));

		send_form($('#btn-save-setting'), $('#form-setting'));
	    events_buttons_edit($('.edit-setting button'));
	});
</script>
<style type="text/css">
	.modal-body .form-group {width: 33.3%;}
	.panel-body {padding: 10px;}
	.title-profile {font-size: 1.1em; line-height: 1em;}
	.profile-form > div {padding: 0 5px;}
	.title-edit {line-height: 12px; margin-top: -6px;}
</style>
