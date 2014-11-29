<?php

// Buttons
function button_link($name = '', $url = '', $icon = '', $onclick = NULL, $permission = NULL, $tooltip = array())
{
    if (!is_null($permission)) {
        $CI =& get_instance();
        $permissions = $CI->session->userdata('permissions');

        if (!isset($permissions[$url]) || $permissions[$url][$permission] == 'NO') {
            return "";
        }
    }
    $url = base_url($url);
    ob_start(); ?>
    <a  href="<?php echo $url ?>"
        class="btn btn-default" 
        onclick="<?php echo !is_null($onclick) ? $onclick : '' ?>" 
        <?php echo count($tooltip) ? 'title="'.$tooltip['title'].'" data-toggle="tooltip" data-placement="'.$tooltip['orientation'].'"' : '' ?>>
        <span class="glyphicon <?php echo $icon ?>"></span> <?php echo $name ?>
    </a>
    <?php
    return ob_get_clean();
}

function button_modal($name = '', $url = '', $icon = '', $callback_function = NULL, $permission = NULL, $tooltip = array(), $class = 'btn-default', $disabled = FALSE, $size = NULL)
{
    if (!is_null($permission)) {
        $CI =& get_instance();
        $permissions = $CI->session->userdata('permissions');

        $uri = $CI->uri->segment(2) ? $CI->uri->segment(1) . '/'. $CI->uri->segment(2): $CI->uri->segment(2);
        if ($CI->uri->segment(1) == 'profile' || $CI->uri->segment(1) == 'setting') {
            $uri = 'admin/' . $CI->uri->segment(1);
        }
        if ($permissions[$uri][$permission] == 'NO') {
            return "";
        }
    }
    $url = base_url($url);
    ob_start(); ?>
    <button type="button" 
            class="btn <?php echo $class ?>" 
            <?php echo $disabled ? 'disabled="disabled"' : '' ?>
            onclick="show_modal('<?php echo $url ?>' <?php echo $size ? ", '" . $size . "'" : "" ?> <?php echo $callback_function ? ', ' . $callback_function : '' ?>)" 
            <?php echo count($tooltip) ? 'title="'.$tooltip['title'].'" data-toggle="tooltip" data-placement="'.$tooltip['orientation'].'"' : '' ?>>
        <span class="glyphicon <?php echo $icon ?>"></span> <?php echo $name ?>
    </button>
    <?php
    return ob_get_clean();
}

function button($title = '', $id = '', $icon = '', $permission = NULL, $btn_type = 'btn-default', $disabled = FALSE)
{
    if (!is_null($permission)) {
        $CI =& get_instance();
        $permissions = $CI->session->userdata('permissions');

        $uri = $CI->uri->segment(2) ? $CI->uri->segment(1) . '/'. $CI->uri->segment(2): $CI->uri->segment(2);
        if ($CI->uri->segment(1) == 'profile' || $CI->uri->segment(1) == 'setting') {
            $uri = 'admin/' . $CI->uri->segment(1);
        }
        if ($permissions[$uri][$permission] == 'NO') {
            return "";
        }
    }
    ob_start(); ?>
    <button type="button" 
            id="<?php echo $id ?>"
            class="btn <?php echo $btn_type ?> save-loading"
            <?php echo $disabled ? 'disabled="disabled"' : '' ?>>
        	<span>
        		<span class="glyphicon <?php echo $icon ?>"></span> <?php echo $title ?>
        	</span>
        	<span>
        		<img src="<?php echo base_url() ?>assets/img/loader.gif"> <?php echo lang('saving_data') ?>
        	</span>
    </button>
    <?php
    return ob_get_clean();
}

function button_default($title = '', $id = '', $icon = '', $permission = NULL, $class = '')
{
    return button($title, $id, $icon, $permission, "btn-default $class");
}

function button_primary($title = '', $id = '', $icon = '', $permission = NULL, $class = '')
{
    return button($title, $id, $icon, $permission, "btn-primary $class");
}

