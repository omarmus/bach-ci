<?php $new = ! isset($church->id_church); ?>
<?php echo modal_header($new ? lang('add_church') : lang('edit_church') . ' ' . $church->name) ?>
<form onsubmit="return validate(this, '<?php echo base_url('smi/church/edit'. ( $new ? '' : '/' . $church->id_church)) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label><?php echo lang('name') ?> <strong>*</strong></label> 
			<?php echo form_input('name', set_value('name', $church->name), 'class="form-control"'); ?>
			<?php echo form_error('name'); ?>
		</div>
		<div class="form-group">
			<label for=""><?php echo lang('department') ?></label>
			<?php echo form_dropdown('department', get_departments(set_value('id_country', $church->id_country), TRUE), set_value('department', $church->department), 'class="form-control" id="church-list"'); ?>
			<input type="text" id="department" class="form-control">
			<?php echo form_error('department'); ?>
		</div>
		<div class="form-group">
			<label for=""><?php echo lang('city') ?></label>
			<select id="cities" name="id_city" class="form-control">
				<option value="0"><?php echo lang('select') ?>...</option>
			</select>
			<?php echo form_error('id_city'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('address') ?> <strong>*</strong></label> 
			<?php echo form_input('address', set_value('address', $church->address), 'class="form-control"'); ?>
			<?php echo form_error('address'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('phone') ?></label> 
			<?php echo form_input('phone', set_value('phone', $church->phone), 'class="form-control"'); ?>
			<?php echo form_error('phone'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('email') ?></label> 
			<?php echo form_input('email', set_value('email', $church->email), 'class="form-control" placeholder="@"'); ?>
			<?php echo form_error('email'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('constancy_type') ?></label> 
			<?php echo form_input('constancy_type', set_value('constancy_type', $church->constancy_type), 'class="form-control" placeholder="Adobe, ladrillo, etc."'); ?>
			<?php echo form_error('constancy_type'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('area') ?></label>
			<div class="input-group">
				<?php echo form_input('area', set_value('area', $church->area), 'class="form-control text-right"'); ?>
				<?php echo form_error('area'); ?>
				<div class="input-group-addon">m<sup>2</sup></div>
			</div>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>

<script type="text/javascript">

	$('#church-list').on('change', function () {
		show_loading("Cargando ciudades");
		$.get(base_url + 'parameter/city/autocomplete/<?php echo $church->id_country ?>/' + this.value, function(response) {
			hide_loading();
			$('#department').magicSuggest({
	        	data: response,
	        	valueField: 'text',
	        	renderer: function(data) {
	            	return data.text;
	        	},
	        	resultAsString: true
	    	});
		}, 'json');
		//autocomplete('parameter/city/autocomplete/<?php echo $church->id_country ?>/' + this.value)
		
	});

	

	function autocomplete (url) {
		show_loading(lang.loading);
		$.get(base_url + url, function (response) {
			hide_loading();
			console.log(response)
		}, 'json');
	}
</script>
