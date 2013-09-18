<?php 

function e($string)
{
    return htmlentities($string);
}

// Validate is ajax
function is_ajax()
{
    $CI =& get_instance();
    if (!$CI->input->is_ajax_request()) {
        show_404();
    }
}

//Upload File for Ajax

function upload_file($options = null)
{
    $CI =& get_instance();
    $CI->load->model('file_m', 'file');

    $file = array('IdFile' => 0, 'Filename' => '');
    $status = "";
    $msg = "";

    $file_element_name = isset($options['field']) ? $options['field'] : 'file';

    // Configuration default
    $config = array(
        'upload_path' => './files/', 
        'allowed_types' => 'gif|jpg|png|doc|txt', 
        'max_size' => 1024 * 8, 
        'encrypt_name' => TRUE,
        'width' => 80,
        'height' => 80,
        'thumb_path' => 'thumbnail/'
    );

    if ($options) {
        $config = array_merge($config, $options);
    }

    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($file_element_name)) {
        $status = 'error';
        $msg = $CI->upload->display_errors('', '');
    } else {
        $data = $CI->upload->data();

        // Create thumbnail for image upload
        if (isset($options['thumbnail']) && $options['thumbnail']) {
            $config_thumb['image_library'] = 'gd2';
            $config_thumb['source_image'] = $config['upload_path'] . $data['file_name'];
            $config_thumb['new_image'] = $config['upload_path'] . $config['thumb_path'];
            $config_thumb['create_thumb'] = TRUE;
            $config_thumb['maintain_ratio'] = TRUE;
            $config_thumb['width'] = $config['width'];
            $config_thumb['height'] = $config['height'];

            $CI->load->library('image_lib', $config_thumb);
            if ( ! $CI->image_lib->resize() ) {
                $status = 'error';
                $msg = $CI->image_lib->display_errors('', '');
            }
        }

        // Exist field 'Title'
        !isset($options['Title']) || $data['Title'] = $options['Title'];

        // Create file in SysFiles
        $file = $CI->file->save($data, NULL, TRUE)->toArray();
        if($file) {
            $status = 'success';
            $msg = "File successfully uploaded";
        } else {
            unlink($data['full_path']);
            $status = 'error';
            $msg = "Something went wrong when saving the file, please try again.";
        }
    }
    @unlink($_FILES[$file_element_name]);

    //Convert to json in controller
    return array('status' => $status, 'msg' => $msg, 'id_file' => $file['IdFile'], 'filename' => $file['Filename']);
}

function thumb_image($photo)
{
    $photo = explode('.', $photo);
    return $photo[0] . '_thumb.' . $photo[1];
}

// Send mail
function send_mail($options = null)
{
    $CI =& get_instance();
    $CI->load->library('email');
    $CI->load->library('session');

    $parameters = $CI->session->userdata('parameters');
    if (!$parameters) {
        $parameters = get_parameters();  
    } 
    
    // Configuration default
    $data = array(
        'from' => $parameters['SYSTEM_EMAIL']['Value'], 
        'name'=> $parameters['SYSTEM_NAME']['Value'], 
        'to' => $parameters['SYSTEM_EMAIL']['Value'], 
        'subject' => 'Test', 
        'message' => '',
        'mailtype' => 'html'
    );

    if ($options) {
        $data = array_merge($data, $options);
    }

    if ($parameters['SMTP']['Value'] == 'ON') {
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => $parameters['SMTP_HOST']['Value'],
            'smtp_user' => $parameters['SMTP_HOST']['Value'],
            'smtp_pass' => $parameters['SMTP_HOST']['Value'],
            'smtp_port' => 25
        );
        $CI->email->initialize($config);
    }

    $CI->email->set_mailtype($data['mailtype']);

    if (isset($options['clear']) && $options['clear']) {
        $CI->email->clear(isset($options['clear_adjunt']) && $options['clear_adjunt']);
    }

    $CI->email->from($data['from'], $data['name']);
    $CI->email->to($data['to']);
    $CI->email->subject($data['subject']);
    $CI->email->message($data['message']);

    if (isset($options['cc'])) {
        $CI->email->cc($options['cc']);
    }

    if (isset($options['bcc'])) {
        $CI->email->bcc($options['bcc']);
    }

    if (isset($options['attach'])) {
        if (!is_array($options['attach'])) {
            $options['attach'] = array($options['attach']);
        }
        foreach ($options['attach'] as $attach) {
            $CI->email->attach( getcwd() . $attach );
        }
    }

    if (isset($options['debug']) && $options['debug']) {
        $CI->email->send();
        echo $CI->email->print_debugger();
    } else {
        return $CI->email->send();
    }   
}

