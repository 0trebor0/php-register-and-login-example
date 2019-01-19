<?php
function createNav($class, $item){
	$items = array(
		array("text"=>"Home","href"=>"index.php"),
		array("text"=>"Register","href"=>"register.php"),
		array("text"=>"Login","href"=>"login.php"),
		array("text"=>"About","href"=>"about.php")
		
	);
	echo "<nav class='".$class."'><ul>";
	foreach($items as $id ){
		if($id['text'] == $item){
			echo "<li class='nav-item-active'><a href='".$id['href']."'>".$id['text']."</a></li>";
		}else{
			echo "<li><a href='".$id['href']."'>".$id['text']."</a></li>";
		}
	}
	echo "</ul></nav>";
}function userNav($class, $item){
	$items = array(
		array("text"=>"Home","href"=>"dashboard.php"),
		array("text"=>"Logout","href"=>"logout.php")
		
	);
	echo "<nav class='".$class."'><ul>";
	foreach($items as $id ){
		if($id['text'] == $item){
			echo "<li class='nav-item-active'><a href='".$id['href']."'>".$id['text']."</a></li>";
		}else{
			echo "<li><a href='".$id['href']."'>".$id['text']."</a></li>";
		}
	}
	echo "</ul></nav>";
}
function doTitle( $title ){
	return $title." || ".TITLE;
}
function removeCodeTags( $code ){
	return strip_tags($code);
}
function userLogout(){
	session_unset();
	session_destroy();
	header("Location: login.php");
}
