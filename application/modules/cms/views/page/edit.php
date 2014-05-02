<?php $new = ! isset($page->id_page); ?>
<?php echo modal_header($new ? lang('add_page') : lang('edit_page') . ' ' . $page->title) ?>
<form onsubmit="return validate(this, '<?php echo base_url('cms/page/edit'. ( $new ? '' : '/' . $page->id_page )) ?>', set_events)">
	<div class="modal-body">
		<div class="form-group" style="width: 25%;"> 
			<label for=""><?php echo lang('type') ?></label> 
			<?php echo form_dropdown('type', array('CMS' => 'CMS', 'APP' => 'APP'), set_value('type', $page->type), 'class="form-control" id="template-type"'); ?>
			<?php echo form_error('type'); ?>
		</div>
		<div class="form-group" style="width: 40%;"> 
			<label for=""><?php echo lang('section') ?></label> 
			<?php echo form_dropdown('id_parent', $new || $page->type == 'CMS' ? $page_cms : $page_app, set_value('id_parent', $page->id_parent), 'class="form-control" id="id-parent"'); ?>
			<?php echo form_error('id_parent'); ?>
		</div>
		<div class="form-group" style="width: 35%;"> 
			<label for=""><?php echo lang('template') ?></label> 
			<?php echo form_dropdown('template', $new || $page->type == 'CMS' ? $templates['CMS'] : $templates['APP'], set_value('template', $page->template), 'class="form-control" id="template-select"'); ?>
			<?php echo form_error('template'); ?>
		</div>
	    <div class="form-group">
	    	<label for=""><?php echo lang('title') ?> <strong>*</strong></label> 
			<?php echo form_input('title', set_value('title', $page->title), 'class="form-control" id="title-page"'); ?>
			<?php echo form_error('title'); ?>
		</div>
		<div class="form-group">
			<label for=""><?php echo lang('uri') ?> <strong>*</strong></label>
			<?php echo form_input('slug', set_value('slug', $page->slug), 'class="form-control" id="uri-page"'); ?>
			<?php echo form_error('slug'); ?>
		</div>
		<div class="form-group" style="width: 100%; margin: 0;">
			<label for=""><?php echo lang('body') ?> <strong>*</strong></label>
			<textarea name="body" id="body" class="form-control summernote"><?php echo set_value('body', $page->body) ?></textarea>
			<?php echo form_error('body'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
<script type="text/js-tmpl" id="template-cms">
	<?php foreach ($templates['CMS'] as $key => $value): ?>
		<option value="<?php echo $key ?>"><?php echo $value ?></option>
	<?php endforeach ?>
</script>
<script type="text/js-tmpl" id="template-app">
	<?php foreach ($templates['APP'] as $key => $value): ?>
		<option value="<?php echo $key ?>"><?php echo $value ?></option>
	<?php endforeach ?>
</script>
<script type="text/js-tmpl" id="page-cms">
	<?php foreach ($page_cms as $key => $value): ?>
		<option value="<?php echo $key ?>"><?php echo $value ?></option>
	<?php endforeach ?>
</script>
<script type="text/js-tmpl" id="page-app">
	<?php foreach ($page_app as $key => $value): ?>
		<option value="<?php echo $key ?>"><?php echo $value ?></option>
	<?php endforeach ?>
</script>
