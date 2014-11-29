<?php if ($profile || ID_USER < 3): ?>
<div class="form-group">
	<label><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo lang('email') ?>:</label>
	<input type="text" name="email" value="<?php echo set_value('email', $user->email) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('email', $user->email) ?>&nbsp;</div>
	<?php echo form_error('email'); ?>
</div>
<?php endif ?>
<?php if ($profile || ID_USER < 3): ?>
<div class="form-group">
	<label><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo lang('first_name') ?>:</label>
	<input type="text" name="first_name" value="<?php echo set_value('first_name', $user->first_name) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('first_name', $user->first_name) ?>&nbsp;</div>
	<?php echo form_error('first_name'); ?>	
</div>
<?php endif ?>
<?php if ($profile || ID_USER < 3): ?>
<div class="form-group">
	<label><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo lang('last_name') ?>:</label>
	<input type="text" name="last_name" value="<?php echo set_value('last_name', $user->last_name) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('last_name', $user->last_name) ?>&nbsp;</div>
	<?php echo form_error('last_name'); ?>
</div>
<?php endif ?>
<?php if ($profile || ID_USER < 3): ?>
<div class="form-group">
	<label><?php echo lang('username') ?>:</label>
	<input type="text" name="username" value="<?php echo set_value('username', $user->username) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('username', $user->username) ?>&nbsp;</div>
	<?php echo form_error('username'); ?>
</div>
<?php endif ?>
<div class="form-group">
	<label><?php echo lang('country') ?>:</label>
	<?php if ($profile || ID_USER < 3): ?>
		<select id="countries" class="form-control <?php echo isset($error) ? '' : 'none' ?>" name="id_country_birthday">
			<option value="0">Seleccione un país...</option>
		<?php foreach ($countries as $country): ?>
			<option value="<?php echo $country['value'] ?>" <?php echo $country['value'] == $user->id_country_birthday ? 'selected' : '' ?>><?php echo $country['text'] ?></option>
		<?php endforeach ?>
		</select>
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo $user->id_country_birthday ? get_item('sys_countries', 'name', array ('id_country' => $user->id_country_birthday)) : '' ?>&nbsp;</div>
	<?php echo form_error('id_country_birthday'); ?>
</div>
<div class="form-group">
	<label><?php echo lang('city') ?>:</label>
	<?php if ($profile || ID_USER < 3): ?>
		<select id="cities" name="id_city_birthday" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
			<option value="0">Seleccione una ciudad</option>
		</select>
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo $user->id_city_birthday ? get_item('sys_cities', 'name', array ('id_city' => $user->id_city_birthday)) : '' ?>&nbsp;</div>
	<?php echo form_error('id_city_birthday'); ?>
</div>
<div class="form-group">
	<label><?php echo lang('birthday') ?>:</label>
	<?php if ($profile || ID_USER < 3): ?>
		<?php echo form_dropdown_date('birthday', $user->birthday, array('class' => isset($error) ? '' : 'none')) ?>
	<?php else : ?>
		<label><?php echo lang('birthday') ?></label>
	<?php endif ?>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo date_literal(set_value('birthday', $user->birthday)) ?>&nbsp;</div>
</div>
<?php if ($profile || ID_USER < 3): ?>
<div class="form-group">
	<label><?php echo lang('mobile') ?>:</label>
	<input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('mobile', $user->mobile) ?>&nbsp;</div>
	<?php echo form_error('mobile'); ?>
</div>
<?php endif ?>
<?php if ($profile || ID_USER < 3): ?>
<div class="form-group">
	<label><?php echo lang('phone') ?>:</label>
	<input type="text" name="phone" value="<?php echo set_value('phone', $user->phone) ?>" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('phone', $user->phone) ?>&nbsp;</div>
	<?php echo form_error('phone'); ?>
</div>
<?php endif ?>
<button class="btn btn-primary hidden" type="submit">UPDATE</button>
<?php if ($profile || ID_USER < 3): ?>
<script type="text/javascript">
	$(document).ready(function() {
		var $countries = $('#countries');
		$countries.on('change', function () {
	    	setCities(this.value);
	    });

	    if ($countries.val() != '0') {
	    	get_cities($countries.val(), '<?php echo $user->id_city_birthday ?>');
	    }
	});
</script>
<?php endif ?>