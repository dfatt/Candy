<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Возвращает массив, где перечислены все файлы из указанной дериктории
function get_photos($dir)
{
	$photos = directory_map('./uploads/'.$dir);
	return $photos;
}

/* End of file gallery_helper.php */
/* Location: ./system/helpers/gallery_helper.php */