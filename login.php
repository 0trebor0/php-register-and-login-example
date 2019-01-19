<?php
require("config.php");
if(!empty($_SESSION['user_sessionHash'])){
	header("Location: dashboard.php");
}
$msg = "";
if(!empty($_POST['username']) && !empty($_POST['password'])){
	include ROOTPATH."/includes/loginForm.class.php";
	$msg = $form->start();
}
$title = "Login";
$content = "
<form class='form' name='login' method='post' onsubmit='return checkLoginForm()'>
<p>Username: <input type='text' name='username' placeholder='Username' autocomplete='off'></p>
<p>Password: <input type='password' name='password' placeholder='password' autocomplete='off'></p>
<span id='error'>$msg</span>
<input type='submit'>
</form>";
include ROOTPATH."/template/".THEME."/index.php";