<?php
require '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model  as Eloquent; 

use viewK\Users ;
use viewK\Tasks ;

use modelK\DBsetting;

session_start();
//new DBsetting();

$capsule = new Capsule;
$arrayCondition = [
	'driver'    => 'mysql',
    'host'      => '127.0.0.1',   // //localhost
    'database'  => 'dbtest001',
    'username'  => 'root',
    'password'  => '1234',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
$capsule->addConnection($arrayCondition);
$capsule->setAsGlobal();
$capsule->bootEloquent();



if ((isset($_POST['task_add'])) && ($_SERVER["REQUEST_METHOD"] == "POST" )) {
	$taskContent = $_POST['input_task'];
	$userId =  $_SESSION['userId'];
	echo "taskContent: $taskContent <br>";
	echo "userId:  $userId ";

	Capsule::table('tasks')-> insertGetId([
		'content'=>$taskContent,
		'user_id'=>$userId,
		'creat_at'=> date("Y-m-d H:i:s") 
	]);

	header('Location: ../index.php');

}	

?>

<!DOCTYPE html>
<html lang="en">
	<button onclick="history.go(-1);">Back </button>
</html>
