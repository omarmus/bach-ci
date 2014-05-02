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

function get_states_user()
{
    return array(
        'ACTIVE' => strtoupper(lang('active')),
        'CREATED' => strtoupper(lang('created')),
        'INACTIVE' => strtoupper(lang('inactive')),
        'BLOQUED' => strtoupper(lang('bloqued'))
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

function json_dropdown($array)
{
    $json = array();
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