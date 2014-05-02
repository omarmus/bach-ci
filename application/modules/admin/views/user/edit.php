<?php $new = ! isset($user->id_user); ?>
<?php $more = $this->input->post('more') == 'YES' || (isset($more) && $more == 'YES'); ?>
<?php echo modal_header($new ? lang('add_user') : (lang('edit_user') . ' ') . $user->first_name) ?>
<form onsubmit="return validate(this, '<?php echo base_url('admin/user/edit'. ( $new ? '' : '/'.$user->id_user)) ?>')">
	<div class="modal-body">
	    <div class="form-group">
	    	<label><?php echo lang('first_name') ?> <strong>*</strong></label> 
			<?php echo form_input('first_name', set_value('first_name', $user->first_name), 'class="form-control"'); ?>
			<?php echo form_error('first_name'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('last_name') ?> <strong>*</strong></label>
			<?php echo form_input('last_name', set_value('last_name', $user->last_name), 'class="form-control"'); ?>
			<?php echo form_error('last_name'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('email') ?> <strong>*</strong></label>
			<?php echo form_input('email', set_value('email', $user->email), 'class="form-control"'); ?>
			<?php echo form_error('email'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('username') ?></label>
			<?php echo form_input('username', set_value('username', $user->username), 'class="form-control"'); ?>
			<?php echo form_error('username'); ?>
		</div>
		<?php if ( $new ) : ?>
		<div class="form-group" style="width: 100%;">
			<label class="checkbox-inline">
				<input type="checkbox" name="generate" onclick="toggle_password(this)" value="YES"> <?php echo lang('password_generate') ?>
			</label>
		</div>
		<div class="form-group password">
			<label><?php echo lang('password') ?> <strong>*</strong></label>
			<?php echo form_password('password', '', 'class="form-control"'); ?>
			<?php echo form_error('password'); ?>
		</div>
		<div class="form-group password">
			<label><?php echo lang('password_confirm') ?> </label>
			<?php echo form_password('password_confirm', '', 'class="form-control"'); ?>
			<?php echo form_error('password_confirm'); ?>
		</div>
		<?php else : ?>
		<div class="form-group">
			<label><?php echo lang('state') ?></label>
			<?php echo form_dropdown('state', get_states_user(), set_value('state', $user->state), 'class="form-control"'); ?>
			<?php echo form_error('state'); ?>
		</div>
		<?php endif ?>
		<div class="form-group">
			<label><?php echo lang('rol') ?></label>
			<?php echo form_dropdown('id_rol', $roles, set_value('id_rol', $user->id_rol), 'class="form-control"'); ?>
			<?php echo form_error('id_rol'); ?>
		</div>
		<div class="more-fields clearfix" id="more-fields">
			<hr>
			<strong class="pull-left"><?php echo $more ? lang('less_data') : lang('more_data') ?></strong> 
			<span class="glyphicon glyphicon-chevron-<?php echo $more ? 'up' : 'down' ?> pull-right"></span>
			<input type="hidden" value="<?php echo $more ? 'YES' : 'NO' ?>" name="more">
		</div>
		<div class="<?php echo $more ? '' : 'none' ?>">
			<div class="form-group" style="width: auto;">
				<?php echo input_birthday($new ? NULL : $user->birthday) ?>
			</div>
			<div class="form-group" style="width: auto;">
				<label>&nbsp;</label>
				<div class="form-control-static">
					<label class="checkbox-inline">
						<?php echo form_radio('gender', 'V', set_value('gender', $user->gender) == 'V', 'data-role=""') ?> <strong><?php echo lang('men') ?></strong>
					</label>
					<label class="checkbox-inline">
						<?php echo form_radio('gender', 'M', set_value('gender', $user->gender) == 'M', 'data-role=""') ?> <strong><?php echo lang('women') ?></strong>
					</label>
				</div>
				<?php echo form_error('gender'); ?>
			</div>
			<div class="form-group">
				<label for=""><?php echo lang('country') ?></label>
				<select id="countries" class="form-control" name="id_country">
					<option value="0">Seleccione un país...</option>
					<?php foreach ($countries as $country): ?>
						<option value="<?php echo $country['value'] ?>" <?php echo $country['value'] == $user->id_country ? 'selected' : '' ?>><?php echo $country['text'] ?></option>
					<?php endforeach ?>
				</select>
				<?php echo form_error('id_country'); ?>
			</div>
			<div class="form-group">
				<label for=""><?php echo lang('city') ?></label>
				<select id="cities" name="id_city" class="form-control">
					<option value="0">Seleccione una ciudad</option>
				</select>
				<?php echo form_error('id_city'); ?>
			</div>
			<div class="form-group">
				<label for=""><?php echo lang('mobile') ?></label>
				<input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile) ?>" class="form-control">
				<?php echo form_error('mobile'); ?>
			</div>
			<div class="form-group">
				<label for=""><?php echo lang('phone') ?></label>
				<input type="text" name="phone" value="<?php echo set_value('phone', $user->phone) ?>" class="form-control">
				<?php echo form_error('phone'); ?>
			</div>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
<script type="text/javascript">
	var $countries = $('#countries');
	$countries.on('change', function () {
    	setCities(this.value);
    });

    if ($countries.val() != '0') {
    	setCities($countries.val(), '<?php echo $user->id_city ?>');
    }
    $(".date").datepicker({ autoclose: true, todayHighlight: true });

    $('#more-fields').on('click', function() {
    	var $this = $(this),
    		$next = $this.next(),
    		display = $next.css('display') == 'block';
    	$next.slideToggle();
    	$this.find('strong').html( display ? 'Más datos personales' : 'Menos datos personales' );
    	$this.find('span').removeClass( display ? 'glyphicon-chevron-up' : 'glyphicon-chevron-down' ).addClass( display ? 'glyphicon-chevron-down' : 'glyphicon-chevron-up' );
    	$this.find('input').val( display ? 'NO' : 'YES' );
    });
</script>