function get_parameters()
{
    $items = array();
    $parameters = SysParametersQuery::create()->find();
    foreach ($parameters as $param) {
        $items[$param->getName()] = array(
            'Value' => $param->getValue(),
            'Title' => $param->getTitle()
        );
    }
    return $items;
}

function get_permissions($id_rol)
{
    $items = array();
    $permissions = SysPermissionsQuery::create()->filterByIdRol($id_rol)->find();
    foreach ($permissions as $item) {
        $items[$item->getSysPages()->getSlug()] = array(
            'CREATED' => $item->getCreate(),
            'READ' => $item->getRead(),
            'UPDATE' => $item->getUpdate(),
            'DELETE' => $item->getDelete()
        );
    }
    return $items;
}

// Arrays

function get_states_user()
{
    return array(
        'ACTIVE' => 'ACTIVE',
        'CREATED' => 'CREATED',
        'INACTIVE' => 'INACTIVE',
        'BLOQUED' => 'BLOQUED',
    );
}

function get_type_page()
{
    return array(
        'MODULE' => 'MODULE',
        'SECTION' => 'SECTION',
        'SUBSECTION' => 'SUBSECTION'
    );
}

function get_states()
{
    return array(
        'ACTIVE' => 'ACTIVE',
        'INACTIVE' => 'INACTIVE'
    );
}

function state_label($state)
{
    $type = array(
        'ACTIVE'   => 'success',
        'CREATED'  => 'default',
        'INACTIVE' => 'info',
        'BLOQUED'  => 'warning',
        'DELETED' => 'danger'
    );
    ob_start(); ?>
    <span class="label label-<?php echo $type[$state] ?>">
        <?php echo $state; ?>
    </span>
    <?php
    return ob_get_clean();
}

function json_dropdown($array)
{
    $json = array();
    foreach ($array as $key => $value) {
        $json[] = array('value' => $key, 'text' => $value);
    }
    return $json;
}

//Main menu pages

function get_menu($pages, $child = FALSE, $permisions = null)
{
    $CI =& get_instance();
    $str = '';

    if (count($pages)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">' . PHP_EOL : ('<ul class="dropdown-menu">' . PHP_EOL );

        foreach ($pages as $page) {
            if ($permisions[$page['Slug']]['READ'] == "YES" && $page['State'] == 'ACTIVE' && $page['Visible'] == 'YES' ) {
                $active = $CI->uri->segment(2) == $page['Slug'] ? TRUE : FALSE;
                if (isset($page['children']) && count($page['children'])) {
                    $str .= '<li class="dropdown '. ( $active ? ' active' : '' ) . '">';
                    $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $page['Title'] . '<b class="caret"></b></a>' . PHP_EOL;
                    $str .= get_menu($page['children'], TRUE, $permisions);
                } else {
                    $str .= $active ? '<li class="active">' : '<li>';
                    $str .= '<a href="' . site_url('admin/'.$page['Slug']) . '">' .$page['Title'] . '</a>';
                }

                $str .= '</li>' . PHP_EOL;
            }
        }

        $str .= '</ul>' . PHP_EOL;      
    }

    return $str;
} 

// Buttons

function button_modal($title = '', $url = '', $icon = '', $callback_function = NULL, $permission = NULL)
{
    if (!is_null($permission)) {
        $CI =& get_instance();
        $permissions = $CI->session->userdata('permissions');

        if ($permissions[$CI->uri->segment(2)][$permission] == 'NO') {
            return "";
        }
    }
    $url = site_url($url);
    ob_start(); ?>
    <button type="button" 
            class="btn btn-default" 
            onclick="show_modal('<?php echo $url ?>' <?php echo $callback_function ? ', ' . $callback_function : '' ?>)">
        <span class="glyphicon <?php echo $icon ?>"></span> <?php echo $title ?>
    </button>
    <?php
    return ob_get_clean();
}

function button_add($title, $url, $callback_function = NULL)
{
    $CI =& get_instance();
    $permissions = $CI->session->userdata('permissions');

    if ($permissions[$CI->uri->segment(2)]['CREATED'] == 'NO') {
        return "";
    }

    $url = site_url($url);
    ob_start(); ?>
    <button class="btn btn-primary" type="button" 
            onclick="show_modal('<?php echo $url ?><?php echo $callback_function ? ', ' . $callback_function : '' ?>')">
        <span class="glyphicon glyphicon-plus"></span> <?php echo $title ?>
    </button>
    <?php
    return ob_get_clean();
}

function button_delete($url, $refresh = FALSE)
{
    $CI =& get_instance();
    $permissions = $CI->session->userdata('permissions');

    if ($permissions[$CI->uri->segment(2)]['DELETE'] == 'NO') {
        return "";
    }

    $url = site_url($url);
    ob_start(); ?>
    <button type="button" id="delete-rows" class="btn btn-danger disabled" 
            onclick="delete_selected(oTable, '<?php echo $url ?>'<?php echo $refresh ? ', true' : '' ?>)">
        <span class="glyphicon glyphicon-trash"></span>
    </button>
    <?php
    return ob_get_clean();
}

function button_edit($url, $callback_function = null)
{
    return button_modal('', $url, 'glyphicon-edit', $callback_function, 'UPDATE');
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

function button_end_filter()
{
    ob_start(); ?>
    <button class="btn btn-default" type="button" onclick="window.location = ''">
        <span class="glyphicon glyphicon-ban-circle"></span> <?php echo lang('search_end') ?>Terminar búsqueda
    </button>
    <?php
    return ob_get_clean();
}

function button_on_off($state, $url, $label_on = 'ON', $label_off = 'OFF')
{
    $CI =& get_instance();
    $permissions = $CI->session->userdata('permissions');

    if ($permissions[$CI->uri->segment(2)]['UPDATE'] == 'NO') {
        return "";
    }

    $url = site_url($url);
    ob_start(); ?>
    <div class="btn-group btn-on-off" data-toggle="buttons">
        <label class="btn btn-primary<?php echo $state == 'ACTIVE' || $state == 'YES' || $state == 'ON' ? ' active' : '' ?>" onclick="button_on_off(this, '<?php echo $url ?>')">
            <input type="radio" name="options" value="ACTIVE" <?php echo $state == 'ACTIVE' || $state == 'YES' || $state == 'ON' ? 'checked' : '' ?>> <strong><?php echo $label_on ?></strong>
        </label>
        <label class="btn btn-primary<?php echo $state == 'INACTIVE' || $state == 'NO' || $state == 'OFF' ? ' active' : '' ?>" onclick="button_on_off(this, '<?php echo $url ?>')">
            <input type="radio" name="options" value="INACTIVE" <?php echo $state == 'INACTIVE' || $state == 'NO' || $state == 'OFF' ? 'checked' : '' ?>> <strong><?php echo $label_off ?></strong>
        </label>
    </div>
    <?php
    return ob_get_clean();
}

function button_yes_no($state, $url)
{
    return button_on_off($state, $url, 'YES', 'NO');
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

function modal_footer($id_save = '')
{
    ob_start(); ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> <?php echo lang('cancel') ?></button>
        <button type="submit" class="btn btn-primary" id="<?php echo $id_save ?>"><span class="glyphicon glyphicon-ok"></span> <?php echo lang('save') ?></button>
    </div>
    <?php
    return ob_get_clean();
}