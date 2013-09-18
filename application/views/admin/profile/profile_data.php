<div class="form-group">
	<label for="">Username</label>
	<input type="text" name="Username" value="<?php echo set_value('Username', $user['Username']) ?>" class="form-control">
	<?php echo form_error('Username'); ?>
</div>
<div class="form-group">
	<label for="">Email <strong>*</strong></label>
	<input type="text" name="Email" value="<?php echo set_value('Email', $user['Email']) ?>" class="form-control">
	<?php echo form_error('Email'); ?>
</div>
<div class="form-group">
	<label for="">Firstname <strong>*</strong></label>
	<input type="text" name="FirstName" value="<?php echo set_value('FirstName', $user['FirstName']) ?>" class="form-control">
	<?php echo form_error('FirstName'); ?>	
</div>
<div class="form-group">
	<label for="">Lastname <strong>*</strong></label>
	<input type="text" name="LastName" value="<?php echo set_value('LastName', $user['LastName']) ?>" class="form-control">
	<?php echo form_error('LastName'); ?>
</div>

<div class="form-group">
	<label for="">Phone</label>
	<input type="text" name="Phone" value="<?php echo set_value('Phone', $user['Phone']) ?>" class="form-control">
	<?php echo form_error('Phone'); ?>
</div>
<hr>
<button class="btn btn-primary" type="submit">Actualizar mis datos</button>
