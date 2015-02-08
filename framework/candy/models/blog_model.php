<?php
/**
 * small_writer:
 * Модель для работы с постами.
 *
 * @author: william_adama
 * 
 */
class Blog_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->helper(array ('url', 'date'));
	}
	
	
	/*
	 * Загрузка поста по уникальному айди
	 */
	function get_post_by_id($id)
	{
		$this->db->where('id', $id);  
		$query = $this->db->get('posts');

		return $query->row();
	}


	/*
	 * Загрузка всех постов
	 */
	function get_posts($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('date_create', 'desc');

	    $query = $this->db->get('posts');
	    
	    if ($query->num_rows() > 0)
	    {	 
	    	return $query->result();
	    }
	    else
	    {
	        return FALSE;
	    }
	}


	/*
	 * Получение количества всех записей таблицы "posts"
	 */
	function get_all_record_count()
	{
		return $this->db->count_all('posts');
	}


	/*
	 * Загрузка всех постов с указанным тегом
	 */
	function get_post_by_tag($tag)
	{
		$this->db->like('tags', $tag);
		$this->db->order_by('date_create', 'desc'); 
		$query = $this->db->get('posts');

		return $query->result();
	}

	
	/*
	 * Получение количества всех записей c учётом тега
	 */
	function get_all_record_count_by_tag($tag)
	{
		$this->db->like('tags', $tag);
		$this->db->order_by('date_create', 'desc'); 
		$this->db->from('posts');

		return $this->db->count_all_results();
	}








	function create_text()
	{		
	   	$data = array(
	   		'caption' => $this->input->post('caption'),
	   		'description' => $this->input->post('description'),
	   		'source' => $this->input->post('source'),
	   		'tags' => $this->input->post('tags_input'),
	   		'type' => 'text',
	   		'date_create' => mdate("%Y-%m-%d %H:%i:%s", time())
	   	);

   		return $this->db->insert('posts', $data);
	}
	

	function edit_text($id)
	{
	   	$data = array(
	   		'caption' => $this->input->post('caption'),
	   		'description' => $this->input->post('description'),
	   		'source' => $this->input->post('source'),
	   		'tags' => $this->input->post('tags_input')
	   	);

		$this->db->where('id', $id);
   		$this->db->update('posts', $data);
	}

	
	function delete_text($id)
	{
		$this->db->delete('posts', array('id' => $id)); 
	}











	function create_photo($dir)
	{
	   	$data = array(
	   		'caption' => $this->input->post('caption'),
	   		'description' => $this->input->post('description'),
	   		'directory' => $dir,
	   		'source' => $this->input->post('source'),
	   		'tags' => $this->input->post('tags_input'),
	   		'type' => 'photo',
	   		'date_create' => mdate("%Y-%m-%d %H:%i:%s", time())
	   	);

   		return $this->db->insert('posts', $data);
	}


	function edit_photo($id)
	{
	   	$data = array(
	   		'caption' => $this->input->post('caption'),
	   		'description' => $this->input->post('description'),
	   		'source' => $this->input->post('source'),
	   		'tags' => $this->input->post('tags_input')
	   	);

		$this->db->where('id', $id);
   		$this->db->update('posts', $data);
	}


	function delete_photo($id)
	{
		$this->db->delete('posts', array('id' => $id)); 
	}










	function create_audio($dir)
	{
	   	$data = array(
	   		'caption' => $this->input->post('caption'),
	   		'description' => $this->input->post('description'),
	   		'directory' => $dir,
	   		'source' => $this->input->post('source'),
	   		'tags' => $this->input->post('tags_input'),
	   		'type' => 'audio',
	   		'date_create' => mdate("%Y-%m-%d %H:%i:%s", time())
	   	);

   		return $this->db->insert('posts', $data);
	}


	function edit_audio($id)
	{
	   	$data = array(
	   		'caption' => $this->input->post('caption'),
	   		'description' => $this->input->post('description'),
	   		'source' => $this->input->post('source'),
	   		'tags' => $this->input->post('tags_input')
	   	);

		$this->db->where('id', $id);
   		$this->db->update('posts', $data);
	}


	function delete_audio($id)
	{
		$this->db->delete('posts', array('id' => $id)); 
	}
}