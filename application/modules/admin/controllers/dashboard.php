<?php
class Dashboard extends Admin_Controller {

    private $oUser;

    public function __construct(){
        parent::__construct();
        $this->oUser = $this->user->get(ID_USER);

        $this->load->model('cms/article_m', 'article');
        $this->load->model('cms/tmp_file_m', 'tmp_file');
        $this->load->model('cms/article_file_m', 'article_file');
        $this->load->model('cms/article_video_m', 'article_video');
    }

    public function index() {

        $this->data['simple_editor'] = TRUE;
        $this->data['mansonry'] = TRUE;
        $this->data['upload'] = TRUE;
        
        $this->data['tour'] = $this->oUser->tour;
    	$this->data['subview'] = "admin/dashboard/index";

        $this->get_tmp_files();

        $this->data['total_articles'] = count($this->article->filter(array('id_page' => 13, 'state' => 'ACTIVE')));
        $this->data['total_articles_user'] = count($this->article->filter(array('id_page' => 13, 'state' => 'ACTIVE', 'id_user' => ID_USER)));
        $this->data['articles_pending'] = $this->article->filter(array('id_page' => 13, 'state' => 'PENDING', 'id_user' => ID_USER));
    	$this->load->view('admin/_layout_main', $this->data);
    }

    protected function get_tmp_files($type = NULL)
    {
        $files = init_files();
        $results = $this->tmp_file->get_files(ID_USER, $type);

        foreach ($results as $item) {
            $files[$item->type][] = $item;
        }

        $this->data['files'] = $files;
        $this->data['imgs'] = get_icons();
    }

    public function load_list_files($type = '')
    {
        is_ajax();

        $this->get_tmp_files($type);
        $this->load->view('admin/dashboard/list_' . strtolower($type) . 's', $this->data);
    }

    public function load_add_files($type = '')
    {
        is_ajax();

        $this->load->view('admin/dashboard/add_' . strtolower($type) . 's', $this->data);
    }
    
    public function tour_view()
    {
        is_ajax();

        $this->user->save(array('tour' => 'NO'), ID_USER);
    }

    public function save_article()
    {
        is_ajax();

        $this->form_validation->set_rules($this->article->rules_save);

        $this->data['id_article'] = '';
        if ($this->form_validation->run() == TRUE) {
            $data = $this->input->post();

            $data['slug'] = url_title($data['title']);
            $data['pubdate'] = date('Y-m-d');
            $data['id_user'] = ID_USER;
            $data['state'] = 'PENDING';
            $data['id_page'] = 13;

            $this->db->trans_begin();

            $id_article = $this->article->save($data);

            $files = $this->tmp_file->filter(array('id_user' => ID_USER));

            $data = array();
            $data['id_article'] = $id_article;
            foreach ($files as $file) {
                if ($file->type == 'PHOTO' || $file->type == 'DOCUMENT') {
                    unset($data['url']);
                    $data['type'] = $file->type;
                    $data['id_file'] = $file->id_file;
                    $this->article_file->save($data);
                } else {
                    unset($data['id_file']);
                    $data['type'] = 'YOUTUBE';
                    $data['url'] = $file->description;
                    $this->article_video->save($data);
                }
            }
            $this->tmp_file->delete_temp(ID_USER);
            
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->data['id_article'] = 'Ocurrió un error al momento de crear la publicación';
            } else {
                $this->db->trans_commit();
                $this->data['id_article'] = $id_article;
            }
        }

