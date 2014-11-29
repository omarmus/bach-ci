<?php $new = ! isset($language->id_lang); ?>
<?php echo modal_header($new ? lang('add_key') : (lang('edit_key') . ': ' . $language->key) ) ?>
<form onsubmit="return validate(this, '<?php echo base_url('admin/setting/edit_lang'. ( $new ? '' : '/'.$language->id_lang)) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label><?php echo lang('key') ?> <strong>*</strong></label>
			<?php echo form_input('key', set_value('key', $language->key), 'class="form-control"'); ?>
			<?php echo form_error('key'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('english') ?> <strong>*</strong></label>
			<?php echo form_input('english', set_value('english', $language->english), 'class="form-control"'); ?>
			<?php echo form_error('english'); ?>
		</div>
	    <div class="form-group">
	    	<label><?php echo lang('spanish') ?> <strong>*</strong></label> 
			<?php echo form_input('spanish', set_value('spanish', $language->spanish), 'class="form-control"'); ?>
			<?php echo form_error('spanish'); ?>
		</div>
		<div class="form-group">
	    	<label><?php echo lang('portuguese') ?> <strong>*</strong></label> 
			<?php echo form_input('portuguese', set_value('portuguese', $language->portuguese), 'class="form-control"'); ?>
			<?php echo form_error('portuguese'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>