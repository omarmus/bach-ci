<form class="filter" method="post">
	<div>
		<label><?php echo lang('name') ?></label>
		<input type="text" name="name" value="<?php echo $this->input->post('name') ?>" class="form-control">
	</div>
	<?php echo button_filter() ?>
	<?php echo button_end_filter() ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_tag'), 'cms/tag/edit'); ?>
	<?php echo button_delete('cms/tag/delete_selected'); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th><?php echo lang('name') ?></th>
			<th><?php echo lang('description') ?></th>
			<th class="state"><?php echo lang('active') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($tags)): foreach ($tags as $tag): ?>
		<tr>
			<td><?php echo $tag->id_tag ?></td>
			<td class="edit"><?php echo button_edit('cms/tag/edit/' . $tag->id_tag) ?></td>
			<td><?php echo $tag->name; ?></td>
			<td><?php echo $tag->description; ?></td>
			<td class="edit"><?php echo button_yes_no($tag->state, 'cms/tag/set_state/'. $tag->id_tag) ?></td>
		</tr>
	<?php endforeach; endif ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 4 ]}
			]
		});
	});
</script>