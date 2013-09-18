<?php $new = ! isset($page['IdPage']); ?>
<?php echo modal_header($new ? 'Add a new page' : 'Edit page ' . $page['Title']) ?>
<form onsubmit="return validate_page(this, '<?php echo site_url('admin/page/edit'. ( $new ? '' : '/' . $page['IdPage'] )) ?>')">
	<div class="modal-body">
		<div id="page-type">
			<div>
				<label><?php echo $new ? '¿Que tipo de página deséa crear?' : 'Seleccione el nuevo tipo de página:' ?></label>
			</div>
			<div class="form-group radio-group">
				<label class="radio-inline">
					<input type="radio" name="PageType" onclick="page_type(this)" value="module" <?php echo $page_type == 'module' || $page['IdModule'] == 0 ? 'checked' : '' ?>> Un módulo
				</label>
				<label class="radio-inline">
					<input type="radio" name="PageType" onclick="page_type(this)" value="section" <?php echo $page_type == 'section' || $page['IdModule'] ? 'checked' : '' ?>> Una sección
				</label>
				<label class="radio-inline">
					<input type="radio" name="PageType" onclick="page_type(this)" value="subsection" <?php echo $page_type == 'subsection' || $page['IdSection'] ? 'checked' : '' ?>> Una subsección
				</label>
			</div>
		</div>
		<div>
			<div class="form-group" id="container-module" <?php echo $page_type == 'section' || $page_type == 'subsection' || $page['IdModule'] || $page['IdSection'] ? '' : 'style="display : none;"' ?>> 
				<div class="alert alert-info">Seleccione el módulo al que pertenecerá la sección.</div>
				<?php echo form_dropdown('IdModule', $list_modules, set_value('IdModule', $page['IdModule']), 'class="form-control" onchange="get_sections(this, '.$page['IdSection'].')"'); ?>
				<?php echo form_error('IdModule'); ?>
			</div>
			<div class="form-group" id="container-section" <?php echo $page_type == 'subsection' || $page['IdSection'] ? '' : 'style="display : none;"' ?>>
				<div class="alert alert-info">Seleccione la sección a la que pertenecerá la subsección.</div>
				<?php echo form_dropdown('IdSection', array(0 => 'Seleccione una sección'), set_value('IdSection', $page['IdSection']), 'class="form-control"'); ?>				
				<?php echo form_error('IdSection'); ?>
			</div>
		</div>
		<?php if ( $new ) : ?>
		<div class="form-group" style="width: 100%;">
			<label class="checkbox-inline">
				<input type="checkbox" id="view-menu" name="Visible" value="YES" checked> La página será parte del menú principal
			</label>
		</div>
		<?php endif ?>
	    <div class="form-group">
	    	<label for="">Name <strong>*</strong></label> 
			<?php echo form_input('Title', set_value('Title', $page['Title']), 'class="form-control"'); ?>
			<?php echo form_error('Title'); ?>
		</div>
		<div class="form-group">
			<label for="">URI <strong>*</strong></label>
			<?php echo form_input('Slug', set_value('Slug', $page['Slug']), 'class="form-control"'); ?>
			<?php echo form_error('Slug'); ?>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>
