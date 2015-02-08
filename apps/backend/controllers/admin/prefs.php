<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * small_writer:
 * настройки
 *
 * @author: william_adama
 * 
 */
 
class Prefs extends CANDY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('html');
        $this->load->helper('form');
    }
    
    public function index()
    {
        $data['page_title'] = "Настройки";

        if($this->input->post())
        {
            $config['name_project'] = $this->input->post('name_project');
            $config['description_project'] = $this->input->post('description_project');
            $config['design'] = $this->input->post('design');
            $config['keywords'] = $this->input->post('keywords');

            $this->preferences->save('candy', $config);


        }

        $data['prefs'] = $this->preferences->get('candy');



        $this->layout->view('/admin/preferences', $data);
    }
}

/* End of file post.php */
/* Location: ./application/controllers/admin/link.php */