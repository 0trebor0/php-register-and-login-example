<?php
require("config.php");
if(!empty($_SESSION['user_sessionHash'])){
	include ROOTPATH."/includes/userSession.class.php";
	$title = "Dashboard";
	$content = "Welcome ".$_SESSION['user_username'];
	include ROOTPATH."/template/".THEME."/index.php";
}else{
	//Not Logged In
	header("Location: login.php");
}