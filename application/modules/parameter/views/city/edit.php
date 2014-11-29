<?php $new = ! isset($city->id_city); ?>
<?php echo modal_header($new ? lang('add_city') : lang('edit_city') . ' ' . $city->name) ?>
<form onsubmit="return validate(this, '<?php echo base_url('parameter/city/edit'. ( $new ? '' : '/' . $city->id_city)) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label><?php echo lang('country') ?> <strong>*</strong></label>
			<?php echo form_dropdown('id_country', $countries, set_value('id_country', $city->id_country), 'class="form-control"'); ?>
			<?php echo form_error('id_country'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('name') ?> <strong>*</strong></label> 
			<?php echo form_input('name', set_value('name', $city->name), 'class="form-control"'); ?>
			<?php echo form_error('name'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('code') ?></label>
			<?php echo form_input('code', set_value('code', $city->code), 'class="form-control"'); ?>
			<?php echo form_error('code'); ?>
		</div>
		<div class="form-group" id="region-name">
			<label><?php echo lang('region_name') ?></label>
			<?php $id_country = set_value('id_country', $city->id_country); ?>
			<?php echo form_dropdown('region_name', get_departments($id_country), set_value('region_name', $city->region_name), 'class="form-control" ' . ($id_country == 30 ? '' : 'style="display: none;" disabled="disabled"')); ?>
			<?php echo form_input('region_name', set_value('region_name', $city->region_name), 'class="form-control" ' . ($id_country == 30 ? 'style="display: none;" disabled="disabled"' : '')); ?>
			<?php echo form_error('region_name'); ?>
		</div>
		<div class="form-group" <?php echo $id_country == 30 ? 'style="display: none;"' : '' ?>>
			<label><?php echo lang('region_code') ?></label>
			<?php echo form_input('region_code', set_value('region_code', $city->region_code), 'class="form-control"'); ?>
			<?php echo form_error('region_code'); ?>
		</div>
		<div class="form-group" <?php echo $id_country == 30 ? 'style="display: none;"' : '' ?>>
			<label><?php echo lang('region_type') ?></label>
			<?php echo form_input('region_type', set_value('region_type', $city->region_type), 'class="form-control"'); ?>
			<?php echo form_error('region_type'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('coordinates') ?></label>
			<?php echo form_input('coordinates', set_value('coordinates', $city->coordinates), 'class="form-control"'); ?>
			<?php echo form_error('coordinates'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
