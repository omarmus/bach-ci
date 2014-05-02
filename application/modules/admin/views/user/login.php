<?php $cookie = isset($_COOKIE['bcuser']) && $_COOKIE['bcuser'] != '' ?>
<div class="container">
	<div class="form-login">
		<form id="form-login" accept-charset="utf-8" method="post">
			<?php $error = $this->session->flashdata('error'); ?>
			<?php if ($error): ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $error ?>
			</div>	
			<?php endif ?>
			<?php $success = $this->session->flashdata('success'); ?>
			<?php if ($success): ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $success ?>
			</div>	
			<?php endif ?>
	
			<h3 class="form-signin-heading"><?php echo lang('please_login') ?></h3>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" name="email" class="form-control" value="<?php echo $cookie ? $_COOKIE['bcuser'] : '' ?>" placeholder="<?php echo lang('email_login') ?>" autofocus>
			</div>
			<?php echo form_error('email'); ?>
	
			<div class="input-group bottom">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="password" name="password" class="form-control" placeholder="<?php echo lang('password') ?>">
			</div>
			<?php echo form_error('password'); ?>
			<label class="checkbox">
				<input type="checkbox" name="remember" value="remember-me" <?php echo $cookie ? 'checked' : '' ?>> <?php echo lang('remember_me') ?>
			</label>
			<button class="btn btn-primary btn-block btn-lg bottom top" type="submit"><?php echo lang('login') ?></button>
			<div class="text-center">
				<a href="#" id="open-reset" class="text-center"><?php echo lang('forget_password') ?></a>
			</div>
		</form>
		<form id="form-recover">
			<div class="alert alert-success" style="display: none;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Se envió un mail a su correo electrónico.
			</div>	
			<h3 class="form-signin-heading">Recuperar contraseña</h3>
			<div class="bottom">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
					<input type="text" name="email" class="form-control" placeholder="<?php echo lang('email') ?>">
				</div>
			</div>
			<button class="btn btn-primary btn-block btn-lg bottom" type="submit">Recuperar</button>
			<div class="text-center">
				<a href="#" id="open-login" class="text-center">Log in</a>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#form-recover').on('submit', function (event) {
			event.preventDefault();
			var form = this;
			show_loading('Enviando mail');
			$.post(_base_url + 'ajax/reset_password', $(form).serialize(), function (response) {
				hide_loading();
				$(form).find('.input-error').remove();
				if (response.state == 'OK') {
					$(form).find('.alert-success').fadeIn();
					form.reset();
				} else {
					$(form).find('div.bottom').append(response.msg);
				}
				$(form).find('input').get(0).focus();
			}, 'json');
		});
		$('#open-reset').on('click', function (event) {
			event.preventDefault();
			change_login('form-login', 'form-recover');
		});
		$('#open-login').on('click', function (event) {
			event.preventDefault();
			change_login('form-recover', 'form-login');
		});
	});

	function change_login (id, other) {
		var width = $('#' + id).outerWidth();
		$('#' + other).find('.alert-success').hide();
		$('#' + id).animate({marginLeft: '-' + width + 'px'}, function () {
			$(this).appendTo('.form-login').css({margin: 0});
			$('#' + other).find('input').get(0).focus();
		});
	}
</script>