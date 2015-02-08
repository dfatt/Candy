<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Возвращает массив, где перечислены все файлы из указанной дериктории
function get_theme_url()
{

    $CI = & get_instance();
    $prefs = $CI->preferences->get();
    
	return '/themes/' . $prefs["design"];
}

/* End of file theme_helper.php */
/* Location: ./system/helpers/theme_helper.php */