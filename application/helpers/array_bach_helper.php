<?php
// Arrays

function get_array($table = 'sys_users', $field = 'email', $id = 'id_user', $where = array())
{
    $CI =& get_instance();

    $items = array();

    $CI->db->select('*');
    $CI->db->from($table);
    $CI->db->where($where);
    $CI->db->order_by($field, 'asc');
    $results = $CI->db->get()->result_array();

    foreach ($results as $item) {
        $items[$item[$id]] = $item[$field];
    }
    return $items;
}

function get_array_dropdown($table = 'sys_users', $field = 'email', $id = 'id_user', $where = array())
{
    $CI =& get_instance();

    $items = array();

    $CI->db->select('*');
    $CI->db->from($table);
    $CI->db->where($where);
    $CI->db->order_by($field, 'asc');
    $results = $CI->db->get()->result_array();

    foreach ($results as $item) {
        $items[] = array(
            'value' => $item[$id],
            'text' => $item[$field]
        );
    }
    return $items;
}

function get_departments($id_country = NULL, $first_option = FALSE)
{
    $CI =& get_instance();

    $CI->db->select('region_name');
    $CI->db->from('sys_cities');
    $CI->db->where('id_country', $id_country);
    $CI->db->order_by('region_name', 'asc');
    $CI->db->group_by('region_name');
    $results = $CI->db->get()->result();

    $items = array();

    if ($first_option) {
        $items[0] = lang('select') . '...';
    }

    foreach ($results as $item) {
        $items[$item->region_name] = $item->region_name;
    }
    return $items;
}

function get_array_keys($list, $key, $value)
{
    $array = array();
    foreach (object_to_array($list) as $item) {
        $array[$item[$key]] = $item[$value];
    }
    return $array;
}

function object_to_array ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('object_to_array', (array) $object);
}

function json_dropdown($array, $new = FALSE)
{
    $json = array();

    if ($new) {
        $json[] = array('value' => 'new', 'text' => 'Agregar nueva ciudad');
    }
    foreach ($array as $key => $value) {
        $json[] = array('value' => $key, 'text' => $value);
    }
    return $json;
}

function get_options($array, $child = FALSE, $value = '') {
    $str = '';
    if (count($array)) {
        foreach ($array as $item) {
            $str .= '<option value="'.$item['id_page'].'" '. ($value == $item['id_page'] ? 'selected' : '') .' style="'. ($child? 'text-indent: 15px' : '') .'">' . $item['title'] . '</option>' . PHP_EOL;
            if (isset($item['children']) && count($item['children'])) {
                $str .= get_options($item['children'], TRUE, $value);
            }
        }
    }
    return $str;
} 

function get_pages_array($array)
{
    $pages = array();
    $pages[0] = lang('select_page');
    if (count($array)) {
        foreach ($array as $item) {
            if (isset($item['children']) && count($item['children'])) {
                $pages[$item['title']] = array();
                foreach ($item['children'] as $child) {
                    $pages[$item['title']][$child['id_page']] = $child['title'];
                }
            } else {
                $pages[$item['id_page']] = $item['title'];
            }
        }
    }
    return $pages;
}

function get_options_group($options = array(), $selected = array())
{
    $str = '';
    foreach ($options as $key => $val)
    {
        $key = (string) $key;

        if (is_array($val) && ! empty($val))
        {
            $str .= '<optgroup label="'.$key.'">'."\n";

            foreach ($val as $optgroup_key => $optgroup_val)
            {
                $sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

                $str .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
            }

            $str .= '</optgroup>'."\n";
        }
        else
        {
            $sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

            $str .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
        }
    }
    return $str;
}

function get_list($array) {
    $list = array();
    if (count($array)) {
        foreach ($array as $item) {
            $list[] = $item;
            if (isset($item['children']) && count($item['children'])) {
                foreach ($item['children'] as $child) {
                    $list[] = $child;
                }
            }
        }
    }

    return $list;
} 

function get_icons()
{
    return array(
        'doc' => 'word.png',
        'docx' => 'word.png',
        'xls' => 'excel.png',
        'xlsx' => 'excel.png',
        'ppt' => 'powerpoint.png',
        'pptx' => 'powerpoint.png',
        'pdf' => 'pdf.png',
        'zip' => 'zip.png',
        'apk' => 'android.png',
        'rar' => 'rar.png'
    );
}

function init_files()
{
    return array(
        'PHOTO' => array(),
        'VIDEO' => array(),
        'DOCUMENT' => array(),
        'AUDIO' => array(),
        'APK' => array()
    );
}

function months()
{
    return array (
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    );
}

function icons_notifications()
{
    return array(
        'MESSAGE' => 'glyphicon-envelope',
        'ALERT' => 'glyphicon-warning-sign',
        'CHAT' => 'glyphicon-comment',
        'INVITATION' => 'glyphicon-user'
    );
}

function get_states_user()
{
    return array(
        'ACTIVE' => strtoupper(lang('active')),
        'PENDING' => strtoupper(lang('pending')),
        'CREATED' => strtoupper(lang('created')),
        'INACTIVE' => strtoupper(lang('inactive')),
        'BLOQUED' => strtoupper(lang('bloqued'))
    );
}

function get_marital_status()
{
    return array(
        'SINGLE' => 'Soltero(a)',
        'MARRIED' => 'Casado(a)',
        'CONCUBINE' => 'Concubino(a)',
        'SEPARATE' => 'Separado(a)',
        'DIVORCED' => 'Divorciado(a)',
        'WIDOW' => 'Viudo(a)'
    );
}

function get_level_education()
{
    return array(
        'NONE' => 'Ninguno',
        'PRIMARY' => 'Primaria',
        'SECUNDARY' => 'Secundaria',
        'TECHNICAL' => 'Técnica',
        'PROFESSIONAL' => 'Profesional'
    );
}

function get_type_page()
{
    return array(
        'MODULE' => strtoupper(lang('module')),
        'SECTION' => strtoupper(lang('section')),
        'SUBSECTION' => strtoupper(lang('subsection'))
    );
}

function get_type_page_cms()
{
    return array(
        'SECTION' => strtoupper(lang('section')),
        'SUBSECTION' => strtoupper(lang('subsection'))
    );
}

function get_states()
{
    return array(
        'ACTIVE' => strtoupper(lang('active')),
        'INACTIVE' => strtoupper(lang('inactive'))
    );
}