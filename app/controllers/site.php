<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->model('blog_model');
        $this->load->helper(array('form', 'directory', 'html', 'gallery', 'url', 'theme'));
        $this->layout->set_layout('/layouts/site');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'offset';
        $config['first_url'] = base_url();

        $config['per_page'] = 12;
        $config['uri_segment'] = 2;
        
        $config['total_rows'] = $this->blog_model->get_all_record_count();

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['posts'] = $this->blog_model->get_posts($config['per_page'], ($this->uri->segment(2))? $this->uri->segment(2) : 0);

        $this->layout->view('/index_page', $data);
    }

    public function post()
    {
        $this->load->model('blog_model');

        $data['post'] = $this->blog_model->get_post_by_id($this->uri->segment(2));
        $data['page_title'] = $data['post']->caption;
        $this->layout->view('/full_post', $data);
    }


    public function tag()
    {
        $this->load->model('blog_model');

        $data['posts'] = $this->blog_model->get_post_by_tag(str_replace("%20", " ", $this->uri->segment(2)));
        $data['pagination'] = "";
        
        $this->layout->view('/index_page', $data);
    }
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */