<?php 
error_reporting(0);
	
session_start();

function login_user() {
	$username = $_POST['username'];
	$pass = md5($_POST['password']);
	echo $sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$pass'";
	$result = mysql_query($sql);
	if (isset($result)) $row = mysql_fetch_assoc($result);

	if ($row['id']) {
		$_SESSION['user']['id'] = $row['id'];
		$_SESSION['user']['username'] = $row['username'];
		return true;
	} else {
		unset($_SESSION['user']);
		return false;
	}

}

function check_if_login(){
	if (isset($_SESSION['user'])) {
		return true;
	} else {
		return false;
	}
}

function logout(){
	unset($_SESSION['user']);
	header("Location: login.php");
}
