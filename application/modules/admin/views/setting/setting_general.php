<?php 
	$settings = get_parameters();
	$system = array('SYSTEM_NAME', 'SYSTEM_EMAIL'); 
?>
<?php foreach ($system as $item): ?>
	<div class="form-group">
		<label><strong class="<?php echo isset($error) ? '' : 'none' ?>">* </strong><?php echo $settings[$item]['title'] ?></label>
		<?php echo form_input($item, set_value($item, $settings[$item]['value']), 'class="form-control ' . (isset($error) ? '' : 'none') . '"'); ?>
		<div class="form-control-static <?php echo isset($error) ? 'none' : '' ?>"><?php echo set_value($item, $settings[$item]['value']) ?>&nbsp;</div>
		<?php echo form_error($item); ?>
	</div>
<?php endforeach ?>