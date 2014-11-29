<?php $new = ! isset($country->id_country); ?>
<?php echo modal_header($new ? lang('add_country') : lang('edit_country') . ' ' . $country->name) ?>
<form onsubmit="return validate(this, '<?php echo base_url('parameter/country/edit'. ( $new ? '' : '/' . $country->id_country)) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label><?php echo lang('name') ?> <strong>*</strong></label> 
			<?php echo form_input('name', set_value('name', $country->name), 'class="form-control"'); ?>
			<?php echo form_error('name'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('code') ?> <strong>*</strong></label>
			<?php echo form_input('code', set_value('code', $country->code), 'class="form-control"'); ?>
			<?php echo form_error('code'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
