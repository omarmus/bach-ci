<div class="form-group">
	<label><strong class="none" style="display: <?php echo isset($error) ? 'inline' : 'none'; ?>">* </strong><?php echo lang('password') ?><strong class="none" style="color: #333333; display: <?php echo isset($error) ? 'inline' : 'none'; ?>"> anterior</strong>: </label>
	<input type="password" name="old_password" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>">********</div>
	<?php echo form_error('old_password'); ?>
</div>
<div class="form-group">
	<label class="none" style="display: <?php echo isset($error) ? 'block' : 'none'; ?>;"><strong class="none" style="display: <?php echo isset($error) ? 'inline' : 'none'; ?>">* </strong><?php echo lang('new_password') ?>: </label>
	<input type="password" name="password" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php echo form_error('password'); ?>
</div>
<div class="form-group">
	<label class="none" style="display: <?php echo isset($error) ? 'block' : 'none'; ?>"><?php echo lang('confirm_new_password') ?></label>
	<input type="password" name="password_confirm" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php echo form_error('password_confirm'); ?>
</div>
<button class="btn btn-primary hidden" type="submit">Cambiar mi contraseña</button>
