<?php
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model  as Eloquent; 

use viewK\Users;
use modelK\DBsetting;
session_start();

$connectDB = new DBsetting();

// echo "<h1>todolist ORM test</h1>";



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ORM test</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<div class="container-fluid">
	<div class="container-fluid" style="background-color:#84C1FF;" >

		<h2>login area</h2>
		<form class="form" action="src/login.php" method = "post">
			<label for="text"> Account :  </label>
			<input type="text" class="form-control" name = "input_name" >
			<label for="pwd"> Password :  </label>
			<input type="password" class="form-control" name = "input_password"> 
			<button type="submit" class="btn btn-warning" name="btn_login"> Login </button>
			<button type="submit" class="btn btn-info" name="btn_logout"> Logout </button>
		</form>
		<label for="text"> user : <?php 
		$userNow = $_SESSION['username'];
		if (empty($userNow)){
			echo " now one "; 
		}else{
			echo $userNow;
		}
		?> </label>
		<br>    
	</div>

	<div class="container-fluid" style="background-color:#FFF8D7;">
		<h2>About task </h2>
		<form class="form-inline" action="controller.php" method = "post">
			<input type="text"  name = "input_task">
			<input type="submit" name="task_add" value=" add "/>
		</form>
		<table class="table">
			<thead>
				<tr>
					<th width="10%">#</th>
					<th width="40%">代辦事項</th>
					<th width="20%">建立時間</th>
					<th width="10%">進度</th>
					<th width="10%"></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>



</div>
</html>