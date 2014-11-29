<?php $new = ! isset($tag->id_tag); ?>
<?php echo modal_header($new ? lang('add_tag') : lang('edit_tag') . ' ' . $tag->id_tag) ?>
<form onsubmit="return validate(this, '<?php echo base_url('cms/tag/edit'. ( $new ? '' : '/' . $tag->id_tag)) ?>')">
	<div class="modal-body">
		<div class="form-group" style="width: 40%;"> 
			<label><?php echo lang('name') ?> <strong>*</strong></label> 
			<?php echo form_input('name', set_value('name', $tag->name), 'class="form-control"'); ?>
			<?php echo form_error('name'); ?>
		</div>
		<div class="form-group" style="width: 100%; margin: 0;">
			<label><?php echo lang('description') ?></label>
			<textarea name="description" id="description" class="form-control"><?php echo set_value('description', $tag->description) ?></textarea>
			<?php echo form_error('description'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
