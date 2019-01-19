<?php
if(empty($_SESSION['user_sessionHash'])){
	createNav("nav", $title);
}else{
	userNav("nav", $title);
}
?>