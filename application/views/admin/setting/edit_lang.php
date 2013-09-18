<?php $new = ! isset($language['IdLang']); ?>
<?php echo modal_header($new ? 'Add a new key' : 'Edit key ' . $language['FirstName']) ?>
<form onsubmit="return validate(this, '<?php echo site_url('admin/key/edit'. ( $new ? '' : '/'.$language['IdLang'])) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label>Key <strong>*</strong></label>
			<?php echo form_input('IdLang', set_value('IdLang', $language['IdLang']), 'class="form-control"'); ?>
			<?php echo form_error('IdLang'); ?>
		</div>
		<div class="form-group">
			<label>English <strong>*</strong></label>
			<?php echo form_input('English', set_value('English', $language['English']), 'class="form-control"'); ?>
			<?php echo form_error('English'); ?>
		</div>
	    <div class="form-group">
	    	<label>Spanish <strong>*</strong></label> 
			<?php echo form_input('Spanish', set_value('Spanish', $language['Spanish']), 'class="form-control"'); ?>
			<?php echo form_error('Spanish'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>