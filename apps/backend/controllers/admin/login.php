<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * small_writer:
 * контроллер главной страницы админпанели
 *
 * @author: william_adama
 * 
 */
class Login extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('html', 'form', 'url', 'theme'));
        $this->load->library(array('form_validation', 'session'));
        
        $this->layout->set_layout('/layouts/login');
    }
    
    public function index()
    {
        $data['page_title'] = "Админка";

        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $prefs = $this->preferences->get();

        if ($this->form_validation->run())
        {
            if ($login === $prefs["login"] && $password === $prefs["password"]) 
            {   
                $this->session->set_userdata('login', TRUE);
                
                redirect('/admin', 'refresh');
            }
        }

        $this->layout->view('/admin/login', $data);
    }

    public function logout()
    {
        if($this->session->userdata('login') === TRUE) 
        {
            $this->session->unset_userdata('login');
            redirect('/admin/login', 'refresh');
        }
    }
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */