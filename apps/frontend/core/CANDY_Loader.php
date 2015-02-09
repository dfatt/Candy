<?php
class CANDY_Loader extends CI_Loader {

	function __construct()
	{
		parent::__construct();
		$this->_ci_view_paths = array('themes/' => TRUE);
	}
}