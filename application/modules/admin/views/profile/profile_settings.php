<div class="form-group">
	<label><?php echo lang('language') ?></label>
	<select name="lang_code" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
		<option value="english" <?php echo set_value('lang_code', $user->lang_code) == 'english' ? 'selected' : '' ?>><?php echo lang('english') ?></option>
		<option value="spanish" <?php echo set_value('lang_code', $user->lang_code) == 'spanish' ? 'selected' : '' ?>><?php echo lang('spanish') ?></option>
	</select>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value('lang_code', lang($user->lang_code)) ?>&nbsp;</div>
</div>
<div class="form-group">
	<label><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo lang('timezone') ?></label>
	<select name="id_time_zone" class="form-control <?php echo isset($error) ? '' : 'none' ?>">
		<option value="0"><?php echo lang('select_timezone') ?></option>
		<?php foreach ($time_zones as $zone) : ?>
			<option value="<?php echo $zone->id_time_zone ?>" <?php echo $zone->id_time_zone == $user->id_time_zone ? 'selected' : '' ?>><?php echo $zone->region . '/' . str_replace('_', ' ', $zone->country) . (!is_null($zone->city) ? '/' . str_replace('_', ' ', $zone->city) : '') ?></option>	
		<?php endforeach ?>
	</select>
	<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo $user->id_time_zone ? str_replace('_', ' ', str_replace(' ', '/', trim(get_item('sys_time_zone', array('region','country','city'), array ('id_time_zone' => $user->id_time_zone))))) : '' ?></div>
</div>
<button class="btn btn-primary hidden" type="submit">Guardar</button>
