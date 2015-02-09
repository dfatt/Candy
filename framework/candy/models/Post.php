<?php

namespace framework\candy\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Модель для работы с постами.
 *
 * @author Дамир Фаттахов
 *
 */
class Post extends Eloquent {

	public $table = 'posts';

	/**
	 * Выборка поста по уникальному $id
	 *
	 * @param $id
	 * @return mixed
	 */
	public function get_post_by_id($id)
	{
		return $this->find($id);
	}

	/**
	 * Выборка постов с учётом пагинации
	 * @param $num_page
	 * @param $per_page
	 * @return bool
	 */
	function get_posts($num_page, $per_page)
	{
		$query = $this->all()->forPage($num_page, $per_page)
							 ->sortByDesc('created_at');

		if ($query->count() > 0) {
			return $query;
		} else {
			return FALSE;
		}
	}

	/**
	 * Получение количества всех записей таблицы "posts"
	 *
	 * @return mixed
	 */
	function get_all_record_count()
	{
		return $this->all()->count();
	}

	/**
	 * Выборка всех постов с указанным тегом
	 *
	 * @param $tag
	 * @return mixed
	 */
	function get_post_by_tag($tag)
	{
		$result = $this->all()->where('tags', 'LIKE', '%' . $tag . '%')
							  ->sortByDesc('created_at');

		return $result;
	}

	/**
	 * Получение количества всех записей c учётом тега
	 *
	 * @param $tag
	 * @return mixed
	 */
	function get_all_record_count_by_tag($tag)
	{
		$this->db->like('tags', $tag);
		$this->db->order_by('created_at', 'desc');
		$this->db->from('posts');

		return $this->db->count_all_results();
	}
}