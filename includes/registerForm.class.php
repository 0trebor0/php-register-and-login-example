<?php
class registerForm extends database{
	private $username;
	private $email;
	private $password;
	private $randomHash;
	private $ip_address;
	public function __construct( $username, $email, $password){
		$this->username = removeCodeTags($username);
		$this->email = removeCodeTags($email);
		$this->password = password_hash(removeCodeTags($password),PASSWORD_DEFAULT);
		parent::__construct();
	}
	public function start(){
		if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			if($this->checkUsername() == false){
				$query = $this->connect()->query("INSERT INTO tbl_users(username,email,password)VALUES('".$this->username."','".$this->email."','".$this->password."')");
				if($query){
					return "<p style='color:green;'>Account Created</p>";
				}else{
					return "<p style='color:red;'>Account Creation Failed</p>";
				}
			}else{
				return "<p style='color:red;'>Username Exists</p>";
			}
		}else{
			return "<p style='color:red;'>Email Not Valid</p>";
		}
	}
	private function checkUsername(){
		$query = $this->connect()->query("SELECT username FROM tbl_users WHERE username='".$this->username."'");
		if($query->num_rows > 0){
			return true;
		}else{
			return false;
		}
	}
}
$form = new registerForm( $_POST['username'], $_POST['email'], $_POST['password']);