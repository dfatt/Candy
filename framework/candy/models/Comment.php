<?php

namespace framework\candy\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * @package framework\candy\models
 */
class Comment extends Eloquent
{
	public $table = 'comments';

	function get_comments_by_post_id($id)
	{
		$result = $this->all()->where('post_id', $id);

		if ($result->count() > 0) {
			return $result;
		} else {
			return FALSE;
		}
	}
}