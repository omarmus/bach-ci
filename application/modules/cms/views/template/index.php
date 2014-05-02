<form class="filter" method="post">
	<div>
		<label><?php echo lang('key') ?>/<?php echo lang('name') ?></label>		
		<input type="text" name="name" value="<?php echo $this->input->post('name') ?>" class="form-control">
	</div>
	<?php echo button_filter() ?>
	<?php echo button_end_filter() ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_template'), 'cms/template/edit'); ?>
	<?php echo button_delete('cms/template/delete_selected'); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th><?php echo lang('key') ?></th>
			<th><?php echo lang('name') ?></th>
			<th><?php echo lang('type') ?></th>
			<th><?php echo lang('description') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($templates)): foreach ($templates as $template): ?>
		<tr>
			<td><?php echo $template->template ?></td>
			<td class="edit"><?php echo button_edit('cms/template/edit/' . $template->template) ?></td>
			<td><?php echo $template->template; ?></td>
			<td><?php echo $template->name; ?></td>
			<td><span class="label label-<?php echo $template->type == 'CMS' ? 'warning' : 'info' ?>"><?php echo $template->type ?></span></td>
			<td><?php echo $template->description; ?></td>
		</tr>
	<?php endforeach; endif ?>
	</tbody>
</table>