        $this->load->view('admin/dashboard/add_article', $this->data);
    }

    protected function upload_files($config, $type)
    {
        $this->load->model('admin/file_m', 'file');
        $files = upload_files($config);

        $data = array('type' => $type, 'id_user' => ID_USER);

        foreach ($files as $file) {
            if($file['id_file']) {
                $data['id_file'] = $file['id_file'];
                $this->tmp_file->save($data);
            }
        }

        return json_encode($files);
    }

    // Functions Photos
    public function upload_photos()
    {
        $config['field'] = 'photo';
        $config['upload_path'] = './assets/files/articles/photos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['thumbnail'] = TRUE;
        $config['width'] = 150;
        $config['height'] = 150;

        echo $this->upload_files($config, 'PHOTO');
    }

    // Functions Documents
    public function upload_documents()
    {
        $config['field'] = 'document';
        $config['upload_path'] = './assets/files/articles/documents/';
        $config['allowed_types'] = 'doc|docx|xls|xlsx|ppt|pptx|pdf|rar|zip|apk';
        $config['encrypt_name'] = FALSE;
        $config['remove_spaces'] = FALSE;

        echo $this->upload_files($config, 'DOCUMENT');
    }

    // Functions Videos
    public function add_videos()
    {
        is_ajax();

        $this->data['video_exist'] = count($this->tmp_file->filter(array('type' => 'VIDEO', 'id_user' => ID_USER)));
        $this->load->view('admin/dashboard/add_videos', $this->data);
    }

    public function upload_video()
    {
        is_ajax();

        $rules = $this->article_video->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data['description'] = $this->input->post('url');
            $data['id_user'] = ID_USER;
            $data['type'] = 'VIDEO';

            $this->tmp_file->save($data);
            echo json_encode(array('status' => 'OK'));
        } else {
            echo json_encode(array('status' => 'ERROR', 'html' => form_error('url')));
        }   
    }

    public function delete_file($id_file)
    {
        is_ajax();

        $this->tmp_file->delete($id_file);
    }

    public function delete_article($id_article)
    {
        $this->article->delete_files($id_article);
        $this->article->delete($id_article);
    }

    public function get_articles()
    {
        is_ajax();

        $this->load->model('cms/article_file_m', 'article_file');
        $this->load->helper('text');
        
        $pks = $this->input->post('pks');
        $pks = strlen($pks) ? explode(',', rtrim($pks, ',')) : array();
        $articles['articles'] = array();
        $articles['pks'] = '';

        $id_page = $this->input->post('id_page');
        $ini = $this->input->post('ini');

        $results = $this->article->get_articles($id_page, 10, $ini);
        foreach ($results as $item) {
            $photo = $this->article_file->get_primary_photo($item->id_article);
            $video = FALSE;
            if (!is_object($photo)) {
                $this->load->model('cms/article_video_m', 'article_video');
                $video = $this->article_video->get_primary_video($item->id_article);
                $photo = FALSE;
            }
            $articles['pks'] .= $item->id_article . ',';
            $articles['articles'][] = array(
                'id_article' => $item->id_article,
                'title' => $item->title,
                'body' => delimiter_text($item->body, 200, array('html' => TRUE, 'exact' => FALSE)),
                'date' => datetime_literal($item->created),
                'date_literal' => between_two_dates_literal($item->created),
                'id_user' => $item->id_user,
                'name_user' => $item->first_name . ' ' . $item->last_name,
                'photo_user' => !is_null($item->id_photo) ? ('assets/files/users/thumbnail/'. thumb_image($item->filename)) : ('assets/img/' . ($item->gender == 'M' ? 'profile-m.jpg' : 'profile.png')),
                'photo' => $photo ? 'assets/files/articles/photos/' . $photo->filename : '',
                'width' => $photo ? $photo->image_width : 0,
                'height' => $photo ? $photo->image_height : 0,
                'video' => $video ? str_replace(array('http:', 'https:'), '', str_replace(array('youtu.be/', 'www.youtube.com/watch?v='), 'www.youtube.com/embed/', $video->url)) : ''
            );
        }
        echo json_encode($articles);
    }

    public function get_article($id_article)
    {
        $this->load->helper('text');
        $this->data['article'] = $this->article->get_article($id_article);
        $this->data['edit'] = $this->data['article']->state == 'PENDING';

        $files = init_files();
        $results = $this->article_file->get_files($id_article);
        foreach ($results as $item) {
            $files[$item->type]['F' . $item->id_file] = $item;
        }
        $files['VIDEO'] = $this->article_video->get_by(array('id_article' => $id_article));

        $this->data['files'] = $files;
        $this->data['imgs'] = get_icons();

        $photo = $this->article_file->get_primary_photo($id_article);
        $this->data['id_file'] = is_object($photo) ? $photo->id_file : 0;
        $this->load->view('admin/dashboard/article', $this->data);
    }

}