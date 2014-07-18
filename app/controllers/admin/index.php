<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * small_writer:
 * контроллер главной страницы админпанели
 *
 * @author: william_adama
 * 
 */
class Index extends CANDY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('blog_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'directory', 'html', 'gallery', 'url'));
    }
    
    public function index()
    {
        $this->load->library('pagination');
       
        $config['base_url'] = base_url() .'admin/'. 'offset';
        $config['first_url'] = base_url() .'admin';

        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        
        $config['total_rows'] = $this->blog_model->get_all_record_count();

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['posts'] = $this->blog_model->get_posts($config['per_page'], ($this->uri->segment(3))? $this->uri->segment(3) : 0);
        
        $this->layout->view('/admin/index', $data);
    }
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */