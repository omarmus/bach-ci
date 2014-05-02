<?php $cookie = isset($_COOKIE['bcuser']) && $_COOKIE['bcuser'] != '' ?>
<header class="navbar navbar-inverse navbar-fixed-top create-user" role="navigation">
    <div class="container">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    			<span class="sr-only">Toggle navigation</span>
    			<span class="icon-bar"></span>
    			<span class="icon-bar"></span>
    			<span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand" href="<?php echo base_url('admin/dashboard') ?>"><?php echo $site_name_ ?></a>
    	</div>
    	<nav class="collapse navbar-collapse navbar-ex1-collapse">
    	    <div class="navbar-form navbar-right">
    	    	<form method="post" action="login">
    	    		<div>
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
    	    		</div>
    	    		<div>
    	    			<div class="input-group">
    	    				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
    	    				<input type="text" name="email_login" class="form-control" value="<?php echo $cookie ? $_COOKIE['bcuser'] : set_value('email_login') ?>" placeholder="<?php echo lang('email_login') ?>" autofocus>
    	    			</div>
    	    			<?php echo form_error('email_login'); ?>
    	    			<label class="checkbox">
							<input type="checkbox" name="remember" value="remember-me" <?php echo $cookie ? 'checked' : '' ?>> <a><?php echo lang('remember_me') ?></a>
						</label>
    	    		</div>
    	    		<div>
    	    			<div class="input-group">
    	    				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
    	    				<input type="password" name="password_login" class="form-control" placeholder="<?php echo lang('password') ?>">
    	    			</div>
    	    			<?php echo form_error('password_login'); ?>
    	    			<label class="forget">
    	    				<a href="#" id="open-reset" class="text-center"><?php echo lang('forget_password') ?></a>
    	    			</label>
    	    		</div>
    	    		<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-log-in"></span> <?php echo lang('login') ?></button>
    	    	</form>
    	    </div>
    	</nav>
    </div>
</header>
<div class="container">
	<div class="row">
		<form id="form-create" action="signup" class="col-md-4 col-md-offset-7" method="post">
			<?php $error = $this->session->flashdata('error-create'); ?>
			<?php if ($error): ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $error ?>
			</div>	
			<?php endif ?>
			<?php $success = $this->session->flashdata('success-create'); ?>
			<?php if ($success): ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $success ?>
			</div>	
			<?php endif ?>

			<h2 class="form-signin-heading "><?php echo lang('sign_up') ?></h2>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<div class="input-group input-group-lg">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" name="first_name" value="<?php echo set_value('first_name') ?>" class="form-control" placeholder="<?php echo lang('first_name') ?>">
					</div>
					<?php echo form_error('first_name'); ?>
				</div>
				<div class="col-md-6">
					<div class="form-group input-group-lg">
						<input type="text" name="last_name" value="<?php echo set_value('last_name') ?>" class="form-control" placeholder="<?php echo lang('last_name') ?>">
					</div>
					<?php echo form_error('last_name'); ?>
				</div>
			</div>
			<div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon">@</span>
					<input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="<?php echo lang('your_email') ?>">
				</div>
				<?php echo form_error('email'); ?>
			</div>
			<div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="password" id="password" class="form-control" placeholder="<?php echo lang('password') ?>">
				</div>
				<?php echo form_error('password'); ?>
			</div>
			<div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="password_confirm" class="form-control" placeholder="<?php echo lang('retype_password') ?>">
				</div>
				<?php echo form_error('password_confirm'); ?>
			</div>
			<div><?php echo input_birthday() ?></div>
			<div class="form-group">
				<div class="form-control-static">
					<label class="checkbox-inline">
						<?php echo form_radio('gender', 'V', set_value('gender') == 'V', 'data-role=""') ?> <strong><?php echo lang('men') ?></strong>
					</label>
					<label class="checkbox-inline">
						<?php echo form_radio('gender', 'M', set_value('gender') == 'M', 'data-role=""') ?> <strong><?php echo lang('women') ?></strong>
					</label>
				</div>
				<?php echo form_error('gender'); ?>
			</div>
			<div>
				<label class="checkbox terms">
					<?php echo form_checkbox('terms', 'terms', set_value('terms', '') == 'terms'); ?> 
					<?php echo lang('read_and_accept') ?> <a href="<?php echo base_url('privacy.html') ?>" target="_blank"><?php echo lang('terms_and_conditions') ?></a>.
				</label>
				<?php echo form_error('terms'); ?>
			</div>
			<div class="form-group top">
				<button class="btn btn-primary btn-lg btn-block bottom" type="submit"><span class="glyphicon glyphicon-check"></span> <?php echo lang('sign_up') ?></button>
			</div>
		</form>
	</div>
</div>
<script type="text/js-tmpl" id="tmpl-forgot">
	<?php echo modal_header(lang('recover_password')) ?>
	<form id="form-recover">
		<div class="modal-body">
			<div class="form-group" style="width: 100%;">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
					<input type="text" name="email" class="form-control" placeholder="<?php echo lang('your_email') ?>">
				</div>
			</div>
		</div>
		<?php echo modal_footer('', 'recover', 'recovering') ?>
    </form>
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#open-reset').on('click', function(event) {
			event.preventDefault();
			$('#main-modal .modal-content').html($('#tmpl-forgot').html());
			set_events();
			$('#main-modal').modal();
		});

		$('#main-modal').find('input').on('keypress', function () {
			$(this).parent().next().fadeOut();
		});

		setTimeout(function () {
			$('.alert').fadeOut();
		}, 8000);

		var $form = $('#form-create');
		$form.find('input[type=text], input[type=password]').on('keyup', function() {	
			$(this).parent().next().fadeOut();
		});

		$form.find('input[type=checkbox]').on('click', function() {
			$(this).parent().next().fadeOut();
		});

		$form.find('input[type=radio]').on('click', function() {
			$(this).parent().parent().next().fadeOut();
		});

		var $day = $('#day'),
			$month = $('#month'),
			$year = $('#year');

		$form.find('select').on('change', function() {
			if ($day.val() != '-' && $month.val() != '-' && $year.val() != '-') {
				$(this).parent().parent().next().fadeOut();
			}
		});
	});

	function set_events () {
		$('#form-recover').on('submit', function (event) {
			event.preventDefault();
			var $form = $(this),
				$button = $form.find('input[type=submit], button[type=submit]').prop({disabled : true});
			$button.find('> span:first').hide();
			$button.find('> span:last').show();
			$.post(_base_url + 'ajax/reset_password', $form.serialize(), function (response) {
				$form.find('.input-error').remove();
				if (response.state == 'OK') {
					$('#main-modal').modal('hide');
					message_mail('Se ha enviadp un mail a su correo electrónico');
				} else {
					$form.find('.modal-body > div').append(response.msg);
					$button.prop({disabled : false});
					$button.find('> span:first').show();
					$button.find('> span:last').hide();
				}
				$form.find('input').get(0).focus();
			}, 'json');
		});
	}
</script>