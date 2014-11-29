<?php $new = ! isset($user->id_user); ?>
<?php $more = $this->input->post('more') == 'YES' || (isset($more) && $more == 'YES'); ?>
<?php echo modal_header($new ? lang('add_user') : (lang('edit_user') . ' ') . $user->first_name) ?>
<form onsubmit="return validate(this, '<?php echo base_url('admin/user/edit'. ( $new ? '' : '/'.$user->id_user)) ?>')">
	<div class="modal-body">
		<div class="form-group">
	    	<label><?php echo lang('first_name') ?> <strong>*</strong></label> 
			<?php echo form_input('first_name', set_value('first_name', $user->first_name), 'class="form-control"'); ?>
			<?php echo form_error('first_name'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('last_name') ?> <strong>*</strong></label>
			<?php echo form_input('last_name', set_value('last_name', $user->last_name), 'class="form-control"'); ?>
			<?php echo form_error('last_name'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('email') ?> <strong>*</strong></label>
			<?php echo form_input('email', set_value('email', $user->email), 'class="form-control"'); ?>
			<?php echo form_error('email'); ?>
		</div>
		<div class="form-group">
			<label><?php echo lang('dni') ?></label>
			<?php echo form_input('username', set_value('username', $user->username), 'class="form-control"'); ?>
			<?php echo form_error('username'); ?>
		</div>
		<?php if ( $new ) : ?>
		<div class="form-group" style="width: 100%;">
			<label class="checkbox-inline">
				<input type="checkbox" name="generate" onclick="toggle_password(this)" value="YES"> <?php echo lang('password_generate') ?>
			</label>
		</div>
		<div class="form-group password">
			<label><?php echo lang('password') ?> <strong>*</strong></label>
			<?php echo form_password('password', '', 'class="form-control"'); ?>
			<?php echo form_error('password'); ?>
		</div>
		<div class="form-group password">
			<label><?php echo lang('password_confirm') ?> </label>
			<?php echo form_password('password_confirm', '', 'class="form-control"'); ?>
			<?php echo form_error('password_confirm'); ?>
		</div>
		<?php else : ?>
		<div class="form-group">
			<label><?php echo lang('state') ?></label>
			<?php echo form_dropdown('state', get_states_user(), set_value('state', $user->state), 'class="form-control"'); ?>
			<?php echo form_error('state'); ?>
		</div>
		<?php endif ?>
		<div class="form-group">
			<label><?php echo lang('rol') ?></label>
			<?php echo form_dropdown('id_rol', $roles, set_value('id_rol', $user->id_rol), 'class="form-control"'); ?>
			<?php echo form_error('id_rol'); ?>
		</div>
		<input type="hidden" value="<?php echo $more ? 'YES' : 'NO' ?>" name="more">
		<div style="margin-top: 10px;">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li class="active"><a href="#data-personal" role="tab" data-toggle="tab"><strong><?php echo lang('data_personal') ?></strong></a></li>
				<li><a href="#data-birth" role="tab" data-toggle="tab"><strong><?php echo lang('data_birth') ?></strong></a></li>
				<li><a href="#data-address" role="tab" data-toggle="tab"><strong><?php echo lang('data_address') ?></strong></a></li>
				<li><a href="#data-church" role="tab" data-toggle="tab"><strong><?php echo lang('data_church') ?></strong></a></li>
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="data-personal">
					<div class="form-group">
						<label>&nbsp;</label>
						<div class="form-control-static">
							<label class="checkbox-inline">
								<?php echo form_radio('gender', 'V', set_value('gender', $user->gender) == 'V', 'data-role=""') ?> <strong><?php echo lang('men') ?></strong>
							</label>
							<label class="checkbox-inline">
								<?php echo form_radio('gender', 'M', set_value('gender', $user->gender) == 'M', 'data-role=""') ?> <strong><?php echo lang('women') ?></strong>
							</label>
						</div>
						<?php echo form_error('gender'); ?>
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('marital_status') ?></label>
						<?php echo form_dropdown('marital_status', get_marital_status(), set_value('marital_status', $user->marital_status), 'class="form-control"'); ?>
						<?php echo form_error('marital_status'); ?>
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('phone') ?></label>
						<input type="text" name="phone" value="<?php echo set_value('phone', $user->phone) ?>" class="form-control">
						<?php echo form_error('phone'); ?>
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('mobile') ?></label>
						<input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile) ?>" class="form-control">
						<?php echo form_error('mobile'); ?>
					</div>
					<div class="form-group">&nbsp;</div>
					<div class="form-group">
						<label for=""><?php echo lang('level_education') ?></label>
						<?php echo form_dropdown('level_education', get_level_education(), set_value('level_education', $user->level_education), 'class="form-control"'); ?>
						<?php echo form_error('level_education'); ?>
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('occupation') ?></label>
						<input type="text" name="occupation" value="<?php echo set_value('occupation', $user->occupation) ?>" class="form-control">
						<?php echo form_error('occupation'); ?>
					</div>
				</div>
				<div class="tab-pane" id="data-birth">	
					<div class="form-group" style="width: 100%;">
						<label for=""><?php echo lang('birthday') ?></label>
						<?php echo form_dropdown_date('birthday', set_value('birthday', $user->birthday)) ?>
						<?php echo form_error('birthday'); ?>
					</div>				
					<fieldset>
						<legend><?php echo lang('birthplace') ?></legend>
						<div class="form-group">
							<label for=""><?php echo lang('country') ?></label>
							<select id="countries-birthday" class="form-control" name="id_country_birthday">
								<option value="0"><?php echo lang('select') ?>...</option>
								<?php foreach ($countries as $country): ?>
									<option value="<?php echo $country['value'] ?>" <?php echo $country['value'] == $user->id_country_birthday ? 'selected' : '' ?>><?php echo $country['text'] ?></option>
								<?php endforeach ?>
							</select>
							<?php echo form_error('id_country_birthday'); ?>
						</div>
						<div class="form-group">
							<label for=""><?php echo lang('department') ?></label>
							<?php echo form_dropdown('department_birthday', get_departments(set_value('id_country_birthday', $user->id_country_birthday), TRUE), set_value('department_birthday', $user->department_birthday), 'class="form-control" id="department-birthday"'); ?>
							<?php echo form_error('department_birthday'); ?>
						</div>
						<div class="form-group">
							<label for=""><?php echo lang('city') ?>/<?php echo lang('locality') ?></label>
							<select id="cities-birthday" name="id_city_birthday" class="form-control">
								<option value="0"><?php echo lang('select') ?>...</option>
							</select>
							<?php echo form_error('id_city_birthday'); ?>
						</div>
						<div class="form-group" style="display: none;">
							<label for=""><?php echo lang('birthplace') ?></label>
							<input type="text" name="birthplace" value="<?php echo set_value('birthplace', $user->birthplace) ?>" class="form-control">
							<?php echo form_error('birthplace'); ?>
						</div>
					</fieldset>
				</div>
				<div class="tab-pane" id="data-address">
					<div class="form-group">
						<label for=""><?php echo lang('country') ?></label>
						<select id="countries-address" class="form-control" name="id_country_address">
							<option value="0"><?php echo lang('select') ?>...</option>
							<?php foreach ($countries as $country): ?>
								<option value="<?php echo $country['value'] ?>" <?php echo $country['value'] == $user->id_country_address ? 'selected' : '' ?>><?php echo $country['text'] ?></option>
							<?php endforeach ?>
						</select>
						<?php echo form_error('id_country_address'); ?>
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('department') ?></label>
						<?php echo form_dropdown('department_address', get_departments(set_value('id_country_address', $user->id_country_address)), set_value('department_address', $user->department_address), 'class="form-control"'); ?>
						<?php echo form_error('department_address'); ?>
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('city') ?>/<?php echo lang('locality') ?></label>
						<select id="cities-address" name="id_city_address" class="form-control">
							<option value="0"><?php echo lang('select') ?>...</option>
						</select>
						<?php echo form_error('id_city_address'); ?>
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('address') ?></label>
						<input type="text" name="address" value="<?php echo set_value('address', $user->address) ?>" class="form-control">
						<?php echo form_error('address'); ?>
					</div>
				</div>
				<div class="tab-pane" id="data-church">
					<div class="form-group">
						<label for=""><?php echo lang('church') ?></label>
						<?php echo form_dropdown('id_church', $churches, set_value('id_church', $user->id_church), 'class="form-control"'); ?>
						<?php echo form_error('id_church'); ?>
					</div>
					<div class="form-group" style="width: auto;">
						<label for=""><?php echo lang('baptized') ?></label>
						<div id="member"><?php echo button_yes_no(set_value('member', $user->member), '', 'member') ?></div>
					</div>
					<div style="display: <?php echo $user->member == 'NO' ? 'none' : 'inline' ?>;" >
						<div class="form-group" style="width: auto;">
							<label for="">Fecha del bautizo</label>
							<?php echo form_dropdown_date('date_baptism', set_value('date_baptism', $user->date_baptism)) ?>
							<?php echo form_error('date_baptism'); ?>
						</div>
						<div class="form-group">
							<label for="">Bautizado por</label>
							<input type="text" name="pastor_baptism" placeholder="Pastor/Anciano" value="<?php echo set_value('pastor_baptism', $user->pastor_baptism) ?>" class="form-control">
							<?php echo form_error('pastor_baptism'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo modal_footer() ?>
</form>

<script type="text/javascript">
	var $countries_birthday = $('#countries-birthday'),
		$countries_address = $('#countries-address'),
		$department_birthday = $('#department-birthday');

	$countries_birthday.on('change', function () {
    	get_cities(this.value);
    });
    $countries_address.on('change', function () {
    	get_cities(this.value);
    });

    if ($countries_birthday.val() != '0') {
    	get_cities($countries_birthday.val(), '<?php echo $user->id_city_birthday ?>');
    }
    $(".date").datepicker({ autoclose: true, todayHighlight: true });

    var $member = $('#member');
    $member.find('label').on('click', function () {
    	$member.parent().next().css('display', $(this).index() ? 'none' : 'inline');
    });

    $department_birthday.on('change', function() {
    	console.log(this.value);
    	$.get(base_url + 'parameter/city/json_list/' + $countries_birthday.val(), {region_name : this.value}, function(response) {
    		console.log(response);
    	});
    });
</script>

<style type="text/css">
	#main-modal .modal-body .form-group {
		width: 25%;
	}
	#main-modal .tab-pane {
		padding: 10px 0;
		font-size: 0;
	}
	#main-modal legend {
		font-size: 14px;
		font-weight: bold;
		margin-bottom: 10px;
	}
	#main-modal fieldset {
		padding: 0 5px;
	}
</style>