<?php

use framework\candy\models\Post;

class Site extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(['form', 'directory', 'html', 'gallery', 'url', 'theme']);
		$this->layout->set_layout('site');
	}

	public function index()
	{
		$this->load->library('pagination');

		$post = new Post();

		$page_num = $this->uri->segment(2);
		$config   = [
			'base_url'         => base_url() . 'offset',
			'first_url'        => base_url(),
			'per_page'         => 16,
			'uri_segment'      => 2,
			'total_rows'       => $post->get_all_record_count(),
			'use_page_numbers' => TRUE
		];

		$this->pagination->initialize($config);

		$data = [
			'pagination' => $this->pagination->create_links(),
			'posts'      => $post->get_posts(($page_num) ? $page_num : 0, $config['per_page'])
		];

		$this->layout->view('index', $data);
	}

	public function post($id)
	{
		$post     = Post::find($id);
		$comments = Comment::all();

		$data = [
			'post'       => $post,
			'comments'   => $comments,
			'page_title' => $post->caption,
		];

		$this->layout->view('full_post', $data);
	}

	public function tag()
	{
		$this->load->model('blog_model');

		$data['posts']      = $this->blog_model->get_post_by_tag(str_replace("%20", " ", $this->uri->segment(2)));
		$data['pagination'] = "";

		$this->layout->view('/index_page', $data);
	}
}