function button_success($title = '', $id = '', $icon = '', $permission = NULL, $class = '')
{
    return button($title, $id, $icon, $permission, "btn-success $class");
}

function button_danger($title = '', $id = '', $icon = '', $permission = NULL, $class = '')
{
    return button($title, $id, $icon, $permission, "btn-danger $class");
}

function button_warning($title = '', $id = '', $icon = '', $permission = NULL, $class = '')
{
    return button($title, $id, $icon, $permission, "btn-warning $class");
}

function button_info($title = '', $id = '', $icon = '', $permission = NULL, $class = '')
{
    return button($title, $id, $icon, $permission, "btn-info $class");
}

// @param $size is 'lg' or 'sm'
function button_add($title, $url, $size = NULL, $callback_function = NULL)
{
    $CI =& get_instance();
    $permissions = $CI->session->userdata('permissions');

    $uri = $CI->uri->segment(2) ? $CI->uri->segment(1) . '/'. $CI->uri->segment(2): $CI->uri->segment(2);
    if ($CI->uri->segment(1) == 'profile' || $CI->uri->segment(1) == 'setting') {
        $uri = 'admin/' . $CI->uri->segment(1);
    }
    if ($permissions[$uri]['CREATED'] == 'NO') {
        return "";
    }

    $url = base_url($url);
    ob_start(); ?>
    <button class="btn btn-primary" type="button" 
            onclick="show_modal('<?php echo $url ?>' <?php echo $size ? ", '" . $size . "'" : "" ?> <?php echo $callback_function ? ', ' . $callback_function : '' ?>)">
        <span class="glyphicon glyphicon-plus"></span> <?php echo $title ?>
    </button>
    <?php
    return ob_get_clean();
}

function button_delete($url, $refresh = FALSE)
{
    $CI =& get_instance();
    $permissions = $CI->session->userdata('permissions');

    $uri = $CI->uri->segment(2) ? $CI->uri->segment(1) . '/'. $CI->uri->segment(2): $CI->uri->segment(2);
    if ($CI->uri->segment(1) == 'profile' || $CI->uri->segment(1) == 'setting') {
        $uri = 'admin/' . $CI->uri->segment(1);
    }
    if ($permissions[$uri]['DELETE'] == 'NO') {
        return "";
    }

    $url = base_url($url);
    ob_start(); ?>
    <button type="button" id="delete-rows" class="btn btn-danger disabled btn-delete" 
            onclick="delete_selected(oTable, '<?php echo $url ?>'<?php echo $refresh ? ', true' : '' ?>)"
            title="<?php echo lang('delete_selection') ?>" data-toggle="tooltip" data-placement="bottom">
        <span class="glyphicon glyphicon-trash"></span>
    </button>
    <?php
    return ob_get_clean();
}

function button_edit($url, $size = NULL, $callback_function = null)
{
    return button_modal('', $url, 'glyphicon-edit', $callback_function, 'UPDATE', array(), 'btn-default', FALSE, $size);
}

function button_filter()
{
    ob_start(); ?>
    <button class="btn btn-primary" type="submit">
        <span class="glyphicon glyphicon-search"></span>
    </button>
    <?php
    return ob_get_clean();
}

function button_end_filter($filter = FALSE)
{
    if (isset($_POST['filter']) || $filter) {
        ob_start(); ?>
        <button class="btn btn-default" type="button" onclick="window.location = ''">
            <span class="glyphicon glyphicon-ban-circle"></span> <?php echo lang('search_end') ?>
        </button>
        <?php
        return ob_get_clean();
    }
}

