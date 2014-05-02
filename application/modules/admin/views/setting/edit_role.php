<?php $new = ! isset($role->id_rol); ?>
<?php echo modal_header($new ? lang('new_role') : (lang('edit_role') . ': ' . $role->name)) ?>
<form onsubmit="return validate(this, '<?php echo base_url('admin/setting/edit_role'. ( $new ? '' : '/'.$role->id_rol)) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label><?php echo lang('name') ?> <strong>*</strong></label>
			<?php echo form_input('name', set_value('name', $role->name), 'class="form-control"'); ?>
			<?php echo form_error('name'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('description') ?></label>
			<?php echo form_input('description', set_value('description', $role->description), 'class="form-control"'); ?>
			<?php echo form_error('description'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>