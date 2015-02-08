<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout {

    var $CI;
    var $layout;
    var $title;
    
    function Layout($layout = "/layouts/admin")
    {
        $this->CI =& get_instance();
        $this->layout = $layout;
    }

    function set_layout($layout)
    {
      $this->layout = $layout;
    }
    
    function view($view, $data=null, $return = false)
    {
        
        $CI = & get_instance();
        $prefs = $CI->preferences->get();

        $theme_path = $prefs["design"] .'/template';

        // Загрузка содержимого в регион "content"
        $loaded_data = array();
        $loaded_data['content'] = $this->CI->load->view($theme_path.$view, $data, true);

        if($return)
        {
            $output = $this->CI->load->view($theme_path.$this->layout, $loaded_data, true);
            return $output;
        }
        else
        {
            $this->CI->load->view($theme_path.$this->layout, $loaded_data, false);
        }
    }
}
?>