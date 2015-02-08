<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CANDY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper(array('url', 'theme'));

        if($this->session->userdata('login') === FALSE) {
        	redirect('/admin/login', 'refresh');
        }
        
    }
}

/* End of file CANDY_Controller.php */
/* Location: .system/application/core/CANDY_Controller.php */