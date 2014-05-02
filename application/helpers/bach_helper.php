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

    $file = array('id_file' => 0, 'filename' => '');
    $status = "";
    $msg = "";

    $file_element_name = isset($options['field']) ? $options['field'] : 'file';

    // Configuration default
    $config = array(
        'upload_path' => './assets/files/', 
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
        !isset($options['title']) || $data['title'] = $options['title'];

        // Create file in SysFiles
        $file = $CI->file->save($data, NULL, TRUE)->row_array();
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
    return array('status' => $status, 'msg' => $msg, 'id_file' => $file['id_file'], 'filename' => $file['filename']);
}

//Upload Files multiples for Ajax

function upload_files($options = null)
{
    $CI =& get_instance();
    $CI->load->model('file_m', 'file');

    $file = array('id_file' => 0, 'filename' => '');
    $status = "";
    $msg = "";

    $file_element_name = isset($options['field']) ? $options['field'] : 'file';

    // Configuration default
    $config = array(
        'upload_path' => './assets/files/', 
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
    $CI->load->library('image_lib');

    $array_files = array();

    $files = $_FILES[$file_element_name];

    foreach ($files['name'] as $key => $image) {

        $_FILES['file_upload']['name']= $files['name'][$key];
        $_FILES['file_upload']['type']= $files['type'][$key];
        $_FILES['file_upload']['tmp_name']= $files['tmp_name'][$key];
        $_FILES['file_upload']['error']= $files['error'][$key];
        $_FILES['file_upload']['size']= $files['size'][$key];

        if (!$CI->upload->do_upload('file_upload')) {
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

                $CI->image_lib->initialize($config_thumb);
                if ( ! $CI->image_lib->resize() ) {
                    $status = 'error';
                    $msg = $CI->image_lib->display_errors('', '');
                } else {
                    $CI->image_lib->clear();
                }
            }

            // Exist field 'Title'
            !isset($options['title']) || $data['title'] = $options['title'];

            // Create file in SysFiles
            $file = $CI->file->save($data, NULL, TRUE)->row_array();
            if($file) {
                $status = 'success';
                $msg = "Files successfully uploaded";
            } else {
                unlink($data['full_path']);
                $status = 'error';
                $msg = "Something went wrong when saving the file, please try again.";
            }
        }
        @unlink($_FILES['file_upload']);

        $array_files[] = array('status' => $status, 'msg' => $msg, 'id_file' => $file['id_file'], 'filename' => $file['filename']);
    }
    //Convert to json in controller
    return $array_files;
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
        'from' => $parameters['SYSTEM_EMAIL']['value'], 
        'name'=> $parameters['SYSTEM_NAME']['value'], 
        'to' => $parameters['SYSTEM_EMAIL']['value'], 
        'subject' => 'Test', 
        'message' => '',
        'mailtype' => 'html'
    );

    if ($options) {
        $data = array_merge($data, $options);
    }

    if ($parameters['SMTP']['value'] == 'ON') {
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => $parameters['SMTP_HOST']['value'],
            'smtp_user' => $parameters['SMTP_HOST']['value'],
            'smtp_pass' => $parameters['SMTP_HOST']['value'],
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

//Main menu pages

function get_menu_admin($pages, $child = FALSE, $permisions = null)
{
    $CI =& get_instance();
    $str = '';

    if (count($pages)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">' . PHP_EOL : ('<ul class="dropdown-menu">' . PHP_EOL );

        foreach ($pages as $page) {
            $parent = isset($page['parent']);
            $slug = $parent ? $page['parent']['slug'] . '/' . $page['slug'] : $page['slug'];
            if ($permisions[$slug]['READ'] == "YES" && $page['state'] == 'ACTIVE' && $page['visible'] == 'YES') {
                $active = $parent ? $CI->uri->segment(1) == $page['parent']['slug'] && $CI->uri->segment(2) == $page['slug']: $CI->uri->segment(2) == $page['slug'];
                $title = lang(strtolower(str_replace(' ', '_', $page['title'])));
                $title = strlen($title) ? $title : $page['title'];
                if (isset($page['children']) && count($page['children'])) {
                    $str .= '<li class="dropdown '. ( $active ? ' active' : '' ) . '">';
                    $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $title . '<b class="caret"></b></a>' . PHP_EOL;
                    $str .= get_menu_admin($page['children'], TRUE, $permisions);
                } else {
                    $str .= $active ? '<li class="active">' : '<li>';
                    $str .= '<a href="' . base_url() . $slug . '">' .$title . '</a>';
                }

                $str .= '</li>' . PHP_EOL;
            }
        }

        $str .= '</ul>' . PHP_EOL;      
    }

    return $str;
} 

// Front-end

function get_menu_cms ($pages, $child = FALSE)
{
    $CI =& get_instance();
    $str = '';
    
    if (count($pages)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;
        
        foreach ($pages as $page) {
            if ($page['state'] == 'ACTIVE' && $page['visible'] == 'YES') {
                $active = $CI->uri->segment(1) == $page['slug'] ? TRUE : FALSE;
                if (isset($page['children']) && count($page['children'])) {
                    $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
                    $str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . base_url($page['slug']) . '">' . $page['title'];
                    $str .= '<b class="caret"></b></a>' . PHP_EOL;
                    $str .= get_menu_cms($page['children'], TRUE);
                } else {
                    $str .= $active ? '<li class="active">' : '<li>';
                    $str .= '<a href="' . base_url($page['slug']) . '">' . $page['title'] . '</a>';
                }
                $str .= '</li>' . PHP_EOL;
            }
        }
        
        $str .= '</ul>' . PHP_EOL;
    }
    
    return $str;
}

//Pages CMS
function get_pages($array)
{
    $str = '';
    if (count($array)) {
        foreach ($array as $item) {
            $children = isset($item['children']) && count($item['children']);
            $str .= '<a href="#" class="list-group-item '. ($children? 'parent' : 'page') .'" data-role="'.$item['id_page'].'">' . ($children ? '<span class="caret"></span> <strong><em>' . $item['title'] . '</em></strong>' : $item['title']) . '</a>' . PHP_EOL;
            if ($children) {
                $str .= '<div>';
                foreach ($item['children'] as $child) {
                    $str .= '<a href="#" class="list-group-item page child' . '" data-role="'.$child['id_page'].'">' . $child['title'] . '</a>' . PHP_EOL;
                }
                $str .= '</div>';
            }
        }
    }

    return $str;
}

// List sortable
function get_list_sortable($array, $child = FALSE)
{
    $str = '';

    if (count($array)) {
        $str .= $child == FALSE ? '<ol class="sortable cms">' : '<ol>';

        foreach ($array as $item) {
            $str .= '<li id="list_'.$item['id_page'].'" >';
            $str .= '<div class="btn btn-default btn-block">' . $item['title'] . '<span class="badge"> </span></div>';

            // Do we have any children?
            if (isset($item['children']) && count($item['children'])) {
                $str .= get_list_sortable($item['children'], TRUE);
            }

            $str .= '</li>' . PHP_EOL;
        }

        $str .= '</ol>' . PHP_EOL;      
    }

    return $str;
} 

//Queries

function get_parameters()
{
    $CI =& get_instance();

    $items = array();
    $parameters = $CI->db->get('sys_parameters')->result();
    foreach ($parameters as $param) {
        $items[$param->name] = array(
            'value' => $param->value,
            'title' => $param->title
        );
    }
    return $items;
}

function get_parameter($parameter)
{
    $parameters = get_parameters();
    return $parameters[$parameter]['value'];
}

function get_permissions($id_rol)
{
    $CI =& get_instance();

    $items = array();
    $CI->db->select('sys_permissions.*, sys_pages.slug, sys_pages.id_module, sys_pages.id_section');
    $CI->db->from('sys_permissions');
    $CI->db->join('sys_pages', 'sys_pages.id_page = sys_permissions.id_page', 'left');
    $CI->db->where('id_rol', $id_rol);
    $CI->db->order_by('sys_pages.id_module', 'asc');

    $permissions = $CI->db->get()->result();

    $modules = array();
    foreach ($permissions as $item) {
        if ($item->id_module != 0) {
            $key = $modules['m' . $item->id_module] . '/' .$item->slug;
        } else {
            $key = $item->slug;
            $modules['m' . $item->id_page] = $key;
        }
        $items[ $key ] = array(
            'CREATED' => $item->create,
            'READ'    => $item->read,
            'UPDATE'  => $item->update,
            'DELETE'  => $item->delete
        );
    }
    return $items;
}

function get_item($table, $field, $where)
{
    $CI =& get_instance();

    $CI->db->select('*');
    $CI->db->from($table);
    $CI->db->where($where);

    $item = $CI->db->get()->row_array();

    return is_array($field) ? get_fields($item, $field) : $item[$field];

}

function get_fields($item, $fields)
{
    $data = '';
    foreach ($fields as $field) {
        $data .= $item[$field] . ' ';
    }
    return $data;
}

//Download file
function download($file = NULL, $root = './')
{
    if (is_null($file)) {
        show_404();
    }
    $file = basename($file);
    $path = $root.$file;
    $type = '';
     
    if (is_file($path)) {
        $size = filesize($path);
        if (function_exists('mime_content_type')) {
            $type = mime_content_type($path);
        } else if (function_exists('finfo_file')) {
            $info = finfo_open(FILEINFO_MIME);
            $type = finfo_file($info, $path);
            finfo_close($info); 
        }
        if ($type == '') {
            $type = "application/force-download";
        }
        // Set Headers
        header("Content-Type: $type");
        header("Content-Disposition: attachment; filename=$file");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $size);
        // Download File
        readfile($path);
    } else {
        show_404();
    }
}

