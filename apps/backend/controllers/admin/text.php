<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * small_writer:
 * для создания постов типа – Текст
 *
 * @author: william_adama
 * 
 */
 
class Text extends CANDY_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('blog_model');
        $this->load->helper(array('html', 'form'));
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['page_title'] = "Добавить заметку";
        $this->layout->view('/admin/post/text', $data);
    }
    
    public function add()
    {
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->layout->view('/admin/post/text');
        }
        else
        {
            $this->blog_model->create_text();
            
            $this->session->set_flashdata('success', 'Пост создан.');
            redirect('/admin', 'refresh');
        }
   }

    public function edit()
    {

        $this->form_validation->set_rules('caption', 'caption', 'required');

        if ($this->form_validation->run())
        {
            $this->blog_model->edit_text($this->uri->segment(4));

            $this->session->set_flashdata('success', 'Пост изменён.');
            

            redirect('/admin', 'refresh');
        }
        
        $data['post'] = $this->blog_model->get_post_by_id($this->uri->segment(4));

        $this->layout->view('/admin/post/edit_text', $data);
    }

    public function delete()
    {
        $this->blog_model->delete_text($this->uri->segment(4));
        
        $this->session->set_flashdata('success', 'Запись удалена.');
        redirect('/admin', 'refresh');
    }
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */