<form class="filter" method="post">
	<div>
		<label><?php echo lang('country') ?></label>
		<?php echo form_dropdown('id_country', $countries, $this->input->post('id_country'), 'class="form-control"'); ?>
	</div>
	<div>
		<label><?php echo lang('name') ?></label>
		<input type="text" name="name" value="<?php echo $this->input->post('name') ?>" class="form-control">
	</div>
	<div>
		<label><?php echo lang('region_name') ?></label>
		<input type="text" name="region_name" value="<?php echo $this->input->post('region_name') ?>" class="form-control">
	</div>
	<?php echo button_filter() ?>
	<?php echo button_end_filter() ?>
	<input type="hidden" name="filter" value="OK">
</form>

<div class="section-buttons">
	<?php echo button_add(lang('add_city'), 'parameter/city/edit'); ?>
	<?php echo button_delete('parameter/city/delete_selected'); ?>
</div>

<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit"><?php echo lang('edit') ?></th>
			<th><?php echo lang('name') ?></th>
			<th><?php echo lang('code') ?></th>
			<th><?php echo lang('region_name') ?></th>
			<th><?php echo lang('region_code') ?></th>
			<th class="state"><?php echo lang('active') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($cities)): foreach ($cities as $city): ?>
		<tr>
			<td><?php echo $city->id_city ?></td>
			<td class="edit"><?php echo button_edit('parameter/city/edit/' . $city->id_city) ?></td>
			<td><?php echo $city->name; ?></td>
			<td><?php echo $city->code; ?></td>
			<td><?php echo $city->region_name; ?></td>
			<td><?php echo $city->region_code; ?></td>
			<td class="edit"><?php echo button_yes_no($city->state, 'parameter/city/set_state/'. $city->id_city) ?></td>
		</tr>
	<?php endforeach; endif ?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 6 ]}
			]
		});
	});
</script>