function delimiter_text($text, $length = 100, $options = array()) {
    $default = array('ending' => '...', 'exact' => true, 'html' => false );
    $options = array_merge($default, $options);
    extract($options);

    if ($html) {
        if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        $totalLength = mb_strlen(strip_tags($ending));
        $openTags = array();
        $truncate = '';

        preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
        foreach ($tags as $tag) {
            if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
                if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
                    array_unshift($openTags, $tag[2]);
                } else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
                    $pos = array_search($closeTag[1], $openTags);
                    if ($pos !== false) {
                        array_splice($openTags, $pos, 1);
                    }
                }
            }
            $truncate .= $tag[1];

            $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
            if ($contentLength + $totalLength > $length) {
                $left = $length - $totalLength;
                $entitiesLength = 0;
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
                    foreach ($entities[0] as $entity) {
                        if ($entity[1] + 1 - $entitiesLength <= $left) {
                            $left--;
                            $entitiesLength += mb_strlen($entity[0]);
                        } else {
                            break;
                        }
                    }
                }

                $truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);
                break;
            } else {
                $truncate .= $tag[3];
                $totalLength += $contentLength;
            }
            if ($totalLength >= $length) {
                break;
            }
        }
    } else {
        if (mb_strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = mb_substr($text, 0, $length - mb_strlen($ending));
        }
    }
    if (!$exact) {
        $spacepos = mb_strrpos($truncate, ' ');
        if (isset($spacepos)) {
            if ($html) {
                $bits = mb_substr($truncate, $spacepos);
                preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
                if (!empty($droppedTags)) {
                    foreach ($droppedTags as $closingTag) {
                        if (!in_array($closingTag[1], $openTags)) {
                            array_unshift($openTags, $closingTag[1]);
                        }
                    }
                }
            }
            $truncate = mb_substr($truncate, 0, $spacepos);
        }
    }
    $truncate .= $ending;

    if ($html) {
        foreach ($openTags as $tag) {
            $truncate .= '</'.$tag.'>';
        }
    }
    return $truncate;
}