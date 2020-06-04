<?php
require '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model  as Eloquent; 

use viewK\Users ;
use viewK\Tasks ;

use modelK\DBsetting;

session_start();

$connectDB2 = new DBsetting();

// echo "<h1>login page</h1>";



if ((isset($_POST['btn_logout'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
	unset($_SESSION['username']);
	unset($_SESSION['userId']);

	//session_destroy();

	// echo $_SESSION['username'] ;
	header('Location: ../index.php');
	showEnd("登出click");

}

if ((isset($_POST['btn_login'])) && ($_SERVER["REQUEST_METHOD"] == "POST" )) {
	$nameFromInput = $_POST['input_name'];
	$passwordFromInput= $_POST['input_password'];

	// $userLoginInfo = Capsule::table('users')->where('name', '=', $nameFromInput)->get();
	

	if (empty($passwordFromInput)){
		showEnd("沒密碼");
	}else{
		$userLoginInfo = Users::where('name',$nameFromInput)->first();
		$resultPassword =  $userLoginInfo->password;
		$resultUserId =  $userLoginInfo->id;
		// echo "resultUserId: ".$resultUserId;
	
		if ($passwordFromInput == $resultPassword){
			
			$_SESSION['username'] = $nameFromInput;
			$_SESSION['userId'] =  $resultUserId;

			//會導致http code 302
			header('Location: ../index.php');
			
			//showEnd("login success");
			
			// $userId2 = $_SESSION['userId'];
			// $taskShow = Tasks::where('user_id','=',$userId2)->get();

			// foreach ($taskShow as $flight) {
			// 	echo $flight->user_id."<br>";
			// 	echo $flight->content."<br>";
			// }


		}else{
			showEnd("帳號或密碼錯誤");
		}
	}
}







function showEnd(
	string $mg
){
	echo $mg;
	// exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<button onclick="history.go(-1);">Back </button>
</html>