function button_on_off($state, $url = '', $label_on = 'ON', $label_off = 'OFF', $name = 'options')
{
    $CI =& get_instance();
    $permissions = $CI->session->userdata('permissions');

    $uri = $CI->uri->segment(2) ? $CI->uri->segment(1) . '/'. $CI->uri->segment(2): $CI->uri->segment(2);
    if ($CI->uri->segment(1) == 'profile' || $CI->uri->segment(1) == 'setting') {
        $uri = 'admin/' . $CI->uri->segment(1);
    }
    if ($permissions[$uri]['UPDATE'] == 'NO') {
        return "";
    }
    $onclick = (boolean) strlen($url);
    $url = base_url($url);
    ob_start(); ?>
    <div class="btn-group btn-on-off on-off" data-toggle="buttons">
        <label class="btn btn-primary<?php echo $state == 'ACTIVE' || $state == 'YES' || $state == 'ON' ? ' active' : '' ?>" <?php echo $onclick ? 'onclick="button_on_off(this, \'' . $url . '\')"' : '' ?>>
            <input type="radio" name="<?php echo $name ?>" value="ACTIVE" <?php echo $state == 'ACTIVE' || $state == 'YES' || $state == 'ON' ? 'checked' : '' ?>> <strong><?php echo $label_on ?></strong>
        </label>
        <label class="btn btn-primary<?php echo $state == 'INACTIVE' || $state == 'NO' || $state == 'OFF' ? ' active' : '' ?>" <?php echo $onclick ? 'onclick="button_on_off(this, \'' . $url . '\')"' : '' ?>>
            <input type="radio" name="<?php echo $name ?>" value="INACTIVE" <?php echo $state == 'INACTIVE' || $state == 'NO' || $state == 'OFF' ? 'checked' : '' ?>> <strong><?php echo $label_off ?></strong>
        </label>
    </div>
    <?php
    return ob_get_clean();
}

function button_yes_no($state, $url = '', $name = 'options')
{
    return button_on_off($state, $url, strtoupper(lang('yes')), strtoupper(lang('no')), $name);
}

function state_label($state)
{
    $type = array(
        'ACTIVE'   => 'success',
        'CREATED'  => 'default',
        'INACTIVE' => 'info',
        'BLOQUED'  => 'warning',
        'DELETED' => 'danger',
        'PENDING' => 'warning'
    );
    ob_start(); ?>
    <span class="label label-<?php echo $type[$state] ?>">
        <?php echo strtoupper(lang(strtolower($state))) ?>
    </span>
    <?php
    return ob_get_clean();
}

// Modal

function modal_header($title = '')
{
    ob_start(); ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo $title ?></h4>
    </div>
    <?php
    return ob_get_clean();
}

function modal_footer($id_save = '', $label_save = 'save', $label_processing = 'saving_data', $label_close = 'cancel')
{
    ob_start(); ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-ban-circle"></span> <?php echo lang($label_close) ?></button>
        <?php echo button_submit($id_save, $label_save, $label_processing) ?>
    </div>
    <?php
    return ob_get_clean();
}

function button_submit($id_save = '', $label_save = 'save', $label_processing = 'saving_data', $class = 'btn-primary')
{
    ob_start(); ?>
    <button type="submit" class="btn <?php echo $class ?> save-loading" id="<?php echo $id_save ?>">
        <span>
            <span class="glyphicon glyphicon-ok"></span> <span class="title-submit"><?php echo lang($label_save) ?></span>
        </span>
        <span>
            <img src="<?php echo base_url() ?>assets/img/loader.gif"> <span><?php echo lang($label_processing) ?></span>
        </span>
    </button>
    <?php
    return ob_get_clean();
}

function modal_footer_close($id_save = '')
{
    ob_start(); ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-ban-circle"></span> <?php echo lang('close') ?></button>
    </div>
    <?php
    return ob_get_clean();
}

