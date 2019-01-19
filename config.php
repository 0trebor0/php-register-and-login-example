<?php
session_start();
define("ROOTPATH", __DIR__);
include __DIR__."/includes/theme.inc.php";
class variables{
	static function config(){
		return [
			"properties"=>[
				"title"=>"Social Life Events",
				"favicon"=>"none"
			]
		];
	}
	static function clearData( $data ){
		$data = trim( $data );
		$data = stripslashes( $data );
		$data = htmlspecialchars( $data );
		return $data;
	}
	static function validateEmail( $email ){
		if(filter_var( $email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}
	static function clientIPAddress(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			//$ip.push($_SERVER['HTTP_CLIENT_IP']);
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}else if(!empty($_SERVER['HTTP_X_FORWARD_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARD_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}