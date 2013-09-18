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

		<h3 class="form-signin-heading">Please log in</h3>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" name="Email" class="form-control" placeholder="Email address or Username" autofocus>
		</div>
		<?php echo form_error('Email'); ?>

		<div class="input-group bottom">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="Password" class="form-control" placeholder="Password">
		</div>
		<?php echo form_error('Password'); ?>
		<!-- <label class="checkbox">
			<input type="checkbox" value="remember-me"> Remember me
		</label> -->
		<button class="btn btn-primary btn-block btn-lg bottom top" type="submit">Log in</button>
		<div class="text-center">
			<a href="#" id="open-reset" class="text-center">¿Olvidó su contraseña?</a>
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
				<input type="text" name="Email" class="form-control" placeholder="Email address">
			</div>
		</div>
		<button class="btn btn-primary btn-block btn-lg bottom" type="submit">Recuperar</button>
		<div class="text-center">
			<a href="#" id="open-login" class="text-center">Log in</a>
		</div>
	</form>
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