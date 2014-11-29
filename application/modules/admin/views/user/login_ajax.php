<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Su sesión ha expirado, inicie su sesión de nuevo</h4>
		</div>
		<div class="modal-body">
			<div class="form-login">
				<form method="post" onsubmit="return validate_login(this, '<?php echo base_url('ajax/login_ajax') ?>')">
					<?php if (isset($error)) : ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<?php echo $error ?>
						</div>	
					<?php endif ?>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="email_login" class="form-control" placeholder="<?php echo lang('email_login') ?>" autofocus>
					</div>
					<?php echo form_error('email_login'); ?>
					<div class="input-group bottom">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" name="password_login" class="form-control" placeholder="<?php echo lang('password') ?>">
					</div>
					<?php echo form_error('password_login'); ?>
					<button name="submit" id="submit-login" class="btn btn-primary btn-block btn-lg bottom top" type="submit"><?php echo lang('login') ?></button>
				</form>
			</div>
		</div>
	</div>
</div>
