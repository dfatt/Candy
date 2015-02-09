<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class EloquentWrap
{
	public function __construct()
	{
		$db = NULL;
		include APPPATH . 'config/database.php';

		$capsule = new Capsule();

		$capsule->addConnection(array(
			'driver'    => 'mysql',
			'host'      => $db['default']['hostname'],
			'database'  => $db['default']['database'],
			'username'  => $db['default']['username'],
			'password'  => $db['default']['password'],
			'charset'   => $db['default']['char_set'],
			'collation' => $db['default']['dbcollat'],
			'prefix'    => '',
		));

		$capsule->setAsGlobal();
		$capsule->bootEloquent();
	}
}