<?php $new = ! isset($page->id_page); ?>
<?php echo modal_header($new ? lang('add_page') : lang('edit_page') . ' ' . $page->title) ?>
<form onsubmit="return validate_page(this, '<?php echo base_url('admin/page/edit'. ( $new ? '' : '/' . $page->id_page )) ?>')">
	<div class="modal-body">
		<div id="page-type">
			<div>
				<label><?php echo $new ? lang('page_type') : lang('selected_page_type') ?></label>
			</div>
			<div class="form-group radio-group">
				<label class="radio-inline">
					<input type="radio" name="page_type" onclick="page_type_change(this)" value="module" <?php echo $page_type == 'module' || $page->id_module == 0 ? 'checked' : '' ?>> <?php echo lang('module') ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="page_type" onclick="page_type_change(this)" value="section" <?php echo $page_type == 'section' || $page->id_module ? 'checked' : '' ?>> <?php echo lang('section') ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="page_type" onclick="page_type_change(this)" value="subsection" <?php echo $page_type == 'subsection' || $page->id_section ? 'checked' : '' ?>> <?php echo lang('subsection') ?>
				</label>
			</div>
		</div>
		<div>
			<div class="form-group" id="container-module" <?php echo $page_type == 'section' || $page_type == 'subsection' || $page->id_module || $page->id_section ? '' : 'style="display : none;"' ?>> 
				<div class="alert alert-info"><?php echo lang('info_module') ?></div>
				<?php echo form_dropdown('id_module', $list_modules, set_value('id_module', $page->id_module), 'class="form-control" onchange="get_sections(this, '.$page->id_section.')"'); ?>
				<?php echo form_error('id_module'); ?>
			</div>
			<div class="form-group" id="container-section" <?php echo $page_type == 'subsection' || $page->id_section ? '' : 'style="display : none;"' ?>>
				<div class="alert alert-info"><?php echo lang('info_section') ?></div>
				<?php echo form_dropdown('id_section', array(0 => lang('select_section')), set_value('id_section', $page->id_section), 'class="form-control"'); ?>				
				<?php echo form_error('id_section'); ?>
			</div>
		</div>
		<?php if ( $new ) : ?>
		<div class="form-group" style="width: 100%;">
			<label class="checkbox-inline">
				<input type="checkbox" id="view-menu" name="visible" value="YES" checked> <?php echo lang('page_main_menu') ?>
			</label>
		</div>
		<?php endif ?>
	    <div class="form-group">
	    	<label for=""><?php echo lang('name') ?> <strong>*</strong></label> 
			<?php echo form_input('title', set_value('title', $page->title), 'class="form-control"'); ?>
			<?php echo form_error('title'); ?>
		</div>
		<div class="form-group">
			<label for=""><?php echo lang('uri') ?> <strong>*</strong></label>
			<?php echo form_input('slug', set_value('slug', $page->slug), 'class="form-control"'); ?>
			<?php echo form_error('slug'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
