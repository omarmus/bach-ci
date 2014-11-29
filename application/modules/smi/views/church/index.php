<form class="filter" method="post">
	<div>
		<label><?php echo lang('name') ?></label>
		<input type="text" name="name" value="<?php echo $this->input->post('name') ?>" class="form-control">
	</div>
	<div>
		<label><?php echo lang('address') ?></label>
		<input type="text" name="address" value="<?php echo $this->input->post('address') ?>" class="form-control">
	</div>
	<?php echo button_filter() ?>
	<?php echo button_end_filter() ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_church'), 'smi/church/edit'); ?>
	<?php echo button_delete('smi/church/delete_selected'); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th><?php echo lang('name') ?></th>
			<th><?php echo lang('address') ?></th>
			<th><?php echo lang('constancy_type') ?></th>
			<th><?php echo lang('area') ?></th>
			<th><?php echo lang('department') ?></th>
			<th class="state"><?php echo lang('active') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($churches)): foreach ($churches as $church): ?>
		<tr>
			<td><?php echo $church->id_church ?></td>
			<td class="edit"><?php echo button_edit('smi/church/edit/' . $church->id_church) ?></td>
			<td><?php echo $church->name; ?></td>
			<td><?php echo $church->address; ?></td>
			<td><?php echo $church->constancy_type; ?></td>
			<td><?php echo $church->area; ?></td>
			<td><?php echo $church->department; ?></td>
			<td class="edit"><?php echo button_yes_no($church->state, 'smi/church/set_state/'. $church->id_church) ?></td>
		</tr>
	<?php endforeach; endif ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 7 ]}
			]
		});
	});
</script>