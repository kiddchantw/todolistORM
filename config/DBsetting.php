<?php
namespace modelK;

use Illuminate\Database\Capsule\Manager as Capsule;

class DBsetting
{
	
	function __construct()
	{
		$capsule = new Capsule;
		$arrayCondition = [
			'driver'    => 'mysql',
    'host'      => '127.0.0.1',   // //localhost
    'database'  => 'dbtest001',
    'username'  => 'root',
    'password'  => '1234',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '', ];
    $capsule->addConnection($arrayCondition);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
	}


}
?>
