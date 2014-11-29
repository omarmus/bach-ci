<form class="filter" method="post">
	<div>
		<label><?php echo lang('name') ?></label>
		<input type="text" name="name" value="<?php echo $this->input->post('name') ?>" class="form-control">
	</div>
	<div>
		<label><?php echo lang('code') ?></label>
		<input type="text" name="code" value="<?php echo $this->input->post('code') ?>" class="form-control">
	</div>
	<?php echo button_filter() ?>
	<?php echo button_end_filter() ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_country'), 'parameter/country/edit'); ?>
	<?php echo button_delete('parameter/country/delete_selected'); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th><?php echo lang('name') ?></th>
			<th><?php echo lang('code') ?></th>
			<th class="state"><?php echo lang('active') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($countries)): foreach ($countries as $country): ?>
		<tr>
			<td><?php echo $country->id_country ?></td>
			<td class="edit"><?php echo button_edit('parameter/country/edit/' . $country->id_country) ?></td>
			<td><?php echo $country->name; ?></td>
			<td><?php echo $country->code; ?></td>
			<td class="edit"><?php echo button_yes_no($country->state, 'parameter/country/set_state/'. $country->id_country) ?></td>
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