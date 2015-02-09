<?php

class Layout
{
	var $ci;
	var $layout;
	var $title;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	/**
	 * Установка макета
	 * @param $layout
	 */
	function set_layout($layout)
	{
		$this->layout = '/' . $layout;
	}

	/**
	 * Загрузка представления
	 * @param      $view
	 * @param null $data
	 * @param bool $return
	 * @return mixed
	 */
	function view($view, $data = NULL, $return = FALSE)
	{
		$preferences = $this->ci->preferences->get();
		$theme_path  = $preferences['design'] . '/template';
		$layout_path = $theme_path . '/layouts/' . $this->layout;

		// Загрузка содержимого в регион "content"

		$loaded_data['content'] = $this->ci->load->view($theme_path . '/' . $view, $data, TRUE);

		if ($return)
		{
			$output = $this->ci->load->view($layout_path, $loaded_data, TRUE);

			return $output;
		}
		else
		{
			$this->ci->load->view($layout_path, $loaded_data, FALSE);
		}
	}
}