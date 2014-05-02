<div class="form-group">
	<label for=""><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo lang('email') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<input type="text" name="email" value="<?php echo set_value('email', $user->email) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('email', $user->email) ?>&nbsp;</div>
	<?php echo form_error('email'); ?>
</div>
<div class="form-group">
	<label for=""><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo lang('first_name') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<input type="text" name="first_name" value="<?php echo set_value('first_name', $user->first_name) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('first_name', $user->first_name) ?>&nbsp;</div>
	<?php echo form_error('first_name'); ?>	
</div>
<div class="form-group">
	<label for=""><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo lang('last_name') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<input type="text" name="last_name" value="<?php echo set_value('last_name', $user->last_name) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('last_name', $user->last_name) ?>&nbsp;</div>
	<?php echo form_error('last_name'); ?>
</div>
<div class="form-group">
	<label for=""><?php echo lang('username') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<input type="text" name="username" value="<?php echo set_value('username', $user->username) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('username', $user->username) ?>&nbsp;</div>
	<?php echo form_error('username'); ?>
</div>
<div class="form-group">
	<label for=""><?php echo lang('country') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<select id="countries" class="form-control <?php echo isset($error) ? '' : 'none' ?>" name="id_country">
			<option value="0">Seleccione un país...</option>
		<?php foreach ($countries as $country): ?>
			<option value="<?php echo $country['value'] ?>" <?php echo $country['value'] == $user->id_country ? 'selected' : '' ?>><?php echo $country['text'] ?></option>
		<?php endforeach ?>
		</select>
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo $user->id_country ? get_item('sys_countries', 'name', array ('id_country' => $user->id_country)) : '' ?>&nbsp;</div>
	<?php echo form_error('id_country'); ?>
</div>
<div class="form-group">
	<label for=""><?php echo lang('city') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<select id="cities" name="id_city" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
			<option value="0">Seleccione una ciudad</option>
		</select>
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo $user->id_city ? get_item('sys_cities', 'name', array ('id_city' => $user->id_city)) : '' ?>&nbsp;</div>
	<?php echo form_error('id_city'); ?>
</div>
<div class="form-group" style="width: 40%;">
	<?php if (TRUE || ID_USER < 3 ): ?>
		<?php echo input_birthday($user->birthday) ?>
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo date_literal(set_value('birthday', $user->birthday)) ?>&nbsp;</div>
</div>
<div class="form-group" style="width: 30%;">
	<label for=""><?php echo lang('mobile') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('mobile', $user->mobile) ?>&nbsp;</div>
	<?php echo form_error('mobile'); ?>
</div>
<div class="form-group" style="width: 30%;">
	<label for=""><?php echo lang('phone') ?>:</label>
	<?php if (TRUE || ID_USER < 3 ): ?>
		<input type="text" name="phone" value="<?php echo set_value('phone', $user->phone) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('phone', $user->phone) ?>&nbsp;</div>
	<?php echo form_error('phone'); ?>
</div>
<button class="btn btn-primary hidden" type="submit">UPDATE</button>
<script type="text/javascript">
	$(document).ready(function() {
		var $countries = $('#countries');
		$countries.on('change', function () {
	    	setCities(this.value);
	    });

	    if ($countries.val() != '0') {
	    	setCities($countries.val(), '<?php echo $user->id_city ?>');
	    }
	    $(".date").datepicker({ autoclose: true, todayHighlight: true });
	});

	
</script>
