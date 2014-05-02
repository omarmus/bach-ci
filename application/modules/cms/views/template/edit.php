<?php $new = ! strlen($template->template); ?>
<?php echo modal_header($new ? lang('add_template') : lang('edit_template') . ' ' . $template->template) ?>
<form onsubmit="return validate(this, '<?php echo base_url('cms/template/edit'. ( $new ? '' : '/' . $template->template)) ?>')">
	<div class="modal-body">
		<div class="form-group" style="width: 20%;"> 
			<label for=""><?php echo lang('type') ?> <strong>*</strong></label> 
			<?php echo form_dropdown('type', array('CMS' => 'CMS', 'APP' => 'APP'), set_value('type', $template->type), 'class="form-control"'); ?>
			<?php echo form_error('type'); ?>
		</div>
		<div class="form-group" style="width: 40%;"> 
			<label><?php echo lang('template') ?> <strong>*</strong></label> 
			<?php echo form_input('template', set_value('template', $template->template), 'class="form-control"'); ?>
			<?php echo form_error('template'); ?>
		</div>
		<div class="form-group" style="width: 40%;"> 
			<label><?php echo lang('name') ?> <strong>*</strong></label> 
			<?php echo form_input('name', set_value('name', $template->name), 'class="form-control"'); ?>
			<?php echo form_error('name'); ?>
		</div>
		<div class="form-group" style="width: 100%; margin: 0;">
			<label><?php echo lang('description') ?></label>
			<textarea name="description" id="description" class="form-control"><?php echo set_value('description', $template->description) ?></textarea>
			<?php echo form_error('description'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
