<?php
session_start();
$config = [
	"properties"=>[
		"title"=>"Login and Signup",
		"favicon"=>"none"
	]
];
define("ROOTPATH", __DIR__);
define("TITLE", $config['properties']['title']);
define("THEME", "default");
include ROOTPATH."/includes/function.php";
include ROOTPATH."/includes/database.class.php";
