<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CANDY_Loader extends CI_Loader {

    function __construct() 
    {
        parent::__construct();
        
        $this->_ci_view_paths = array('themes/' => TRUE);
    }
}

/* End of file CANDY_Loader.php */
/* Location: .system/application/core/CANDY_Loader.php */
