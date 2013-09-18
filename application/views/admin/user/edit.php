<?php $new = ! isset($user['IdUser']); ?>
<?php echo modal_header($new ? 'Add a new user' : 'Edit user ' . $user['FirstName']) ?>
<form onsubmit="return validate(this, '<?php echo site_url('admin/user/edit'. ( $new ? '' : '/'.$user['IdUser'])) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label>Username</label>
			<?php echo form_input('Username', set_value('Username', $user['Username']), 'class="form-control"'); ?>
			<?php echo form_error('Username'); ?>
		</div>
		<div class="form-group">
			<label>Email <strong>*</strong></label>
			<?php echo form_input('Email', set_value('Email', $user['Email']), 'class="form-control"'); ?>
			<?php echo form_error('Email'); ?>
		</div>
	    <div class="form-group">
	    	<label>First name <strong>*</strong></label> 
			<?php echo form_input('FirstName', set_value('FirstName', $user['FirstName']), 'class="form-control"'); ?>
			<?php echo form_error('FirstName'); ?>
		</div>
		<div class="form-group">
			<label>Last name <strong>*</strong></label>
			<?php echo form_input('LastName', set_value('LastName', $user['LastName']), 'class="form-control"'); ?>
			<?php echo form_error('LastName'); ?>
		</div>
		<?php if ( $new ) : ?>
		<div class="form-group" style="width: 100%;">
			<label class="checkbox-inline">
				<input type="checkbox" name="Generate" onclick="toggle_password(this)" value="YES"> Generar contraseña automáticamente
			</label>
		</div>
		<div class="form-group password">
			<label>Password <strong>*</strong></label>
			<?php echo form_password('Password', '', 'class="form-control"'); ?>
			<?php echo form_error('Password'); ?>
		</div>
		<div class="form-group password">
			<label>Confirm password </label>
			<?php echo form_password('PasswordConfirm', '', 'class="form-control"'); ?>
			<?php echo form_error('PasswordConfirm'); ?>
		</div>
		<?php else : ?>
		<div class="form-group">
			<label>State</label>
			<?php echo form_dropdown('State', get_states_user(), set_value('State', $user['State']), 'class="form-control"'); ?>
			<?php echo form_error('State'); ?>
		</div>
		<?php endif ?>
		<div class="form-group">
			<label>Rol</label>
			<?php echo form_dropdown('IdRol', $roles, set_value('IdRol', $user['IdRol']), 'class="form-control"'); ?>
			<?php echo form_error('IdRol'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>