function input_birthday($date = NULL, $options = array())
{
    $CI =& get_instance();
    $months = array('01' => lang('jan'), '02' => lang('feb'), '03' => lang('mar'), '04' => lang('apr'), '05' => lang('may'), '06' => lang('jun'), '07' => lang('jul'), '08' => lang('aug'), '09' => lang('sept'), '10' => lang('oct'), '11' => lang('nov'), '12' => lang('dec'));

    $day = $month = $year = '';
    if (!is_null($date)) {
        $date = explode('-', $date);
        $day = $date[2];
        $month = $date[1];
        $year = $date[0];
    }
    ob_start(); ?>
    <label><?php echo lang('birthday') ?></label>
    <div class="birthday form-inline <?php echo isset($options['class']) ? $options['class'] : '' ?>">
        <div class="input-group input-form-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-gift"></span></span>
            <select name="day" id="day" class="form-control">
                <option value="-"><?php echo lang('day') ?></option>
            <?php for ($i=1; $i <= 31; $i++): ?>
                <option value="<?php echo $i ?>"<?php echo set_value('day', $day) == $i ? ' selected' : '' ?>><?php echo $i ?></option>
            <?php endfor ?>
            </select>
        </div>
        <div class="form-group">
            <select name="month" id="month" class="form-control">
                <option value="-"><?php echo lang('month') ?></option>
            <?php foreach ($months as $key => $value): ?>
                <option value="<?php echo $key ?>"<?php echo set_value('month', $month) == $key ? ' selected' : '' ?>><?php echo $value ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <select name="year" id="year" class="form-control">
                <option value="-"><?php echo lang('year') ?></option>
            <?php $limit = date('Y') - 110; ?>
            <?php for ($i=date('Y'); $i >= $limit; $i--): ?>
                <option value="<?php echo $i ?>"<?php echo set_value('year', $year) == $i ? ' selected' : '' ?>><?php echo $i ?></option>
            <?php endfor ?>
            </select>
        </div>
    </div>
    <?php echo form_error('birthday'); ?>
    <?php
    return ob_get_clean();
}

function form_dropdown_date($name = '', $date = NULL, $options = array())
{
    $CI =& get_instance();
    $months = array('01' => lang('jan'), '02' => lang('feb'), '03' => lang('mar'), '04' => lang('apr'), '05' => lang('may'), '06' => lang('jun'), '07' => lang('jul'), '08' => lang('aug'), '09' => lang('sept'), '10' => lang('oct'), '11' => lang('nov'), '12' => lang('dec'));

    $day = $month = $year = '';
    if (!is_null($date) && strlen($date)) {
        $date = explode('-', $date);
        $day = $date[2];
        $month = $date[1];
        $year = $date[0];
    }
    ob_start(); ?>
    <div class="form-inline <?php echo isset($options['class']) ? $options['class'] : '' ?>">
        <select name="<?php echo $name ?>_day" id="<?php echo $name ?>-day" class="form-control">
            <option value="-"><?php echo lang('day') ?></option>
        <?php for ($i=1; $i <= 31; $i++): ?>
            <option value="<?php echo $i ?>"<?php echo set_value($name . '_day', $day) == $i ? ' selected' : '' ?>><?php echo $i ?></option>
        <?php endfor ?>
        </select>
        <select name="<?php echo $name ?>_month" id="<?php echo $name ?>-month" class="form-control">
            <option value="-"><?php echo lang('month') ?></option>
        <?php foreach ($months as $key => $value): ?>
            <option value="<?php echo $key ?>"<?php echo set_value($name . '_month', $month) == $key ? ' selected' : '' ?>><?php echo $value ?></option>
        <?php endforeach ?>
        </select>
        <select name="<?php echo $name ?>_year" id="<?php echo $name ?>-year" class="form-control">
            <option value="-"><?php echo lang('year') ?></option>
        <?php $limit = date('Y') - 110; ?>
        <?php for ($i=date('Y'); $i >= $limit; $i--): ?>
            <option value="<?php echo $i ?>"<?php echo set_value($name . '_year', $year) == $i ? ' selected' : '' ?>><?php echo $i ?></option>
        <?php endfor ?>
        </select>
    </div>
    <?php
    return ob_get_clean();
}