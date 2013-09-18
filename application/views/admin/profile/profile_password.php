<div class="form-group">
	<label for="">Contraseña anterior <strong>*</strong></label>
	<input type="password" name="OldPassword" class="form-control">
	<?php echo form_error('OldPassword'); ?>
</div>
<div class="form-group">
	<label for="">Nueva contraseña <strong>*</strong></label>
	<input type="password" name="Password" class="form-control">
	<?php echo form_error('Password'); ?>
</div>
<div class="form-group">
	<label for="">Confirmar nueva contraseña</label>
	<input type="password" name="PasswordConfirm" class="form-control">
	<?php echo form_error('PasswordConfirm'); ?>
</div>
<hr>
<button class="btn btn-primary" type="submit">Cambiar mi contraseña</button>
